<?php
/**
 * Menu rendering class
 *
 * First set up for Global Hotels for Sale
 *
 * @author Daniel Beard / BE Creativos <daniel@creativos.be>
 */

namespace Brunelencantado\Quicklinks;


class Quicklinks
{

	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	
	public function getQuicklinks($limit = null)
	{
		
		$data = $this->getData();
		
		return $data;

	}
	
	protected function getData($limit = null)
	{
		
		$limitSql = ($limit) ? " LIMIT {$limit} " : "";
		
		$query = "
			SELECT tipo_id, localidad_id,
			tip.nombre_".LANGUAGE." AS tipo,
			loc.nombre AS localidad
			FROM ".XNAME."_quicklinks qui
			JOIN ".XNAME."_tipos tip
			ON qui.tipo_id = tip.id
			JOIN ".XNAME."_localidades loc
			ON qui.localidad_id = loc.id
			ORDER BY qui.orden
			{$limitSql}
			";
		
		$sql = $this->db->dataset($query);
		
		return $sql;
		
	}
}


// End of file