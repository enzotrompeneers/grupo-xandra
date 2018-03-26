<?php
/**
 * Page rendering class
 *
 * First set up for Miralbó Urbana
 *
 * @author Daniel Beard / BE Creativos <daniel@creativos.be>
 */

namespace Brunelencantado\Content;


class Page
{

	protected $db;
	protected $home = 'inicio';
	protected $data = array();
	protected $children = array();

	public $clave;
	public $slug;
	
	public function __construct($db)
	{

		$this->db = $db;
	
	}
	
	public function getPageFromSlug($slug)
	{

		$this->slug = $slug;

		$query = "SELECT clave  FROM ".XNAME."_articulos WHERE slug_".LANGUAGE." = '{$slug}'";
		$sql = $this->db->record($query);
		
		$this->clave = ($slug) ? $sql['clave'] : $this->home;
		
		$this->getData();
	
		return $this;

	}

	/**
	 *  @brief Generic property getter
	 *  
	 *  @param [in] $property 
	 *  @return string
	 *  
	 */
	public function getProperty($property)
	{
		return $this->data[$property];
	}
	
	/**
	 *  @brief Gets page title 
	 *  
	 *  @return String
	 *  
	 */
	public function title($clave = null)
	{
		
		if (!$clave) {
			
			return $this->data['titulo'];
			
		} 
			
		return $this->getFieldByClave('titulo', $clave);
		
	}

	/**
	 *  @brief Gets page body text 
	 *  
	 *  @return String
	 *  
	 */	
	public function text($clave = null)
	{
		
		if (!$clave) {
			
			$helper = $this->getHelper($this->clave);
			return $helper . $this->data['text'];
			
		}
			
		$helper = $this->getHelper($clave);
		return $helper .$this->getFieldByClave('art', $clave);
			
	}
	
	/**
	 *  @brief Gets page link text 
	 *  
	 *  @return String
	 *  
	 */	
	public function link($clave = null)
	{
		
		if (!$clave) {
			
			return ($this->data['link']) ? $this->data['link'] : '!' . $this->clave;
			
		}
		
		return $this->getFieldByClave('link', $clave);
		
	}
	
	/**
	 *  @brief Gets page slug
	 *  
	 *  @return String
	 *  
	 */	
	public function slug($clave = null)
	{
		
		if (!$clave) {
			
			return $this->data['slug'];
			
		}
		
		return $this->getFieldByClave('slug', $clave);
		
	}
	
	/**
	 *  @brief Gets page meta keywords 
	 *  
	 *  @return String
	 *  
	 */
	public function meta_key($clave = null)
	{
		if (!$clave) {
			
			return $this->data['meta_key'];
			
		}
		
		return $this->getFieldByClave('meta_key', $clave);
		
	}
	
	/**
	 *  @brief Gets page meta description 
	 *  
	 *  @return String
	 *  
	 */
	public function meta_descr($clave = null)
	{
		if (!$clave) {
			
			return $this->data['meta_descr'];
		
		}
			
		return $this->getFieldByClave('meta_descr', $clave);
			
	}
	
	/**
	 *  @brief Gets page meta description 
	 *  
	 *  @return String
	 *  
	 */
	public function id()
	{
		return $this->data['id'];
	}
	
	/**
	 *  @brief Gets all images related to an article
	 *  
	 *  @return array
	 *  
	 */
	public function getImages($clave = null, $size = 'l')
	{
		$id = ($clave) ? $this->getIdByClave($clave) : $this->data['id'];
		$sql = $this->getImagesData($id);
		
		
		$output = array();
		foreach ($sql as $k => $v){
			$output[] = 'images/articulos/' . $id . '/' . $size . '_' . $v['file_name'];
		}
		
		return $output;
	}
	
	/**
	 *  @brief Gets all images related to an article
	 *  
	 *  @return array
	 *  
	 */
	public function getImagesDescr($size = 'l')
	{
		$id = $this->data['id'];
		$sql = $this->getImagesData($id);
		
		$output = array();
		$n = 0;
		foreach ($sql as $k => $v){
			
			$output[$n]['file_name'] = 'images/articulos/' . $id . '/' . $size . '_' . $v['file_name'];
			$output[$n]['descr'] = $v['descr'];
			
			$n++;
		}
		
		return $output;
	}
	
	
    /**
     *@ brief Gets first image of page
     *
     */
	public function getFirstImage($size = 'l', $clave = null)
	{
		
		global $base_site;
		
		$imageClave = ($clave) ? $clave : $this->clave;
		
		$query = "	SELECT file_name, art.id AS aid
					FROM ".XNAME."_images_articulos img
					JOIN ".XNAME."_articulos art
						ON img.parent_id = art.id
					WHERE art.clave = '{$imageClave}'";
		$sql = $this->db->record($query);
		
		$imageUrl = $base_site . 'images/articulos/' . $sql['aid'] . '/' . $size . '_' . $sql['file_name'];
		
		return $imageUrl;
		
	}
	
	/**
	 *  @brief Gets all files related to an article
	 *  
	 *  @return array
	 *  
	 */
	public function getFiles()
	{
		$id = $this->data['id'];
		$sql = $this->getFilesData($id);
		
		$output = array();
		foreach ($sql as $k => $v){
			$output[] = $v['file_name'];
		}
		
		return $output;
	}
	
	/**
	 *  @brief Gets children data
	 *  
	 *  @return void
	 *  
	 */
	public function getChildren()
	{
		$query = "	SELECT id, clave, 
					titulo_".LANGUAGE." AS title,
					link_".LANGUAGE." AS link,
					slug_".LANGUAGE." AS slug,
					art_".LANGUAGE." AS text
					FROM ".XNAME."_articulos
					WHERE parent_id = {$this->data['id']}
					ORDER BY orden
					";
		$sql = $this->db->dataset($query);
		
		$data = array();

		foreach ($sql as $k => $v){
			
			$data[$v['clave']] = $v;
			
			$helper = $this->getHelper($this->clave . ' -> ' . $v['clave']);
			$data[$v['clave']]['text'] = $helper . $v['text'];
			
		}

		$this->children = $data;

		return $this->children;
	}
	
	/**
	 *  @brief Gets the images of a child
	 *  
	 *  @param [in] $clave Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details Details
	 */
	public function getChildImages($clave, $size = 'l')
	{
		$childId = $this->children[$clave]['id'];	
		
		$sql = $this->getImagesData($childId);
		
		$output = array();
		foreach ($sql as $k => $v){
			$output[] = 'images/articulos/' . $childId . '/' . $size . '_' . $v['file_name'];
		}
		
		return $output;
	}
	

	
	/**
	 *  @brief Gets data for page
	 *  
	 *  @return void
	 *  
	 */
	protected function getData()
	{
		$query = "	SELECT id, clave, parent_id,
					titulo_".LANGUAGE." AS titulo,
					link_".LANGUAGE." AS link,
					slug_".LANGUAGE." AS slug,
					meta_key_".LANGUAGE." AS meta_key,
					meta_descr_".LANGUAGE." AS meta_descr,
					art_".LANGUAGE." AS text
					FROM ".XNAME."_articulos 
					WHERE clave = '{$this->clave}'
					";
		$this->data = $this->db->record($query);
	}
	
	/**
	 *  @brief Gets array of images for a given id
	 *  
	 *  @param [in] $id id of article
	 *  @return array
	 *  
	 */
	protected function getImagesData($id)
	{
		$query = "SELECT file_name FROM ".XNAME."_images_articulos WHERE parent_id = {$id} ORDER BY orden";
		return $this->db->dataset($query);
	}
	
	/**
	 *  @brief Gets array of files for a given id
	 *  
	 *  @param [in] $id id of article
	 *  @return array
	 *  
	 */
	protected function getFilesData($id)
	{
		return $this->db->dataset("SELECT file_name FROM ".XNAME."_files_articulos WHERE parent_id = {$id} ORDER BY orden");
	}
	
	protected function getHelper($clave)
	{
		$helper = (!empty($_SESSION['Admin']) && $_SESSION['Admin'] == true) ? '<strong style="font-size:.8rem;">(' . $clave . ')</strong> ' : '';
		return $helper;
	}
	
    /**
     * @brief Gets any field from any articulo
     * 
     * @param <type> $field 
     * @param <type> $clave 
     * 
     * @return <type>
     */
	
	protected function getFieldByClave($field, $clave)
	{
		
		$query = "SELECT {$field}_".LANGUAGE." AS field FROM ".XNAME."_articulos WHERE clave = '{$clave}'";
		$sql = $this->db->record($query);
		
		$helper = ($field == 'slug') ? '' : '!';
		
		$output = ($sql['field'] != '') ? $sql['field'] : $helper . $clave;
		
		return $output;
		
	}
	
    /**
     * @brief Gets id of articulo by clave
     * 
     * @param <type> $clave 
     * 
     * @return <type>
     */
	
	protected function getIdByClave($clave)
	{
		
		$query = "SELECT id FROM ".XNAME."_articulos WHERE clave = '{$clave}'";
		$sql = $this->db->record($query);
		
		return $sql['id'];
		
	}
	
}


// End of file