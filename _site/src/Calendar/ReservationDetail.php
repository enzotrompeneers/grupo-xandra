<?php
/**
 * Date reservation detail class
 *
 * @author Daniel Beard <daniel@creativos.be>
 *
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class ReservationDetail
{

    protected $db;
    protected $id;
    protected $data;
    protected $table = 'reservas';
    
    /**
	 * @brief Constructor
	 *
	 * @param DbInterface $db
	 */
	public function __construct(DbInterface $db){

		$this->db = $db;

    }

    /**
     * @brief Gets reservation details from ID
     *
     * @param Integer $id
     * @return Array
     */
    public function getReservationDetails($id)
    {

        $this->id = $id;

        $output = $this->getData($id);

        $output['fecha'] = $this->convertDateFromISO($output['fecha']);
        $output['fecha_llegada_iso'] = $output['fecha_llegada'];
        $output['fecha_salida_iso'] = $output['fecha_salida'];
        $output['fecha_confirmado_iso'] = $output['fecha_confirmado'];
        $output['fecha_llegada'] = $this->convertDateFromISO($output['fecha_llegada']);
        $output['fecha_salida'] = $this->convertDateFromISO($output['fecha_salida']);
        $output['fecha_confirmado'] = $this->convertDateFromISO($output['fecha_confirmado']);


        $output['nombre_completo'] = $output['nombre'] . ' ' . $output['apellido'];

        return $output;

    }

    /**
     * @brief Gets reservation details from hash
     *
     * @param String $hash
     * @return Array
     */
    public function getReservationDetailsByHash($hash)
    {

        $query = "SELECT reserva_id FROM ".XNAME."_comentarios WHERE hash = '{$hash}'";
        $sql = $this->db->record($query);

        if ($sql) return $this->getReservationDetails($sql['reserva_id']);

    }

    /**
     * @brief Saves reservation comment
     *
     * @param String $comment
     * @param String $hash
     * @return Void
     */
    public function saveComment($mensajeVivienda, $mensajeServicio, $valoracion, $hash)
    {

        $data = ['comentario_vivienda' => $mensajeVivienda, 'comentario_servicio' => $mensajeServicio, 'valoracion' => $valoracion, 'fecha_modificado' => date('Y-m-d')];
        $this->db->updateQuery($data, XNAME.'_comentarios', ['hash' => $hash]);

    }

    /**
     * @brief Saves calendar token
     *
     * @param String $arrivalToken
     * @param String $departureToken
     * @return Integer Id of updated reservation
     */
    public function saveCalendarTokens($arrivalToken, $departureToken)
    {

        $update = [];
        $update['token_llegada'] = $arrivalToken;
        $update['token_salida'] = $departureToken;

        return $this->db->updateQuery($update, XNAME . '_reservas', ['id' => $this->id]);

    }

    /**
     * @brief Gets all data from reservation
     *
     * @param Integer $id
     * @return Array
     */
    protected function getData($id)
    {
        $query = "  SELECT res.*, cli.*, pag.*, res.id AS id,
                    viv.referencia, viv.titulo_".LANGUAGE." AS titulo,
                    loc.nombre AS localidad, cost.provincia, propietario_pagado,
                    prop.nombre AS nombre_propietario, prop.email AS email_propietario, prop.idioma AS idioma_propietario,
                    prop.telefono1 AS telefono1_propietario, prop.telefono2 AS telefono2_propietario,
                    cli.direccion AS direccion_cliente, cli.codigo_postal AS codigo_postal_cliente,
                    cli.localidad AS localidad_cliente, cli.pais AS pais_cliente, 
                    viv.calle AS calle_vivienda, viv.codigo_postal AS codigo_postal_vivienda
                    FROM ".XNAME."_reservas res
                    LEFT OUTER JOIN ".XNAME."_clientes cli
                    ON res.cliente_id = cli.id
                    LEFT OUTER JOIN ".XNAME."_pagos pag
                        ON res.id = pag.reserva_id
                    LEFT OUTER JOIN ".XNAME."_viviendas viv
                        ON res.vivienda_id = viv.id
                    LEFT OUTER JOIN ".XNAME."_propietarios prop
                        ON viv.propietario_id = prop.id
                    LEFT OUTER JOIN  ".XNAME."_localidades loc
                        ON viv.localidad_id = loc.id
                    LEFT OUTER JOIN  ".XNAME."_zonas zon
                        ON viv.zona_id = zon.id
                    LEFT OUTER JOIN  ".XNAME."_costas cost
                        ON loc.costa_id = cost.id
                    WHERE res.id = {$id}
                    ";
        $sql = $this->db->record($query);

        return $sql;

    }

    /**
	 * @brief converts dat from ISO format (2017-12-10) to other format. Default: 10/12/2017
	 *
	 * @param String $date
	 * @param String $format
	 * @return String
	 */
	protected function convertDateFromISO($date, $format = 'd/m/Y')
	{

        if (!$date) return;

		return date_format(date_create($date), $format);

    }
    
}