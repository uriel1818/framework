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

            CREATE TABLE IF NOT EXISTS CRUD_tablas(
                id integer primary key,
                nombre varchar(50)
            );

            CREATE TABLE IF NOT EXISTS CRUD_columnas(
                id integer primary key,
                nombre varchar(50),
                reference_to varchar(50) DEFAULT NULL,
                fk_CRUD_columnas_tipos integer DEFAULT 4 REFERENCES CRUD_columnas_tipos,
                fk_CRUD_tablas integer NOT NULL REFERENCES CRUD_tablas,
                fk_CRUD_inputs integer DEFAULT 4 REFERENCES CRUD_inputs
            );

            CREATE TABLE IF NOT EXISTS CRUD_columnas_tipos(
                id integer primary key,
                nombre varchar(50)
            );

            CREATE TABLE IF NOT EXISTS CRUD_inputs(
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
           
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('integer');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('decimal(5,2)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('boolean');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('varchar(200)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('varchar(100)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('varchar(50)');
            INSERT INTO CRUD_columnas_tipos (nombre) VALUES ('text');

            INSERT INTO CRUD_inputs (nombre) VALUES ('select');
            INSERT INTO CRUD_inputs (nombre) VALUES ('textarea');
            INSERT INTO CRUD_inputs (nombre) VALUES ('text');
            INSERT INTO CRUD_inputs (nombre) VALUES ('tel');
            INSERT INTO CRUD_inputs (nombre) VALUES ('button');
            INSERT INTO CRUD_inputs (nombre) VALUES ('checkbox');
            INSERT INTO CRUD_inputs (nombre) VALUES ('date');
            INSERT INTO CRUD_inputs (nombre) VALUES ('email');
            INSERT INTO CRUD_inputs (nombre) VALUES ('image');
            INSERT INTO CRUD_inputs (nombre) VALUES ('number');

            INSERT INTO CRUD_tablas (nombre) VALUES ('terceros');
            INSERT INTO CRUD_columnas (nombre,fk_CRUD_columnas_tipos,fk_CRUD_inputs,fk_CRUD_tablas) VALUES ('nombre','6','4',1);
            INSERT INTO CRUD_columnas (nombre,fk_CRUD_columnas_tipos,fk_CRUD_inputs,fk_CRUD_tablas) VALUES ('apellido','6','4',1);
            INSERT INTO CRUD_columnas (nombre,fk_CRUD_columnas_tipos,fk_CRUD_inputs,fk_CRUD_tablas) VALUES ('dni','1','11',1);
            INSERT INTO CRUD_columnas (nombre,fk_CRUD_columnas_tipos,fk_CRUD_inputs,fk_CRUD_tablas) VALUES ('email','6','9',1);
            INSERT INTO CRUD_columnas (nombre,fk_CRUD_columnas_tipos,fk_CRUD_inputs,fk_CRUD_tablas) VALUES ('telefono','1','11',1);
            INSERT INTO CRUD_columnas (nombre,fk_CRUD_columnas_tipos,fk_CRUD_inputs,fk_CRUD_tablas) VALUES ('comentarios','7','2',1);
            
            
            ";
        try {
            $this->db->exec($query);
           
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
