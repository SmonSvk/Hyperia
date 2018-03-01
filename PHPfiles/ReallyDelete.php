<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 1. 3. 2018
 * Time: 17:50
 */

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Naozaj zmazať použivateľa</title>

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
    <div class="headerFont text-center table-bgcolor">
        Naozaj zmazať používateľa s ID  <?php echo $_SESSION["delete"]; ?>?
    </div>

    <div class="text-center table-bgcolor">
        <form action='../PHPfiles/Resolver.php' method='post'>
            <input type='hidden' name='tag' value='Edit'>
            <input type='hidden' name='id' value=' <?php echo $_SESSION["delete"]; ?>'>
            <input type='submit' class='btn btn-danger btn-padding' name='button' value='Naozaj zmazať'>
            <input type='submit' class='btn btn-default btn-padding' name='button' value='Zrušiť'>
        </form>
    </div>
</div>
</body>
</html>




