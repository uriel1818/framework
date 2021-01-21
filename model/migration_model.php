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
            
            CREATE TABLE IF NOT EXISTS CRUD_tablas(
                id integer primary key,
                nombre varchar(50)
            );

            CREATE TABLE IF NOT EXISTS CRUD_columnas(
                id integer primary key,
                nombre varchar(50),
                is_forein boolean DEFAULT FALSE,
                is_required boolean DEFAULT FALSE,
                fk_CRUD_columnas_tipos integer NOT NULL,
                fk_CRUD_inputs integer DEFAULT NULL
            );

            CREATE TABLE IF NOT EXISTS CRUD_columnas_tipos(
                id integer primary key,
                nombre varchar(50)
            );

            CREATE TABLE IF NOT EXISTS CRUD_inputs(
                id integer primary key,
                nombre varchar(50)
            );

            CREATE TABLE IF NOT EXISTS CRUD_inputs_tipos(
                id integer primary key,
                nombre varchar(50)
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
            DROP TABLE IF EXISTS CRUD_tablas;
            DROP TABLE IF EXISTS CRUD_columnas;
            DROP TABLE IF EXISTS CRUD_columnas_tipos;
            DROP TABLE IF EXISTS CRUD_inputs;
            DROP TABLE IF EXISTS CRUD_inputs_tipos;
            
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
            INSERT INTO CRUD_tablas (nombre) VALUES ('terceros_2');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('integer');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('decimal(5,2)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('boolean');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('varchar(200)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('varchar(100)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('varchar(50)');
            INSERT INTO CRUD_inputs (nombre) VALUES ('input');
            INSERT INTO CRUD_inputs (nombre) VALUES ('select');
            INSERT INTO CRUD_inputs (nombre) VALUES ('textarea');
            INSERT INTO CRUD_inputs (nombre) VALUES ('datalist');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('text');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('tel');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('button');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('checkbox');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('date');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('email');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('image');
            INSERT INTO CRUD_inputs_tipos(nombre) VALUES ('number');
            ";

        try {
            $this->db->exec($query);
           
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
