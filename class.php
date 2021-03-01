<?php

class Artista {
    protected $imagen;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $tipoCuenta;
    protected $url;

    public function __construct($imagen,$nombre,$apellido,$email,$tipoCuenta,$url)
    {
        $this->imagen = $imagen;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->tipoCuenta = $tipoCuenta;
        $this->url = $url;
    }
    
}