<?php

namespace App\Controllers\Web;

use App\Controllers\Controller;

use Brunelencantado\Projects\ProjectRepository;


class InicioController extends Controller
{

    public $projects;

    public function index()
    {

        $this->projects = new ProjectRepository($this->db);    
        
    }

}
