<?php
/**
 * Menu rendering class
 *
 * First set up for Global Hotels for Sale
 *
 * @author Daniel Beard / BE Creativos <daniel@creativos.be>
 */

namespace Brunelencantado\Content;


class Menu
{

	protected $db;
	protected $menuData = array();
	protected $menus = array();
	protected $homeClave = 'inicio';
	protected $baseUrl;
	
	public $hasMenuClass = 'has-dropdown';
	public $menuClass = 'dropdown';
	public $activeClass = 'active';

	public function __construct($db)
	{
		$this->db = $db;
	}
	
	/**
	 *  @brief Gets data and creates menu from data
	 *  
	 *  @param [in] $clave Key 
	 *  
	 *  @return HTML list
	 *  
	 */
	public function createMenu($clave = 'header')
	{
		
		$this->createMainMenu($clave);
		$this->insertSubmenus($clave);
		
		return $this->renderMenu($clave);

	}
	
	
	
	/**
	 *  @brief Queries database for menu content
	 *  
	 *  @param [in] $clave Key
	 *  @return Array
	 *  
	 */
	protected function createMainMenu($clave)
	{
		
		if (!$this->menuData) $this->setMenuData();

		$menuData = $this->menuData;
		
		$n = 0;
		$menuStructure = array();

		foreach ($menuData as $k => $v){

			if ($v['header_menu'] == 0) continue;
			if (($v['footer_menu'] == 0 && $clave == 'footer') ||  ($clave == 'footer' && $v['parent_id'])) continue; // Footer has no submenu
			$menuStructure[$v['id']] = $v;
			
			$n++;

		}

		$this->menus[$clave] = $menuStructure;


	}
	
    /**
     * @brief Gets full url from key
     * 
     * @param string $clave 
     * 
     * @return string
     */
	
	public function getUrl($clave)
	{
		
		$base = $this->baseUrl . '/' . LANGUAGE . '/';
		
		$menuItem = $this->getMenuItem($clave);
		
		$slug = (isset($menuItem['slug'])) ? $menuItem['slug'] : $clave;
		
		$url = ($clave == $this->homeClave) ? $base : $base . $slug .'/';
		
		return $url;
		
	}
	
    /**
     * @brief Gets link text from key
     * 
     * @param string $clave 
     * 
     * @return string
     */
	
	public function getLink($clave)
	{
		
		$menuItem = $this->getMenuItem($clave);
		
		if ($menuItem) {
			
			$link = $menuItem['link'];
			
			return $link;
			
		} 
		
		return '!' . $clave;

		
	}
		
    /**
     * @brief Gets link text from key
     * 
     * @param string $clave 
     * 
     * @return string
     */
	
	public function getTitle($clave)
	{
		
		$menuItem = $this->getMenuItem($clave);
		
		if ($menuItem) {
			
			$title = $menuItem['titulo'];
			
			return $title;
			
		} 
		
		return '!' . $clave;

		
	}
	
	public function setBaseUrl($baseUrl)
	{

		$this->baseUrl = $baseUrl;

	}

	
    /**
     * @brief Collects all menu data from DB and sets to menuData
     * 
     * 
     * @return void
     */
	
	public function setMenuData()
	{
		
		$query = " 	SELECT id, clave, link_" . LANGUAGE . " AS link,  titulo_" . LANGUAGE . " AS titulo,
					slug_" . LANGUAGE . " AS slug, header_menu, footer_menu, parent_id, orden
					FROM " . XNAME . "_articulos 
					ORDER BY orden
					";
					
		$sql = $this->db->dataset($query); 
		
		$this->menuData = $sql;

	}
	
    /**
     * @brief Gets menu item by key
     *
     *
     * @param string $clave
     *
     * @return array
     */
	
	protected function getMenuItem($clave)
	{
		
		$menuData = $this->menuData;
		
		$row = [];
		
		foreach ($menuData as $k => $v) {
			
			if ($v['clave'] == $clave) {
				
				$row = $v;
				
			}
			
		}
		
		return $row;
		
	}
	
	/**
	 *  @brief Gets submenus and inserts into main menu
	 *  
	 *  @param [in] $clave Parameter_Description
	 *  @return void
	 *  
	 */
	protected function insertSubmenus($clave)
	{
		
		foreach ($this->menus[$clave] as $k => $v){
			
			if ($v['parent_id'] == 0) continue;
			
			$parent = $v['parent_id'];
			$this->menus[$clave][$parent]['submenu'][] = $v;
			
			unset($this->menus[$clave][$v['id']]);
			
		}
	}
	
	/**
	 *  @brief Renders HTML menu from array
	 *  
	 *  @param [in] $clave Key
	 *  @return HTML list
	 *  
	 */
	protected function renderMenu($clave)
	{
		
		$data = $this->menus[$clave];

		
		$output = '<ul>';
		foreach ($data as $k => $v){
			$submenu = (array_key_exists('submenu', $v)) ? $v['submenu'] : false;
			
			// Insert submenu
			if ($submenu) {
				$submenuHTML = '<div class="subnav-outer"><ul class="' . $this->menuClass . '">';
				foreach($submenu as $x => $y){
					$submenuHTML .= $this->renderListElement($y);
				}
				$submenuHTML .= '</ul></div>';
				$v['submenuHtml'] = $submenuHTML;
			}
			
			// Render this element
			$output .= $this->renderListElement($v);
			
		}
		$output .= '</ul>';
		
		return $output;
	}
	

	
	/**
	 *  @brief Renders to HTML list from data
	 *  
	 *  @param [in] $data Page data
	 *  @return <li> element
	 *  
	 */
	protected function renderListElement($data)
	{
		$submenuHtml = false;
		$hasMenuClass = false;
		
		// Submenu HTML & class
		if (array_key_exists('submenuHtml', $data)) {
			$submenuHtml = $data['submenuHtml'];
			$hasMenuClass = $this->hasMenuClass;
		} 
		
		
		$link = LANGUAGE . '/' . $data['slug'] . '/';
		
		if ($data['clave'] == 'inicio') $link = LANGUAGE . '/';
		
		return '	<li class="' . $data['clave'] . ' ' . $hasMenuClass . '">
						<a href="' . $link . '" title="' . $data['titulo'] . '">
							' . $data['link'] . ' 
						</a>
						' . $submenuHtml . '
					</li>';
	}
}


// End of file