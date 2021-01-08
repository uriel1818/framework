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

    public function createTables()
    {
        $querys = [
            'CREATE TABLE IF NOT EXISTS usuarios (
                    id INTEGER PRIMARY KEY,
                    nombre VARCHAR(50) NOT NULL,
                    password VARCHAR(50) NOT NULL
                    );',
            'CREATE TABLE IF NOT EXISTS menus(
                id integer primary key,
                nombre varchar(50) not null,
                controller varchar(100) default NULL,
                action varchar(100) default NULL,
                params varchar(100) default NULL,
                padre integer default 0,
                fk_menus_ubicaciones INTEGER DEFAULT 1 REFERENCES menus_ubicaciones
            );',
            'CREATE TABLE IF NOT EXISTS menus_ubicaciones(
                id integer primary key,
                nombre varchar(100)
            );',
        ];

        // execute the sql querys to create new tables
        foreach ($querys as $query) {
            try {
                $this->db->exec($query);
            } catch (\Throwable $th) {
                echo '<h4 style="color:red">Error al crear tablas</h4>';
                echo $th->getMessage();

                exit;
            }
        }
    }
    public function dropTables()
    {
        $querys = [
            "DROP TABLE IF EXISTS usuarios",
            "DROP TABLE IF EXISTS productos",
            "DROP TABLE IF EXISTS productos_tipos",
            "DROP TABLE IF EXISTS imagenes",
            "DROP TABLE IF EXISTS imagenes_productos",
            "DROP TABLE IF EXISTS unidades",
            "DROP TABLE IF EXISTS menus",
            "DROP TABLE IF EXISTS menus_ubicaciones",
        ];
        foreach ($querys as $query) {
            try {
                $this->db->exec($query);
            } catch (\Throwable $th) {
                echo '<h4 style="color:red">Error al eliminar tablas</h4>';
                echo $th->getMessage();

                exit;
            }
        }
    }
    public function fillTablesDemo()
    {
        $querys = [
            
            "INSERT INTO usuarios (nombre,password) VALUES ('uriel','teclado');",
            "INSERT INTO menus (nombre,controller) VALUES ('Producto','productos')",
            "INSERT INTO menus_ubicaciones(nombre) VALUES ('navbar')",
            "INSERT INTO menus_ubicaciones(nombre) VALUES ('lateral')",

        ];
        foreach ($querys as $query) {
            try {
                $this->db->exec($query);
            } catch (\Throwable $th) {
                echo '<h4 style="color:red">Error al llenar tablas</h4>';
                echo $th->getMessage();

                exit;
            }
        }
    }
}
