<?php

class database
{
    public $conn;

    public function __construct()
    {
        // $this->conn = mysqli_connect('localhost', 'root', '', 'hostel');
        // if (!$this->conn) {
        //     echo 'failed';
        // }

        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=myoop', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR: '.$e->getMessage();
            var_dump($this->conn);
        }
    }
}
