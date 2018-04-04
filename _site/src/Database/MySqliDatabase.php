<?php
/**
 * Database connect and tools class
 *
 * Connects to database and implements basic functions
 *
 * @author Daniel Beard <daniel@brunel-encantado.com>
 *
 */

namespace Brunelencantado\Database;

use \Brunelencantado\Logger\Logger;
use \Brunelencantado\Logger\LoggerWeb;
use \Brunelencantado\Database\DbInterface;

class MySqliDatabase implements DbInterface
{
	private $live 	= true;
	private $debug 	= false;
	
	private $connectionData = null;
	private $connection = null;
	public $log 		= null;
	
	private $hostname 	= null;
	private $database 	= null;
	private $username 	= null;
	private $password 	= null;
	
	public $error;
	public $errorno;
	
	// Constructor, gets connection data and connects
	public function __construct(array $aConnectionData, $log = null)
	{
		$this->host 	= $aConnectionData['hostname'];
		$this->database = $aConnectionData['database'];
		$this->username = $aConnectionData['username'];
		$this->password = $aConnectionData['password'];
		
		$this->log = $log;

		$this->connect();
		$this->connection->set_charset('utf8');	

	}
	
	// Connect to to database
	private function connect()
	{
		$this->connection = new \mysqli(
				$this->hostname, 
				$this->username, 
				$this->password, 
				$this->database
				);
		if ($this->connection->connect_error) {
			$this->log->write(LoggerWeb::ERROR, 'Connection error --> (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
			return false;
		} else {
			$this->log->write(LoggerWeb::INFO, 'Database connected');
			return true;
		}
	}
	
	// Insert query builder
    public function insertQuery(array $insert, $table)
    {
		$keys	= array_keys($insert);
		$values	= array_values($insert);
		$ultimo = array_pop($values);
		$query  = 'INSERT INTO ' . $table . '(' . implode(', ' , $keys) . ') VALUES (';
		foreach ($values as $value) {
			$query .= '\'' . $value . '\', ';
		}
		if (is_numeric($ultimo)) {
			$query .= $ultimo;
		}
		else {
			$query .= '\'' . $ultimo . '\'';
		}
		$query .= ');';
		$this->query($query);
		return $this->lastId();
    }
	
	// Update query builder
	public function updateQuery(array $update, $table, array $where)
    {
		$query  = 'UPDATE ' . $table . ' SET ';
		$keys	= array_keys($update);
		$values	= array_values($update);	
		$ultimo = array(array_pop($keys), array_pop($values));
		$count  = count($keys);
		
		for ($i=0; $i < $count; $i++) {
			$query .= $keys[$i] . '=\'' . $values[$i] . '\', ';
		}
		$query .= $ultimo[0] . '=\'' . $ultimo[1] . '\' ';
		
		if ($where) {
			$query .= ' WHERE 1=1 ';
			foreach ($where as $key => $value) {
			$query .= 'AND ' . $key . ' = \'' . $value . '\' ';
			}
		}
		$this->query($query);
		if ($this->connection->error) return;

		return true;
		
    }
	
	// Delete query builder
	public function deleteQuery ($table, $id)
	{
		$query = 'DELETE FROM ' . $table . ' WHERE id=' . $id;

		$this->query($query);
	}
	
	// Basic query | returns true or error
	public function query($query)
	{
		
		// Show query
		if ($this->debug) {
			$this->log->write(Logger::SQL, $query);
		}		
		// Execute query		
		if ($this->live){
			$sql = $this->connection->query($query);
			if ($this->connection->error){
				// Log error
				$this->error = $this->connection->error;
				$this->errno = $this->connection->errno;
				$this->log->write(Logger::ERROR, 'MySql Error (Err_no: ' . $this->connection->errno . ') ' . $this->connection->error);
			} else {
				return $sql;
			}
		}
		

	}
	
	// Debug mode | Set to true if we want debug mode
	public function setDebugMode($debug = false)
	{
		$this->debug = true;
	}
	
	// toggle live setting | Set to false if we don't want queries to run
	private function setLiveQuery($live = true)
	{
		$this->live = $live;
	}
	
	// Shows the logged details
	public function showLog()
	{
		if ($this->debug) {
			return $this->log->showLog();
		}
		
	}
	
	// Returns last inserted db entry
	public function lastId()
	{
		return $this->connection->insert_id;
	}
	
	// Sanitize variable for query
	public function sanitize($rawString)
	{
		$sanitizedString = $this->connection->escape_string($rawString);
		return $sanitizedString;
	}
	
	// Converts object result to array
	public static function obj2Array($object)
	{
		$array = array();
		if (is_object($object)){
			while ($row = $object->fetch_assoc()){
				$array[] = $row;
			}
		}
		return $array;
		
	}	
	
	// Returns 1 table row as array
	public function record($query){
		$sql = $this->query($query);
		
		if (is_object($sql) && $sql->num_rows > 0){
			$sql = $this->obj2Array($sql);
			$output = call_user_func_array('array_merge', $sql);
			return $output;		
		}
	}
	
	// Returns multiple table rows as array
	public function dataset($query){
		$sql = $this->query($query);
		$output = $this->obj2Array($sql);
		return $output;
	}

}


// End of file