<?php 

class Personas {
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $avatar;

    function __construct($nombre,$apellido,$email,$avatar)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->avatar = $avatar;
    }

    
} 
