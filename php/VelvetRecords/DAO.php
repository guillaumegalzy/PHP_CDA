<?php

    class DAO
    {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', "root", "");  
        }
    }

