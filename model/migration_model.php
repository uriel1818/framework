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
            'CREATE TABLE IF NOT EXISTS productos(
                    id  INTEGER PRIMARY KEY,
                    nombre VARCHAR(100) NOT NULL,
                    fk_unidades INTEGER NOT NULL REFERENCES unidades,
                    precio DECIMAL(6,2)
                    );',
            'CREATE TABLE IF NOT EXISTS productos_tipos(
                    id INTEGER PRIMARY KEY,
                    nombre VARCHAR(100) NOT NULL,
                    fk_producto INTEGER NOT NULL REFERENCES productos
                    );',
            'CREATE TABLE IF NOT EXISTS imagenes (
                    id  INTEGER PRIMARY KEY,
                    path TEXT NOT NULL
                    );',
            'CREATE TABLE IF NOT EXISTS imagenes_productos(
                      id INTEGER PRIMARY KEY,
                      fk_imagenes_id INTEGER NOT NULL REFERENCES imagenes,
                      fk_productos_id INTEGER NOT NULL REFERENCES productos
                      );',
            'CREATE TABLE IF NOT EXISTS unidades(
                        id integer primary key,
                        nombre varchar(100) not null,
                        abreviacion varchar(20)
                        );',
            'CREATE TABLE IF NOT EXISTS menus(
                id integer primary key,
                nombre varchar(50) not null,
                controller varchar(100) default NULL,
                action varchar(100) default NULL,
                params varchar(100) default NULL,
                padre integer default 0,
                fk_menus_ubicaciones INTEGER DEFAULT NULL REFERENCES menus_ubicaciones
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
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Kilogramo','kg');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Gramo','g');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Segundo','seg');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Minuto','min');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Hora','hs');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Día','DD');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Mes','MM');",
            "INSERT INTO unidades (nombre,abreviacion) VALUES ('Año','AAAA');",
            "INSERT INTO usuarios (nombre,password) VALUES ('uriel','teclado');",
            "INSERT INTO menus (nombre,controller) VALUES ('Producto','productos')",
            "INSERT INTO menus (nombre,controller) VALUES ('Costos fijos','index')",
            "INSERT INTO menus (nombre,controller) VALUES ('Test','index')",
            "INSERT INTO menus (nombre,controller) VALUES ('Test 2','index')",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo','index',3)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_2','index',3)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_3','index',3)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_4','index',3)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo','index',4)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_2','index',4)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_3','index',4)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo','index',5)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_2','index',5)",
            "INSERT INTO menus (nombre,controller,padre) VALUES ('Test_hijo_3','index',5)",
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
