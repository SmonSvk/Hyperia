<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 1. 3. 2018
 * Time: 12:22
 */

include_once '../Classes/Functions.php';
include_once '../Classes/User.php';

$functions = new Functions();

session_start();

$myDB = $functions->getDatabase();

if($_POST["tag"] == "newUser") {

    $hashpass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $newUser = new User($_POST["name"], $_POST["surname"], $hashpass, $_POST["age"], $_POST["city"]);

    $functions->insertUser($newUser);

}

elseif($_POST["tag"] == "editedUser"){

    if(isset($_POST["pass"])) {
        $hashpass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    }
    else{
        $hashpass = null;
    }

    $newUser = new User($_POST["name"], $_POST["surname"], $hashpass, $_POST["age"], $_POST["city"]);

    $functions->editUser($newUser, $_POST["id"]);

}

elseif($_POST["tag"] == "Edit"){
    if($_POST["button"] == "Naozaj zmazať"){
        $functions->deleteUser($_POST["id"]);
        session_unset();
        session_destroy();
    }
    else if($_POST["button"] == "Zmazať"){
        $_SESSION["delete"] = $_POST["id"];
        header( 'Location: ../PHPfiles/ReallyDelete.php' );
        exit();
    }
    else if($_POST["button"] == "Upraviť"){
        $row = $functions->getID($_POST["id"]);
        if($row == null)
            $_SESSION["row"] = null;
        else
            $_SESSION["row"] = mysqli_fetch_row($row);


        header( 'Location: ../PHPfiles/UserEdit.php' );
        exit();
    }
}

header( 'Location: ../PHPfiles/index.php' );
exit();