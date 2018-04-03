<?php
/**
 * Date reservation quote class
 *
 * @author Daniel Beard <daniel@creativos.be>
 *
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class ReservationQuote
{

    protected $db;
    protected $id;
    protected $data;
    protected $table = 'presupuestos';
    
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
    public function getDetails($id)
    {

        $this->id = $id;

        $output = $this->getData($id);

        $output['fecha_llegada'] = $this->convertDateFromISO($output['fecha_llegada']);
        $output['fecha_salida'] = $this->convertDateFromISO($output['fecha_salida']);

        $output['nombre_completo'] = $output['nombre'] . ' ' . $output['apellido'];

        return $output;

    }

    /**
     * @brief Sets the sent email date
     *
     * @param Integer $id
     * @return Void
     */
    public function markSent($id)
    {

        $today = date('Y-m-d');

        $query = "UPDATE ".XNAME."_{$this->table} SET fecha_enviado = '{$today}'";
        
        $this->db->query($query);

    }

    /**
     * @brief Gets all data from reservation
     *
     * @param Integer $id
     * @return Array
     */
    protected function getData($id)
    {

        $query = "
                    SELECT pre.*, cli.*, 
                    viv.titulo_".LANGUAGE." AS titulo, viv.referencia,
                    loc.nombre AS localidad
                    FROM ".XNAME."_{$this->table} pre
                    LEFT OUTER JOIN ".XNAME."_clientes cli
                        ON pre.cliente_id = cli.id
                    LEFT OUTER JOIN ".XNAME."_viviendas viv
                        ON pre.vivienda_id = viv.id
                    LEFT OUTER JOIN ".XNAME."_localidades loc
                        ON viv.localidad_id = loc.id
                    WHERE pre.id = {$id}
                    ";
        $sql  = $this->db->record($query);

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