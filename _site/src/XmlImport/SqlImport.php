<?php
/**
 * xml_import.class.php
 * Copyright (C)2015  Daniel beard <daniel@brunel-encantado.com> 
 * XML import functions // Default is for Kyero format, any other format must create child
 * 
 */

namespace Brunelencantado\XmlImport;

use \Brunelencantado\Logger\Logger;

class SqlImport extends XmlImport
{

	
	public	 $log;
	
	public $xml;
	public $db;
	public $remoteDb;
	
	
	public function __construct($db)
	{
		
		$this->db = $db;	
		$this->log = $db->log;
		
	}
	
	public function setRemoteDb ($remoteDb)
	{
		
		$this->remoteDb = $remoteDb;
		
	}
	

	/**
	 * Retrieves remote properties and puts into an array
	 */	
	public function getRemoteProperties($table, $limit = null)
	{
		
		$query = "SELECT * FROM {$table}";
		
		if ($limit) {
			$query .= " LIMIT " . pLIMIT;
		}
		
		$sql = $this->remoteDb->dataset($query);
		
		return $sql;
		
	}
	

	// Images in another table
	public function getRemoteImages($id, $idField = 'id', $table, $orden)
	{
		
		$query = "SELECT * FROM {$table} WHERE {$idField} = {$id} ORDER BY {$orden}";
		$sql = $this->remoteDb->dataset($query);
		printout($query);
		return $sql;
		
	}
	
    /**
     * Strips tags and converts text blocks to html paragraphs
     * 
     * @param <type> $text string
     * 
     * @return <type> string
     */
	
	public function cleanupText($text) {
		
		$untaggedText = strip_tags($text);
		
		$aText = explode("\n", $untaggedText);
		$output ='';

		for($i=0; $i < count($aText); $i++) {
			
			if(strlen(trim($aText[$i])) > 0) $output.='<p>' .trim($aText[$i]).'</p>';
			
		}
		
		return $output;
	}

	public function setAgent($agent)
	{

		$this->agent = $agent;

	}

}







// End of file