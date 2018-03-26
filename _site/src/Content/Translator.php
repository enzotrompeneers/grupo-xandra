<?php
/**
 * Translations class
 *
 * @author Daniel Beard / BE Creativos <daniel@creativos.be>
 */

namespace Brunelencantado\Content;

use \Brunelencantado\Database\DbInterface;

class Translator 
{

    protected $db;
    protected $data;
    protected $table;
    
    public function __construct(DbInterface $db)
    {

        $this->db = $db;
        $this->table = XNAME . '_traducciones';

    }

    public function trans($key)
    {

        if (!$this->data) $this->getData();

        if (!array_key_exists($key, $this->data)) return '!!' . $key;
        
        $translation =  ($this->data[$key]);

        if ($translation == '') return '!' . $key;

        return $translation;

    }

    protected function getData()
    {

        $query = "SELECT clave, ".LANGUAGE." AS translation FROM {$this->table} WHERE used = 1 ORDER BY clave";
        $sql = $this->db->dataset($query);

        $output = [];
        foreach ($sql as $item) {

            $output[$item['clave']] = $item['translation'];

        }

        $this->data = $output;

    }

    protected function addUsed($key)
    {

        $query = "UPDATE {$this->table} SET used = 1 WHERE clave = '$key'";
        $this->db->query($query);

    }

    protected function addKey($key)
    {

        $this->data[$key] = '';

        $query = "INSERT INTO {$this->table} (key, used) VALUES ({$key}, 1)";
        $this->db->query($query);

    }

    public function setTable($table)
    {

        $this->table = $table;

    }


}