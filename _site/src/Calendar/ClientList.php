<?php
/**
 * Client list class
 *
 * @author Daniel Beard <daniel@creativos.be>
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class ClientList
{
	
	protected $table = 'clientes';
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
	public function getList() 
	{
		
        $sql = $this->getData();
        $output = $sql;

        return $output;
		
	}
	
	/**
	 *  @brief Get results form database
	 *  
	 *  @param [in] $limit Limit
	 *  @return Array
	 *  
	 */
	protected function getData()
	{
		$query = "SELECT * FROM ".XNAME."_clientes";	
		return $this->db->dataset($query);
		
	}
	
	/**
	 *  Changes the product table
	 *  
	 *  @return Void
	 */
	public function setTable($tableName)
	{
		$this->table = $tableName;
	}
	
	
	
}



// End of file