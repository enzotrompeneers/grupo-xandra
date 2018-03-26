<?php

namespace Brunelencantado\Projects;

use Brunelencantado\Database\DbInterface;

class ProjectRepository
{

    protected $db;
    protected $data = [];

    protected $imagePath = 'images/proyectos/';

    public function __construct(DbInterface $db)
    {

        $this->db = $db;

        $this->data = $this->getData();

    }
    
    public function getItem($clave)
    {

        return $this->data[$clave];

    }

    public function getName($clave)
    {

        return $this->data[$clave]['nombre'];

    }

    public function getCategory($clave)
    {

        return $this->data[$clave]['categoria'];

    }

    public function getUrl($clave)
    {

        return $this->data[$clave]['url'];

    }

    public function getId($clave)
    {

        return $this->data[$clave]['id'];

    }

    public function getThumbnail($clave)
    {

        return $this->imagePath . $this->getId($clave) . '/' . $this->data[$clave]['thumbnail'];

    }

    protected function getData()
    {

        $query = "
                SELECT pro.*, pro.nombre_".LANGUAGE." AS nombre,
                cat.nombre_".LANGUAGE." AS categoria
                FROM ".XNAME."_proyectos pro
                LEFT JOIN ".XNAME."_categorias cat
                    ON pro.categoria_id = cat.id
                ORDER BY pro.orden
                ";
        $sql = $this->db->dataset($query);

        $output = $this->processData($sql);

        return $output;

    }

    protected function processData($data)
    {

        $output = [];

        foreach ($data as $item) {

            $output[$item['clave']] = $item;

        }

        return $output;

    }
}