<?php
//for connection
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "bank";

$db= mysqli_connect($server , $username , $password , $dbname);

$result=mysqli_query($db,"SELECT * from customer_info ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
<title>OUR CUSTOMERS</title>
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
        border-bottom:15px solid black;
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
    

</style>

<body>
    <header>
        <div>
            <div class ="title">
                <h1>OUR CUSTOMERS</h1>
            </div>
            <ul>
                <li><a href="landing_page.html">Home</a></li>
            </ul>
        </div>
    </header>
    <br>
    <table >
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>BALANCE</th>
        </tr>
        <?php
        while($res=mysqli_fetch_array($result))
        {
            echo '<tr>';
            echo '<td>'.$res['id'].'</td>';
            echo '<td>'.$res['name'].'</td>';
            echo '<td>'.$res['email'].'</td>';
            echo '<td>'.$res['balance'].'</td>';
            echo '</tr>';
        }
        ?>
    </table>
    
</body>
</html>
