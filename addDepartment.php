<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 12/2/2017
 * Time: 11:45 AM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        h1 {
            color: blue;
            font-family: verdana;
            font-size: 250%;
            text-align: center;
            background: yellow;
        }
        form {
            border: solid;
            width: 40%;
            text-align: center;
        }
    </style>
    <script>
        function changeHide()
        {
            var check = document.getElementById('deleteBT').value;
            if(check == "yes");
            {
                document.getElementById('hide').value = "";
            }else
            document.getElementById('hide').value = "yes";
        }
    </script>
</head>
<body>
<div id='box-signup' align="center">
    <h1> Add Department</h1>

    <form method="post" action="controller.php">
        <input type='hidden' name='page' value='addDepartment'/>
        <input type='hidden' name='command' value='addDepartment'/>
        <br>
        New Record: <br><input type = "text" name = "addDepartment" required/>
        <br><br>
        Hide:
        <input id = 'hide' onclick="changeHide()" type="checkbox" name="hide" value=""> YES
        <br><?php  echo $error_message; ?><br>
        <input type = "submit" value = "Submit">
    </form>
</div>
</body>
</html>
