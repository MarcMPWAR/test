<?php

namespace Development;

class Users
{
    private $errors = array();
    private $mysqli;

    public function newUser()
    {
        if ( !empty( $_GET['user_name'] ) && !empty( $_GET['password'] ) )
        {
            $this->insertUser( $_GET['user_name'], $_GET['password'] );
        }
        else
        {
            if ( empty( $_GET['user_name'] ) )
            {
                $this->errors[] = 'Invalid User name';
            }

            if ( empty( $_GET['password'] ) )
            {
                $this->errors[] = 'Invalid Password';
            }
        }
    }

    public function connect()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "test");
        $this->mysqli->query("CREATE TABLE 'test'.'user' ('id' INT NOT NULL AUTO_INCREMENT ,'user_name' VARCHAR( 255 ) NOT NULL ,'password' VARCHAR( 255 ) NOT NULL ,'karma' VARCHAR( 255 ) NOT NULL, 'actions_num' INT(1000) ,PRIMARY KEY ( 'id' );
) ENGINE = INNODB;)");

    }

    /**
     * Retorna la información de un usuario guardado en la base de datos. Si no existe lanza una excepción.
     * @param $id_user
     */
    public function getUserData( $id_user )
    {
        $this->mysqli->query("SELECT * FROM 'user' WHERE 'id'=". $id_user ." ;");
    }

    /**
     * Inserta un usuario en la base de datos.
     * @param $name
     * @param $password
     */
    public function insertUser( $name, $password )
    {
        $LastInsert = $this->mysqli->insert_id;
        $this->mysqli->query("INSERT INTO test($LastInsert) VALUES (NULL, '$name', '$password', 0)");
    }

    /**
     * Inserta una acción en base de datos.
     * @param $action
     */
    public function insertUserAction( $action, $id )
    {

    }

    /**
     * Retorna un array de acciones. Si el usuario no tiene acciones retorna vacío.
     * @param $action
     */
    public function getUserActions( $action )
    {

    }

    /**
     * Nos devuelve el karma del usuario en función del número de acciones realizadas.
     * - Entre 0 y 10 -> devuelve 1
     * - Mayor que 10 y menor 100 -> devuelve 2
     * - Mayor de 100 y menor de 500 -> devuelve 3
     * - Mayor de 500 -> devuelve número de acciones entre 100
     * @param $id_user
     */
    public function getUserKarma( $id_user )
    {

    }
}
