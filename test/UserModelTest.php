<?php

namespace Development;

class UserModelTest extends \PHPUnit_Framework_TestCase
{
    private $data_base;
    public function setUp()
    {
        $this->data_base = new \PDO( "mysql:host=127.0.0.1;dbname=mpwar", 'root', '' );
        $this->data_base->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC );

        $sql = <<<SQL
CREATE DATABASE
        mpwar
SQL;
        $stmt = $this->data_base->prepare($sql);
        $stmt->execute();

        $sql = <<<SQL
CREATE TABLE
        users(user_name VARCHAR(255), email VARCHAR(255), password VARCHAR(255), activation_key VARCHAR(255)
SQL;
        $stmt = $this->data_base->prepare($sql);
        $stmt->execute();
    }

    /**
     * @expectedException        RuntimeException
     */
    public function testGetDatabaseConnectionFailure()
    {
        $this->data_base = new \PDO( "mysql:host=127.0.2.1;dbname=mpwar", 'root', '' );
        $this->data_base->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC );

        throw new RuntimeException('Database is down', 10);
    }

    public function testGetDatabaseConnectionSuccess()
    {
        $this->data_base = new \PDO( "mysql:host=127.0.0.1;dbname=mpwar", 'root', '' );
        $this->data_base->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC );

        $this->assertTrue(TRUE);
    }
    public function testExistsUserNameFailure()
    {
        $user = new UserModel();
        $user->getDatabaseConnection();

        $sql = <<<SQL
SELECT
        user_name
FROM
        users
WHERE
        user_name = 'Pepe'
SQL;
        $stmt = $this->data_base->prepare($sql);
        $stmt->execute();

        $this->assertEquals("Pepe", $stmt->execute());


    }
    public function testExistsUserNameSuccess()
    {
        $user = new UserModel();
        $user->getDatabaseConnection();

        $sql = <<<SQL
INSERT INTO
        users
VALUES
        ('Pepe')
SQL;
        $stmt = $this->data_base->prepare($sql);
        $stmt->execute();

        $sql = <<<SQL
SELECT
        user_name
FROM
        users
WHERE
        user_name = 'Pepe'
SQL;
        $stmt = $this->data_base->prepare($sql);
        $stmt->execute();

        $this->assertEquals("Pepe", $stmt->execute());


    }
}