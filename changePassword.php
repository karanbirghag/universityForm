<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 12/2/2017
 * Time: 10:06 AM
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            table{
                position: relative;
                border-collapse: separate;
                border-spacing: 20px;
                text-align: center;
                font-size: 125%;
                width: 80%;
            }
            h1 {
                color: blue;
                width:100%;
                position: relative;
                font-family: verdana;
                font-size: 250%;
                text-align: center;
                background: yellow;
                width: 74%;
                left: 25%;
            }
            form {
                border: solid;
                width: 40%;
                text-align: center;

            }
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 10px 50px;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .cancel{
                background-color: orange;
                border: none;
                color: white;
                padding: 11px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                float: left;
                width: 25%;
            }
            .cancel:hover {
                background-color: darkorange;
            }
            .button:hover {
                background-color: darkgreen;
            }

        </style>
        <script>
            function cancel()
            {
                window.history.back();
            }
        </script>
    </head>
    <body>
        <h1>Change Password<input type='button'onclick='cancel()' class='cancel' value='Cancel'></h1>

        <div align = "center"" >
            <form method="post" action="controller.php"  style="border: solid">
                <input type='hidden' name='page' value='changePassword'/>
                <br>
                <table align = center>
                    <tr>
                        <td>Old Password<span style="color:darkred"> * </span><input type = "password" name = "oldPassword" required/></td>
                    </tr>
                    <tr>
                        <td>New Password<span style="color:darkred"> * </span><input type = "password" name = "newPassword" required/></td>
                    </tr>
                </table>
                <br> <?php  echo $error_message; ?>
                <br><br>
                <input class = "button" type = "submit" value = "Submit"><br>
            </form>

        </div>
    </body>
</html>

