<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 2/12/2017
 * Time: 11:12 AM
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            h1 {
                color: blue;
                width:100%;
                position: relative;
                font-family: verdana;
                font-size: 250%;
                text-align: center;
                background: yellow;
                width: 100%;
            }
            form {
                width: 40%;
                text-align: center;

            }
            ul{
                list-style-type: none;
                background-color: #333333;
                overflow: hidden;
                margin: 0;
                padding: 0;

            }

            li a {
                color: white;
                display: block;
                text-align: center;
                padding: 16px;
                text-decoration: none;
            }

            li a:hover {
                background-color: #111111;
                text-decoration: none;
                color: white;
                font-size: 125%;
            }
        </style>
    </head>
    <body>
    <h1> Admin Panel</h1>
    <br/><br/>
    <div align="center">
        <form id = "formSubmit" method = "post" action = "controller.php">
            <input type='hidden' name='page' value='MainPage'/>
            <input type='hidden' name='command' value = "manageUsers">
            <ul><li><a href="#" onclick="document.getElementById('formSubmit').submit()">Manage Users</a></li></ul>
        </form>

        <form id = "formSubmit3" method = "post" action = "controller.php" align = "center">
            <input type='hidden' name='page' value='MainPage'/>
            <input type='hidden' name='command' value = "changePassword">
                <ul><li><a href="#" onclick="document.getElementById('formSubmit3').submit()">Change Password</a></li></ul>
        </form>

        <form id = "formSubmit4" method = "post" action = "controller.php" align = "center">
            <input type='hidden' name='page' value='MainPage'/>
            <input type='hidden' name='command' value = "departments">
            <ul><li value = "listRecords"><a href="#" onclick="document.getElementById('formSubmit4').submit()">Departments</a></li></ul>
        </form>

        <form id = "formSubmit5" method = "post" action = "controller.php" align = "center">
            <input type='hidden' name='page' value='MainPage'/>
            <input type='hidden' name='command' value = "logout">
                <ul><li value = "logout"><a href="#" onclick="document.getElementById('formSubmit5').submit()">Logout</a></li>
            </ul>
        </form>
    </div>
    </body>
</html>