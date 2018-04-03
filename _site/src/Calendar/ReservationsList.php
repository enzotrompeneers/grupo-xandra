<?php
/**
 * Reservation list class
 *
 * @author Daniel Beard <daniel@creativos.be>
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class ReservationsList
{
	
	protected $table = 'reservas';
	protected $db;


	public function __construct(DbInterface $db)
	{
        
		$this->db = $db;

	}
	
	/**
	 *  Gets list of viviendas
	 *  
	 *  @return Array
	 */
	public function getList($propertyId = null, $options = []) 
	{
		
        $sql = $this->getData($propertyId, $options);

        $output = [];

		if (!$sql) return $output;

        foreach ($sql as $k => $v) {
        
            $output[$k] = $v;
            $output[$k]['id'] = $v['res_id'];
            $output[$k]['fecha_llegada_iso'] = $v['fecha_llegada'];
            $output[$k]['fecha_salida_iso'] = $v['fecha_salida'];
            $output[$k]['fecha_llegada'] = $this->convertDateFromISO($v['fecha_llegada']);
            $output[$k]['fecha_salida'] = $this->convertDateFromISO($v['fecha_salida']);
            $output[$k]['nombre_completo'] = $v['nombre'] . ' ' . $v['apellido'] ;

            $today = date('Y-m-d');
            
            $output[$k]['pasado'] = ($v['fecha_salida'] < $today) ? 'pasado' : '';
            $output[$k]['actual'] = ($v['fecha_llegada'] < $today && $v['fecha_salida'] > $today) ? 'actual' : '';

        }
        
        return ($output);
		
	}
	
	/**
	 *  @brief Get results form database
	 *  
	 *  @param [in] $limit Limit
	 *  @return Array
	 *  
	 */
	protected function getData($propertyId = null, $options = [])
	{
		$today = date('Y-m-d');

		// Filters
		$noPastQuery = (isset($options['noPast']) && $options['noPast'] == true) ? " AND fecha_llegada >=  '{$today}' AND fecha_salida >=  '{$today}'"   : "";
		$onlyConfirmedQuery = (isset($options['onlyConfirmed']) && $options['onlyConfirmed'] == true) ? " AND confirmado = 1  " : "";

		$filterByDays = null;
		if (isset($options['days'])) {

			$lastDay = date('Y-m-d', strtotime($today. ' + ' . $options['days'] . ' days'));
			$filterByDays = " AND ( fecha_llegada >= '{$today}' && fecha_llegada <= '{$lastDay}') ";

		}

		$propertyQuery = ($propertyId) ? " AND vivienda_id = {$propertyId} " : "";
		
		// Main query
		$query = "  SELECT res.*, cli.*, res.id AS res_id,
					viv.referencia, viv.titulo_".LANGUAGE." AS titulo,
					pag.pagado
					FROM ".XNAME."_{$this->table} res
					LEFT JOIN ".XNAME."_clientes cli
						ON res.cliente_id = cli.id
					LEFT JOIN ".XNAME."_viviendas viv
						ON res.vivienda_id = viv.id
					LEFT JOIN ".XNAME."_pagos pag
						ON res.id = pag.reserva_id
					WHERE 1 = 1
					{$noPastQuery}
					{$filterByDays}
					{$propertyQuery}
					{$onlyConfirmedQuery}
                    ORDER BY fecha_llegada DESC
					";	
		return $this->db->dataset($query);
		
	}
	
	/**
	 *  Changes the product table
	 *  
	 *  @return void
	 */
	public function setTable($tableName)
	{
		$this->table = $tableName;
	}
	
    protected function convertDateFromISO($date)
	{

		$format = 'd/m/Y';
		return date_format(date_create($date), $format);

	}
	
}



// End of file