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

            CREATE TABLE IF NOT EXISTS menus(
                id integer primary key,
                nombre varchar(50) not null,
                controller varchar(100) default NULL,
                action varchar(100) default NULL,
                params varchar(100) default NULL,
                padre integer default 0,
                fk_menus_ubicaciones INTEGER DEFAULT 1 REFERENCES menus_ubicaciones
            );

            CREATE TABLE IF NOT EXISTS menus_ubicaciones(
                id integer primary key,
                nombre varchar(100)
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
                fk_terceros_tipo integer not null references terceros_tipo
            );

            CREATE TABLE IF NOT EXISTS terceros_tipo(
                id integer primary key,
                nombre varchar(50)
            );

            CREATE TABLE IF NOT EXISTS terceros_telefonos(
                id integer primary key,
                numero integer,
                fk_terceros integer not null references tereros
            );

            CREATE TABLE IF NOT EXISTS terceros_direcciones(
                id integer primary key,
                direccion varchar(100),
                barrio varchar(100),
                localidad varchar(100),
                provincia varchar(100),
                fk_terceros integer not null references tereros
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
            DROP TABLE IF EXISTS menus;
            DROP TABLE IF EXISTS menus_ubicaciones;
            DROP TABLE IF EXISTS terceros;
            DROP TABLE IF EXISTS terceros_tipo;
            DROP TABLE IF EXISTS terceros_telefonos;

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
            INSERT INTO menus (nombre,controller) VALUES ('Producto','productos');
            INSERT INTO menus_ubicaciones(nombre) VALUES ('navbar');
            INSERT INTO menus_ubicaciones(nombre) VALUES ('lateral');
            INSERT INTO terceros_tipo(nombre) VALUES ('persona');
            INSERT INTO terceros_tipo(nombre) VALUES ('empresa');
            ";

        try {
            $this->db->exec($query);
           
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
