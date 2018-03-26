<?php
/**
 * Property list class
 *
 * Miralbo
 *
 * @author Daniel Beard <daniel@creativos.be>
 */

namespace Brunelencantado\Viviendas;

class ViviendasList
{
	
	protected $query 			= null;
	protected $filters 			= array();
	protected $table 			= 'viviendas';
	protected $genericListPage 	= 'viviendas';
	protected $db;
	protected $menu;
	protected $limitPerPage;
	protected $paginationOn = true;
	protected $pagination;
	
	public $remoteDomain;
	public $rows;
	public $querystring;
	public $iLimitStart;
	public $max;

	public function __construct($db, $menu)
	{
		$this->db = $db;
		$this->menu = $menu;
		$this->querystring = $this->getQuerystring();

		if ($this->paginationOn) {
			$resultadosPorPagina = webConfig('resultados_por_pagina');
			$this->limitPerPage = ($resultadosPorPagina != '*!!*resultados_por_pagina') ? $resultadosPorPagina : 6 ;
		}
		

	}
	
	/**
	 *  Gets list of viviendas
	 *  
	 *  @return Array
	 */
	public function getList($limit = null, $order = 'main.id DESC') 
	{
		
		$location = ($this->remoteDomain) ? $this->remoteDomain : BASE_SITE;
		
		$sql = $this->getData($limit, $order);
		
		$output = array();
		
		foreach ($sql as $k => $v){
			
			// General data
			$output[$k]					= $v;
			$output[$k]['id'] 			= $v['main_id'];
			
			// Is rental?
			$output[$k]['alquiler']		= ($this->isRental($v));
			$linkPage 					= ($this->isRental($v)) ? 'viviendas-alquiler' : 'viviendas-venta';

			// Title		
			$output[$k]['titulo'] 		= 	($v['titulo'] != '') ? $v['titulo'] : 
											ViviendasHelpers::frase($v['dormitorios'], $v['tipo'], $v['localidad']);
			
			// Link
			$output[$k]['link'] 			= 	BASE_SITE . LANGUAGE . '/' . 
												$this->slugged($this->genericListPage) . '/' . 
												slug($output[$k]['titulo']) . 
												'-' . $v['main_id'] . '.html';										

			// Price
			$thousandSeperator 			= (LANGUAGE == 'en') ? ',' : '.';
			$output[$k]['precio']		= number_format($v['precio_de_venta'], 0, false, $thousandSeperator);
			
			
			$output[$k]['precio']		= ($output[$k]['alquiler']) ? $this->getLowestRentPrice($v) : $output[$k]['precio'];

			
			// Image		
			$output[$k]['img'] 			= 	($v['file_name']) ? 
											$location . 'images/' . $this->table . '/' . $v['main_id'] . '/m_' . $v['file_name'] :
											'images/noImage.png';
			
			
		};
		
		return $output;
		
	}
	
	/**
	 *  @brief Get results form database
	 *  
	 *  @param [in] $limit Limit
	 *  @return Array
	 *  
	 */
	protected function getData($limit = false, $order = null)
	{
		
		// Image query
		$imageQuery = "
						, (SELECT img.file_name as file_name
						FROM ".XNAME."_images_{$this->table} img
						WHERE img.parent_id = main.id
						ORDER BY img.orden ASC
						LIMIT 1) AS file_name";

						
		// Rental price
		$rentalPrice = (ALQUILERES) ? " precio_temp_baja," : "";
		$personas= (ALQUILERES) ? " personas," : "";
		
		// Main query
		$query = "
					SELECT main.id AS main_id, referencia, dormitorios, banos,
					sup_vivienda, sup_parcela, precio_de_venta, 
					{$rentalPrice} 
					{$personas}
					lat, lon, reservado, vendido, 
					main.titulo_".LANGUAGE." AS titulo, loc.nombre AS localidad,
					tip.nombre_".LANGUAGE." AS tipo, cla.id AS clase_id, cla.nombre_".LANGUAGE." AS clase,
					cos.nombre_".LANGUAGE." AS costa
					{$imageQuery}
					FROM ".XNAME."_{$this->table} main
					LEFT JOIN ".XNAME."_localidades loc ON main.localidad_id = loc.id
					LEFT JOIN ".XNAME."_tipos tip ON main.tipo_id = tip.id
					LEFT JOIN ".XNAME."_clases cla ON main.clase_id = cla.id
					LEFT JOIN ".XNAME."_costas cos ON main.costa_id = cos.id
					WHERE 1 = 1
		";	

		// Filters
		if (!empty($this->filters)){
			foreach ($this->filters as $filter){
				$query .= " AND ({$filter})";
			}
		}
		
		// Order
		if ($order){
				switch ($order) {
				case 'maxprice':
					$orderSql = 'precio_de_venta DESC';
					break;
				case 'minprice':
					$orderSql = 'precio_de_venta ASC';
					break;
				case 'latest':
					$orderSql = 'fecha_modificado DESC';
					break;
				case 'random':
					$orderSql = 'RAND()';
					break;
				default:
					$orderSql = 'main.id DESC';
			}
			
			$query .= " ORDER BY {$orderSql}";
			
		}
		
		// Limit
		if ($limit) {
			$query .= " LIMIT {$limit}";
		} else {
			
			if ($this->paginationOn == true) {
				// Pagination setup
				$oPagination 	= $this->pagination = $this->setupPagination($query);
				$iLimitStart 	= $oPagination->prePagination();
				$query	 		.= " LIMIT {$iLimitStart}, {$this->limitPerPage} ";				
			}

		}
		
		$this->query = $query;
		
		return $this->db->dataset($query);
		
	}
	
	 /**
	 *  Adds filter to query
	 *  
	 *  @param [in] $filter filter to add to query
	 *  
	 *  @return void
	 */
	public function addFilter($filter)
	{
		$this->filters[] = $filter;
	}


	
    /**
     * Sanitizes whole array of data for SQLconsumption
     * 
     * @param <type> $data array 
     * 
     * @return <type> array
     */
	
	public function sanitize(array $data)
	{
		
		$output = [];
		
		foreach ($data as $k => $v) {
			
			if ($v == '') continue;
			
			$output[$k] = filter_var($v, FILTER_SANITIZE_STRING);
			
		}
		
		return $output;
		
	}
	
	/**
	 *  Returns pagination HTML
	 *  
	 *  @return void
	 */
	public function pagination()
	{
		return $this->pagination->pagination();
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
	
	
	/**
	 *  @brief Prepares pagination object
	 *  
	 *  @return object
	 *  
	 */
	protected function setupPagination($query)
	{
		global $base_site, $menu;
		$sql = $this->db->query($query);
	
		$nRows = ($sql) ? $sql->num_rows : 0;
		$this->rows = $nRows;
		
		$iPage = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
		$location = $menu->getUrl($this->genericListPage)  . $this->querystring . '&page';
		$oPagination = new \Pagination($this->limitPerPage, $nRows, $iPage, $location);
		
		// Items for paging
		$this->iLimitStart 	= $oPagination->prePagination();
		$this->max = ($this->rows > $this->limitPerPage) ? $this->iLimitStart + $this->limitPerPage : $this->rows;
		
		return $oPagination;
	}
	
	
	/**
	 *  @brief Gets querystring for pagination
	 *  
	 *  @return String
	 *  
	 */
	protected function getQuerystring()
	{
		// Returns the full querystring of the current URL
		$querystring = "?";
		foreach($_GET as $k=>$v){ 
			if ($k != 'page' && $k != 'submit' && $k != 'slug' && $k != 'idioma' && !is_array($v)){
				
				$querystring = $querystring . $k . '=' . $v . '&';
			}
		} 
		return $querystring;
	}
	
	public function setViviendaPage($page)
	{
		
		$this->genericListPage = $page;
		
	}

	/**
	 * Looks forthe lowest rental price
	 *
	 * @return string price with €/week
	 */
	protected function getLowestRentPrice($data)
	{

		return ($data['precio_temp_baja'] > 0) ? $data['precio_temp_baja'] . '&euro; / ' . trad('semana') : trad('consultar');
		

	}


	protected function isRental($data)
	{

		return ($data['clase_id'] == 3 && ALQUILERES);

	}

	protected function slugged()
	{

		return $_GET['slug'];

	}

	
}



// End of file