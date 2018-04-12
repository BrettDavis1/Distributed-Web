<?php

class Connect
{

    public $sql, $mysqli, $result, $query;

    function __construct() {
        $this->start();
    }

    function start() {
        $this->mysqli = new mysqli("localhost", "root", "123456", "test");

        if ($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') '
                . $this->mysqli->connect_error);
        }

        return $this->mysqli;
    }

    function userInfo($id) {
        $result =  $this->mysqli->query('SELECT * FROM user WHERE id = ' . $id);
            return $result;
    }

    public function query($sql) {
        return $this->mysqli->query($sql);
    }

    public function secure($string) {
        return mysqli_real_escape_string($this->mysqli, $string);
    }

}