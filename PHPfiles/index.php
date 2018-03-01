<?php
include_once "../Classes/Functions.php";
$functions = new Functions();
session_start();
if(isset($_SESSION["row"])){
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sprava pozivatelov</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS/Css.css">
</head>
<body class="background">
<div class="container">
    <div id="head" class="text-center headerFont table-bgcolor">
        Zoznam Používateľov
    </div>

    <div id="controls" class="text-center controls table-bgcolor">
        <a href="UserEdit.php" class="btn btn-default">Nový používateľ</a>
    </div>

    <div id="table" class=" table-bgcolor table-padding">
        <?php
            $functions->showTable();
        ?>
    </div>
</div>

</body>
</html>

<script>
    $( document ).ready( function () {
        $('#zmazat').click(function () {
            $(this).addClass("invisible-button");
           $('#naozajzmazat').removeClass("invisible-button");
        });
    });
</script>