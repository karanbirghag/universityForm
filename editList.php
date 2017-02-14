<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 13/2/2017
 * Time: 12:20 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
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
            width: 74%;
            left: 25%;
        }
        form {
            border: groove;
            width: 80%;
            text-align: left;
            background: #ffffff;
            font-weight: bold;
            font-size: 150%;
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
            text-align: center;
            margin: 4px 2px;
            float: right;
            width: 75%;
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

        table{
            position: relative;
            border-collapse: separate;
            border-spacing: 10px;
            text-align: center;
            font-size: 125%;
            width: 80%;
        }

        th, td{
            text-align: center;
            font-size: 90%;
            color: darkblue;
            width: 20%;
        }
    </style>
    <script>
        function displayFunction(count)
        {
            var displayFeature = "display"+count;
            if(document.getElementById(displayFeature).style.display == "none")
            {
                document.getElementById(displayFeature).style.display = "block";
            }else
                document.getElementById(displayFeature).style.display = "none";
        }
        function cancel()
        {
            window.history.back();
        }
    </script>
</head>
<body style="background: #7B7D7D">

</div>
</body>
</html>



