<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 12/2/2017
 * Time: 2:01 PM
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>List Courses</title>
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
        table{
            top:5%;
            position: relative;
            text-align: center;
            font-size: 125%;
            width: 70%;
        }
        th{
            text-align: center;
            font-size: 125%;
            color: darkblue;
            width: 20%;
        }

        td{
            text-align: center;
            font-size: 125%;
            color: black;
            width: 20%;
        }
        tr:hover {
            background-color: lightgrey;
        }
        .tr:hover {
            background-color: white;
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

    </style>
    <script>
        function addCourse(){
            document.getElementById("addList").submit();
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

        function editCourse(value){
            document.getElementById('editBt').value = value;
            document.getElementById("editList").submit();
        }

        function deleteCourse(value){
            if (confirm("You are about to delete the Record!") == true) {
                document.getElementById('deleteBT').value = value;
                document.getElementById("deleteList").submit();
            }
        }
    </script>
</head>
<body>
<h3>University Form</h3>
    <div class = "header">
        <div style="float: right;" class="dropdown">
            <button style="height: 50px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu
            <span class="caret"></span></button>
                <ul style="text-align: center;padding: 16px;font-size: 20px;" class="dropdown-menu dropdown-menu-right"">
                <li><a style="text-decoration: none" onclick="showMain()" href="#">Main Page</a></li>
                <li><a style="text-decoration: none" onclick="showDepartments()" href="#">Departments</a></li>
                <li><a style="text-decoration: none" onclick="logout()" href="#">Logout</a></li>
            </ul>
        </div>
    </div>
<div id='box-signin' align="center">
    <form id = "addList" method="post" action="controller.php">
        <input type='hidden' name='page' value='list'>
        <input type = 'hidden' name = 'command' value = 'add_to_list'>
    </form>

    <form id = "editList" method="post" action="controller.php">
        <input type='hidden' name='page' value='list'/>
        <input type = 'hidden' name = 'command' value = 'editList'>
        <input id = 'editBt' type='hidden' name="editList" value = "">
    </form>

    <form id = "deleteList" method="post" action="controller.php">
        <input type='hidden' name='page' value='list'/>
        <input type = 'hidden' name = 'command' value = 'deletelist'>
        <input id = 'deleteBT' type='hidden' name="deleteList" value = "">
    </form>

    <form id = "showMain" method="post" action="controller.php">
        <input type='hidden' name='page' value='list'>
        <input type = 'hidden' name = 'command' value = 'showMain'>
    </form>

    <form id = "showDepartments" method="post" action="controller.php">
        <input type='hidden' name='page' value='list'>
        <input type = 'hidden' name = 'command' value = 'showDepartments'>
    </form>

    <form id = "logout" method="post" action="controller.php">
        <input type='hidden' name='page' value='userList'>
        <input type = 'hidden' name = 'command' value = 'logout'>
    </form>
</div>
</body>
</html>

