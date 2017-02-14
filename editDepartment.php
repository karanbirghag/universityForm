<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 12/2/2017
 * Time: 1:20 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Record</title>
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
    <h1> EDIT RECORD</h1>

    <form method="post" action="controller.php">
        <input type='hidden' name='page' value='editDepartment'/>
        <input type='hidden' name='command' value='editDepartment'/>
        <br>
        Change Record Name: <br><input type = "text" name = "editDepartment" value= "<?php echo($_SESSION["edit"]); ?>" required/>
        <br><br>
        Hide:
        <input onclick="changeHide()" type="checkbox" name="hide" value=""> YES
        <br><?php  echo $error_message; ?><br>
        <input type = "submit" value = "Submit">
    </form>
</div>
</body>
</html>

