<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;


class migration_model extends core_model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createCoreTables()
    {
        $query =
            "
            CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL
            );
            CREATE TABLE IF NOT EXISTS terceros(
                id integer primary key,
                nombre varchar(100),
                apellido varchar(100),
                dni integer,
                email varchar(100),
                telefono integer,
                comentarios text
            );
            ";
            
            try {
                $this->db->exec($query);
                
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function createTables()
        {
            $query = 
            "
            CREATE TABLE IF NOT EXISTS terceros(
                id integer primary key,
                nombre varchar(100),
                apellido varchar(100),
                dni integer,
                email varchar(100),
                telefono integer,
                comentarios text
            );
        ";
        try {
            $this->db->exec($query);
           
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    
    public function dropTables()
    {
        $query =
            "
            DROP TABLE IF EXISTS usuarios;
            DROP TABLE IF EXISTS terceros;
            ";

        try {
            $this->db->exec($query);
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function fillTablesDemo()
    {
        $query =
            "
            INSERT INTO usuarios (nombre,password) VALUES ('uriel','teclado');
            INSERT INTO usuarios (nombre,password) VALUES ('maximiliano','belgrano');
            INSERT INTO terceros (nombre,apellido,dni,email,telefono,comentarios) VALUES ('maximiliano','ballistreri','34646565','maximiliano@email.com','4765542','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel accumsan mi. Donec efficitur libero ut odio dictum, ac malesuada arcu pellentesque. Duis pharetra est dolor, eget pharetra lectus malesuada nec. Suspendisse lobortis nibh in luctus ultrices. Sed facilisis urna ultricies vehicula suscipit. Morbi eros nisi, venenatis ac ex nec, maximus vestibulum sem. Donec congue enim neque, id commodo urna tincidunt id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ac massa magna.');
            ";

        try {
            $this->db->exec($query);
           
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
