<?php
//for connection
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "bank";

$db= mysqli_connect($server , $username , $password , $dbname);



$result=mysqli_query($db,"SELECT * from transanction_history ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<title>TRANSACTION HISTORY</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
        font-family: Century Gothic;
    }
    div.title{
        background-color: #000;
        padding-top: 11px;
        height:70px;
        color:#fff;
        text-align:center;
    }
    ul {
        float: right;
        list-style-type: none;
        margin-top: -50px;
    }

    ul li {
        display: inline-block;
    }

    ul li a {
        text-decoration: none;
        color: white;
        border-radius: 5px;
        padding: 5px 20px;
        border: 1px solid #fff;
        transition: 0.6s ease;
        margin-right: 10px;

    }

    ul li a:hover {
        background-color: #fff;
        color: #000;
    }

    
    table{ 
        position:absolute;
        top: 125px;
	    left:10%;
        width:80%;
        border-collapse: separate;
        border:1px solid black;
        border-bottom:10px solid black;
        border-radius:10px;
        
    }
    th, td{
        border:1px solid black;
        text-align:center;
        padding:10px;
    }
    th{
        background-color:black;
        color:white;

    }
    div.alert{
        background-color:black;
        color:white;
        width:80%;
    }
    button{
        background-color:white;
    }
    

</style>

<body>
    <header>
        <div>
        <div class ="title">
        <h1>TRANSACTION HISTORY</h1>
        </div>
        <ul>
                <li><a href="landing_page.html"> Home </a> </li>
            </ul>
        </div>
    </header>
    <br>
    <table >
        <tr>
            <th>ID</th>
            <th>SENDER</th>
            <th>RECIEVER</th>
            <th>AMOUNT</th>
            <th>DATE & TIME</th>
        </tr>
        <?php
        while($res=mysqli_fetch_array($result))
        {
            echo '<tr>';
            echo '<td>'.$res['id'].'</td>';
            echo '<td>'.$res['sender'].'</td>';
            echo '<td>'.$res['reciever'].'</td>';
            echo '<td>'.$res['amount'].'</td>';
            echo '<td>'.$res['datetime'].'</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
