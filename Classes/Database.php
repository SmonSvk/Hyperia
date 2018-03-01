<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 28. 2. 2018
 * Time: 17:09
 */

include_once '../Classes/User.php';

class Database
{
    private $db;

    private $functions;

    public static function getInstance($ip, $user, $pass, $dbname, $port)
    {
        static $instance = null;
        if($instance == null){
            $instance = new Database($ip, $user, $pass, $dbname, $port);
        }

        return $instance;
    }

    private function __construct($ip, $user, $pass, $dbname, $port)
    {
        $this->functions = new Functions();
        $this->db = mysqli_connect($ip, $user, $pass, $dbname, $port);
        $this->connectionCHeck();
    }


    private function connectionCHeck()
    {
        if($this->db){
            $this->createTable();
        }
    }

    private function sqlCallForResult($tmp){
        if ($result=mysqli_query($this->db,$tmp))
        {
            return $result;
        }
        else{
            return null;
        }
    }

    private function sqlCall($tmp){
        mysqli_query($this->db, $tmp);
    }

    private function createTable(){
        $tmp = "CREATE TABLE users (id INT PRIMARY KEY AUTO_INCREMENT, username TEXT NOT NULL , surname TEXT, pass TEXT NOT NULL , age INT, city TEXT, createdate DATE);";
        $this->db->query($tmp);
    }

    function readAll(){
        $tmp="SELECT * FROM users";

        return $this->sqlCallForResult($tmp);
    }

    function insertRow(User $user){
        $userName = $user->getName();
        $userSurName = $user->getSurName();
        $userPass = $user->getPass();
        $userAge = $user->getAge();
        $userCity = $user->getCity();
        $date =  date("Y-m-d");

        $tmp = "INSERT INTO users (username, surname, pass, age, city, createdate)
        VALUES ('$userName', '$userSurName', '$userPass', '$userAge', '$userCity', '$date')";

        $this->sqlCall($tmp);

    }

    function deleteUser($id){
        $tmp = "DELETE FROM users WHERE id='$id';";
        $this->db->query($tmp);
    }

    function getID($id){
        $tmp="SELECT * FROM users WHERE id='$id'";

        return $this->sqlCallForResult($tmp);
    }

    function editUser(User $user, $id){
        $userName = $user->getName();
        $userSurName = $user->getSurName();
        $userPass = $user->getPass();
        $userAge = $user->getAge();
        $userCity = $user->getCity();
        if($userPass == null){
            $tmp="UPDATE users SET username = '$userName', surname = '$userSurName', age = '$userAge', city = '$userCity' WHERE id='$id';";
        }else{
            $tmp="UPDATE users SET username = '$userName', surname = '$userSurName', pass = '$userPass', age = '$userAge', city = '$userCity' WHERE id='$id';";
        }

        $this->sqlCall($tmp);
    }
}