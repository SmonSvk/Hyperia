<?php

include_once '../Classes/Database.php';
include_once '../Classes/User.php';

class Functions
{

    function __construct()
    {

    }

    function getDatabase(){
        $db_user = "simon";
        $db_pass = "admin";
        $db_server = "localhost";
        $db_name = "myDB";
        $port = "3306";

        return Database::getInstance($db_server, $db_user, $db_pass, $db_name, $port);
    }

    function showTable(){
        $db = $this->getDatabase();

        $rows = $db->readAll();

        if($rows == null)
            return;

        if($rows->num_rows == 0){
            echo "<div class='text-center headerFont'>Žiadne záznamy o používateľoch</div>";
        }
        else {
            echo
            "<table class='table table-striped text-center'>
            <thead>
              <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>Meno</th>
                <th class='text-center'>Priezvisko</th>
                <th class='text-center'>Vek</th>
                <th class='text-center'>Mesto</th>
                <th class='text-center'>Datum vytvorenia</th>
                <th class='text-center'>Nastavenia</th>
              </tr>
            </thead>
            <tbody>";

            while ($row = mysqli_fetch_row($rows)) {
                echo
                "<tr>";
                for ($x = 0; $x <= 6; $x++) {
                    if ($x == 3)
                        continue;
                    echo
                        "<td>" . $row[$x] . "</td>";
                }
                echo
                    "<td>
                    <form action='../PHPfiles/Resolver.php' method='post'>
                    <input type='hidden' name='tag' value='Edit'>
                    <input type='hidden' name='id' value='" . $row[0] . "'>
                    <input type='submit' class='btn btn-info' name='button' value='Upraviť'>
                    <input type='submit' class='btn btn-danger' name='button' value='Zmazať'>
                    </form>
                </td>
              </tr>";
            }

            echo
            "</tbody>
           </table>";
        }
        mysqli_free_result($rows);
    }

    function insertUser(User $user){
        $db = $this->getDatabase();
        $db->insertRow($user);
    }

    function editUser(User $user, $id){
        $db = $this->getDatabase();
        $db->editUser($user, $id);
    }

    function deleteUser($id){
        $db = $this->getDatabase();
        $db->deleteUser($id);
    }

    function getID($id){
        $db = $this->getDatabase();
        return $db->getID($id);
    }
}