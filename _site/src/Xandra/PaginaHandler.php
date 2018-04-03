<?php
/**
 * Domain listing class
 *
 * @author Daniel Beard / Enzo Trompeneers / BE Creativos <daniel@creativos.be>
 */

namespace Brunelencantado\Xandra;

use \Brunelencantado\Database\DbInterface;

class PaginaHandler
{

    protected $db;
    protected $language;

    public function __construct(DbInterface $db, $language)
    {

        $this->db = $db;
        $this->language = $language;
       

    }

    public function getDetails($id)
    {

        $query = "
                    SELECT 
                    id, dominio,
                    titulo_nl as titulo,
                    h1_nl as h1,
                    subtitulo_nl as subtitulo,
                    cita_sandra_nl as cita_sandra,
                    texto_nl as texto,
                    url_nl as url,
                    titulo_presupuesto_nl as titulo_presupuesto,
                    meta_descr_nl as meta_descr,
                    meta_key_nl as meta_key
                    FROM ".XNAME."_paginas
                    WHERE id = $id
                    ";

        $sql = $this->db->record($query);

        return $sql;

    }


    /**
     * @brief Get list of pages/domains
     *
     * @return Array
     */
    public function getList()
    {

        $data = $this->getData();

        return $data;

    }

    /**
     * @brief Get raw data
     *
     * @return Array
     */
    protected function getData()
    {

        $query = "
                    SELECT id, dominio,
                    titulo_nl AS titulo,
                    url_nl AS url
                    FROM ".XNAME."_paginas
                    ";
        $sql = $this->db->dataset($query);

        return $sql;

    }

}