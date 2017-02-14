<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 12/2/2017
 * Time: 12:15 PM
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Departments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .header{
            width:100%;
            top: 0%;
            height: 50px;
            background: grey;
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
        h3{
            position: absolute;
            text-align: center;
            color: white;
            font-family: verdana;
            width: 100%;
        }
        table, th, td {
            position: relative;
            text-align: center;
            font-size: 125%;
            color: darkblue;
            width: 40%;
        }

        tr:hover {
            background-color: lightgrey;
        }
        .tr:hover {
            background-color: white;
        }

        .buttonRecord {
            background-color: #148F77;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
            width: 95%;
        }
        .buttonDelete {
            background-color: #C0392B;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .buttonEdit {
            background-color: #566573;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 11px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            float: right;
            width: 25%;
        }

        .button:hover {
            background-color: darkgreen;
        }

        /* unvisited link */
        a:link {
            color: blue;
            text-decoration: underline;
        }

        /* visited link */
        a:visited {
            color: blue;
        }

        /* mouse over link */
        a:hover {
            color: red;
        }

        /* selected link */
        a:active {
            color: forestgreen;
        }

    </style>
    <script>
        function addDepartment(){
            document.getElementById("addDepartment").submit();
        }

        function displayDepartment(value)
        {
            document.getElementById('openBT').value = value;
            document.getElementById("openDepartment").submit();
        }
        function editDepartment(value){
            document.getElementById('editBt').value = value;
            document.getElementById("editDepartment").submit();
        }

        function deleteDepartment(value){
            if (confirm("You are about to delete the Record!") == true) {
                document.getElementById('deleteBT').value = value;
                document.getElementById("deleteDepartment").submit();
            }
        }

        function showMain(){
            document.getElementById("showMain").submit();
        }

        function showDepartments(){
            document.getElementById("showDepartments").submit();
        }

        function logout(){
            document.getElementById("logout").submit();
        }
    </script>
</head>
<body>
<h3> University Form</h3>
<div class = "header">
    <div style="float: right;" class="dropdown">
        <button style="height: 50px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu
            <span class="caret"></span></button>
        <ul style="text-align: center; text-decoration: double" class="dropdown-menu dropdown-menu-right"">
        <li><a style="text-decoration: none;  font-size: 20px" onclick="showMain()" href="#">Main page</a></li>
        <li><a style="text-decoration: none;  font-size: 20px" onclick="showDepartments()" href="#">Departments</a></li>
        <li><a style="text-decoration: none;  font-size: 20px" onclick="logout()" href="#">Logout</a></li>
        </ul>
    </div>
</div>
    <h1>Department List
    <input type="button" onclick="addDepartment()" class="button" value="Add New Department"></h1>
    <div id='box-signin' align="center">

        <form id = "addDepartment" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'>
            <input type = 'hidden' name = 'command' value = 'addDepartment'>
        </form>

        <form id = "editDepartment" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'/>
            <input type = 'hidden' name = 'command' value = 'editDepartment'>
            <input id = 'editBt' type='hidden' name="edit" value = "">
        </form>

        <form id = "deleteDepartment" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'/>
            <input type = 'hidden' name = 'command' value = 'deleteDepartment'>
            <input id = 'deleteBT' type='hidden' name="deleteDepartment" value = "">
        </form>

        <form id = "openDepartment" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'/>
            <input type = 'hidden' name = 'command' value = 'openDepartment'>
            <input id = 'openBT' type='hidden' name="openDepartment" value = "">
        </form>

        <form id = "showMain" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'>
            <input type = 'hidden' name = 'command' value = 'showMain'>
        </form>

        <form id = "showDepartments" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'>
            <input type = 'hidden' name = 'command' value = 'showDepartments'>
        </form>

        <form id = "logout" method="post" action="controller.php">
            <input type='hidden' name='page' value='departments'>
            <input type = 'hidden' name = 'command' value = 'logout'>
        </form>
    </div>
</body>
</html>
