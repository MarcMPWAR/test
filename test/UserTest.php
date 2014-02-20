<?php

namespace Development;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $mysqli;
    public function setUp()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "test");
        $this->mysqli->query("CREATE TABLE 'test'.'user' ('id' INT NOT NULL AUTO_INCREMENT ,'user_name' VARCHAR( 255 ) NOT NULL ,'password' VARCHAR( 255 ) NOT NULL ,'karma' VARCHAR( 255 ) NOT NULL, 'actions_num' INT(1000) ,PRIMARY KEY ( 'id' );
) ENGINE = INNODB;)");
    }
    public function  testGetUserData()
    {
        $user = new Users();
        $user->connect();

        $user->getUserData($this->mysqli->query(/*IDUSER*/));
    }
    public function testInsertUserData()
    {

    }

    public function tearDown()
    {
        $this->mysqli->query("DROP TABLE 'test'.'user'");
    }
}