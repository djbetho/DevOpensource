<?php
    // Clase Db
class Db {
    public $mysql;

    function __construct() {
        $this->mysql = new mysqli('localhost', 'root', '', 'cumbres') or die("Problemas al conectar con la base de datos.");
    }
}
    // Fin Clase Db
