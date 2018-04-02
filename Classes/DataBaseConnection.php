<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:42
 */

class DataBaseConnection
{
    public $connect;
    private $host = "localhost";
    private $username = 'root';
    private $password = '1234';
    private $database = 'personel';
    function __construct()
    {
        $this->database_connect();
    }
    public function database_connect()
    {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }
    public function execute_query($query)
    {
        return mysqli_query($this->connect, $query);
    }

}
?>
