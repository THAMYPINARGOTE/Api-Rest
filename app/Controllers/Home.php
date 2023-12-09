<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }


public function Vehiculo1(){


    $variable= array(

        "patente"=>"AA1234",
        "marca"=>"chevrolet",
        "modelo"=>"Dmax",
        "categoria"=>"001"


    );


return $this->response->setJson($variable);
}

public function Vehiculo2(){


    $variable= array(

        "patente"=>"ABI0173",
        "marca"=>"toyota",
        "modelo"=>"Hilux",
        "categoria"=>"002"


    );


return $this->response->setJson($variable);
}

public function Vehiculo3(){


    $variable= array(

        "patente"=>"BCO2340",
        "marca"=>"mazda",
        "modelo"=>"Bt50",
        "categoria"=>"003"


    );


return $this->response->setJson($variable);
}

public function Vehiculos4(){


    $variable= array(

        "patente"=>"JST3487",
        "marca"=>"nissan",
        "modelo"=>"Suvs",
        "categoria"=>"004"


    );


return $this->response->setJson($variable);
}

}
