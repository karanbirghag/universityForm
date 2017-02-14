<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 2/12/2017
 * Time: 11:25 am
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>

        table{
            border: 2px solid black;
            position: relative;
            text-align: center;
            font-size: 125%;
            width: 40%%;
        }

        th, td{
            text-align: center;
            border: solid;
            font-size: 125%;
            color: darkblue;
            width: 20%;
        }

        tr:hover {
            background-color: lightgrey;
        }
        .tr:hover {
            background-color: white;
        }

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
            width: 100%;
        }
        h3{
            position: absolute;
            text-align: center;
            color: white;
            font-family: verdana;
            width: 100%;
        }
        form {
            width: 40%;
            text-align: center;
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
    </style>

    <script>
        function editUser(value){
            alert("value is :" + value);
            document.getElementById('editBt').value = value;
            document.getElementById("editUsername").submit();
        }
        function deleteUser(value){
            if (confirm("You are about to delete the user!") == true) {
                document.getElementById('deleteBT').value = value;
                document.getElementById("deleteUser").submit();
            }
        }

        function showMain(){
            document.getElementById("showMain").submit();
        }
        function showCategories(){
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
        <li><a onclick="showMain()" href="#">Main page</a></li>
        <li><a onclick="showCategories()" href="#">Departments</a></li>
        <li><a onclick="logout()" href="#">Logout</a></li>
        </ul>
    </div>
</div>
<div id='box-signin' align="center">
    <h1>Manage Users</h1><br>
    <form id = "editUsername" method="post" action="controller.php">
        <input type='hidden' name='page' value='userList'/>
        <input type = 'hidden' name = 'command' value = 'editUsername'>
        <input id = 'editBt' type='hidden' name="edit" value = "">
    </form>

    <form id = "deleteUser" method="post" action="controller.php">
        <input type='hidden' name='page' value='userList'/>
        <input type = 'hidden' name = 'command' value = 'deleteUsername'>
        <input id = 'deleteBT' type='hidden' name="deleteUser" value = "">
    </form>

    <form id = "showMain" method="post" action="controller.php">
        <input type='hidden' name='page' value='userList'>
        <input type = 'hidden' name = 'command' value = 'showMain'>
    </form>

    <form id = "showDepartments" method="post" action="controller.php">
        <input type='hidden' name='page' value='userList'>
        <input type = 'hidden' name = 'command' value = 'showDepartments'>
    </form>

    <form id = "logout" method="post" action="controller.php">
        <input type='hidden' name='page' value='userList'>
        <input type = 'hidden' name = 'command' value = 'logout'>
    </form>
</div>
<span style='color:Red; float: right' >*Current User cannot be deleted.</span>
</body>
</html>


