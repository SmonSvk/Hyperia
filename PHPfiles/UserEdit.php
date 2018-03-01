<?php
session_start();

$edit = false;
$row = null;

if(isset($_SESSION["row"]) && $_SESSION["row"] != null){
 $edit = true;
 $row = $_SESSION["row"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pridanie pozivatela</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>

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
    <div class="col-lg-offset-3 col-lg-6 newUser text-center headerFont">
        <?php if($edit) echo "Upravenie používateľa"; else echo "Pridanie nového používateľa"; ?>
    </div>

    <div class="col-lg-offset-3 col-lg-6 newUser">
        <form action="Resolver.php" method="post" id="<?php if($edit) echo "edit-form"; else echo "new-user-form"; ?>">

            <?php if($edit) echo "<input type='hidden' name='id' value='". $row[0] ."'>";?>

            <input type="hidden" name="tag"  <?php if($edit) echo "value='editedUser'"; else echo "value='newUser'";?> >

            <div class="form-group">
                <label for="name">Meno:</label>
                <input type="text" class="form-control" id="name" name="name" <?php if($edit) echo "value='". $row[1] ."'";?> placeholder="Zadajte meno">
            </div>

            <div class="form-group">
                <label for="surname">Priezvisko:</label>
                <input type="text" class="form-control" id="surname" name="surname" <?php if($edit) echo "value='". $row[2] ."'";?> placeholder="Zadajte priezvisko">
            </div>

            <div class="form-group">
                <label for="pass">Nove heslo:</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Zadajte nove heslo">
            </div>

            <div class="form-group">
                <label for="passconfirm">Zopakujte heslo:</label>
                <input type="password" class="form-control" id="passconfirm" name="passconfirm" placeholder="Zopakujte nove heslo">
            </div>

            <div class="form-group">
                <label for="age">Vek:</label>
                <input type="number" class="form-control" id="age" name="age" <?php if($edit) echo "value='". $row[4] ."'";?> placeholder="Zadajte vek">
            </div>

            <div class="form-group">
                <label for="city">Mesto:</label>
                <input type="text" class="form-control" id="city" name="city" <?php if($edit) echo "value='". $row[5] ."'";?> placeholder="Zadajte mesto">
            </div>

            <input type="submit" class="btn btn-info" value="<?php if($edit) echo "Upraviť používateľa"; else echo "Vytvoriť nového používateľa";?>">

            <a href="index.php" class="btn btn-default right">Zoznam používateľov</a>
        </form>
    </div>
</div>
</body>
</html>

<script>
    $( document ).ready( function () {

        $("#edit-form").validate(
            {
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    surname: {
                        required: true,
                        minlength: 3
                    },
                    pass: {
                        required: false,
                        minlength: 5
                    },
                    passconfirm: {
                        equalTo: "#pass"
                    },
                    age: {
                        range: [0, 130],
                        required: true
                    },
                    city: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    name: {
                        required: "Prosím zadajte svoje meno",
                        minlength: "Meno musí mať minimálne 3 znaky"
                    },
                    surname: {
                        required: "Prosím zadajte svoje priezvisko",
                        minlength: "Meno musí mať minimálne 3 znaky"
                    },
                    pass: {
                        required: "Prosím zadajte nové heslo",
                        minlength: "Heslo musí mať aspoň 5 znakov"
                    },
                    passconfirm: {
                        required: "Prosím zadajte nové heslo",
                        minlength: "Heslo musí mať aspoň 5 znakov",
                        equalTo: "Heslá sa nezhodujú"
                    },
                    age:{
                        required: "Zadajte svoj vek",
                        range: "Vek musí byť v rozmedzí 0 až 130 rokov"
                    },
                    city:{
                        required: "Zadajte mesto v ktorom bývate",
                        minlenght: "Zadajte aspon 3 znaky"
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
                }

            });

        $("#new-user-form").validate(
            {
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                surname: {
                    required: true,
                    minlength: 3
                },
                pass: {
                    required: true,
                    minlength: 5
                },
                passconfirm: {
                    required: true,
                    equalTo: "#pass"
                },
                age: {
                    range: [0, 130],
                    required: true
                },
                city: {
                    required: true,
                    minlength: 3
                }
            },
                messages: {
                    name: {
                        required: "Prosím zadajte svoje meno",
                        minlength: "Meno musí mať minimálne 3 znaky"
                    },
                    surname: {
                        required: "Prosím zadajte svoje priezvisko",
                        minlength: "Meno musí mať minimálne 3 znaky"
                    },
                    pass: {
                        required: "Prosím zadajte nové heslo",
                        minlength: "Heslo musí mať aspoň 5 znakov"
                    },
                    passconfirm: {
                        required: "Prosím zopakujte nové heslo",
                        minlength: "Heslo musí mať aspoň 5 znakov",
                        equalTo: "Heslá sa nezhodujú"
                    },
                    age:{
                        required: "Zadajte svoj vek",
                        range: "Vek musí byť v rozmedzí 0 až 130 rokov"
                    },
                    city:{
                        required: "Zadajte mesto v ktorom bývate",
                        minlenght: "Zadajte aspon 3 znaky"
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
                }

            } );

    });
</script>