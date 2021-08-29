<!DOCTYPE html>
<html lang="en">
<head>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
<title>TRANSFER</title>
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

    .details{
        margin:2% auto;
        border: 1px solid #000;
        border-top:8px solid #000;
        border-radius:8px;
        padding:3%;
        background-color:white;
        color:#000;
        font-weight:bold;
        box-shadow: 10px 10px 8px #888888;
        width:50%;
    }   
    .submit{
        background-color:black;
        color: white;
        border-radius:5px;
        padding:5px 20px;
        border: 1px solid #fff;
        transition:0.6s ease;
        margin-right: 10px;
        
    }
    .submit:hover{
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
    }
    
</style>
<body>
    <header>
        <div>
        <div class ="title">
        <h1>TRANSFER MONEY</h1>
        </div>
        <ul>
                <li><a href="landing_page.html"> Home </a> </li>
            </ul>
        </div>
    </header>
    <br>
                
    <form class="details" action="transaction.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">PLEASE ENTER THE BENEFACTOR NAME:</label>
        <select  class="form-control" name="sender" required>
            <option value="null">Please select a name from the drop-down below </option>
            <?php
            $server = "localhost"; 
            $username = "root";
            $password = "" ;
            $dbname = "bank";

            $db= mysqli_connect($server , $username , $password , $dbname);
            $result=$db->query("SELECT name FROM customer_info");
            while($rows=$result->fetch_assoc()) 
            {   $name_option=$rows['name'];
                echo"<option value='$name_option'>$name_option</option>";
            }  
            ?>
            </select>
        <br> 
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">PLEASE ENTER THE BENEFICIARY NAME:</label>
        <select  class="form-control" name="reciever" required>
        <option value="null">Please select a name from the drop-down below</option>
        <?php
            $server = "localhost";
            $username = "root";
            $password = "" ;
            $dbname = "bank";

            $db= mysqli_connect($server , $username , $password , $dbname);
            $result=$db->query("SELECT name FROM customer_info");
            while($rows=$result->fetch_assoc()) 
            {   $name_option=$rows['name'];
                echo"<option value='$name_option'>$name_option</option>";
            }  
            ?>
            </select>
        <br>       
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">PLEASE ENTER THE AMOUNT TO BE TRANSFERED:</label>
        <input type="text" class="form-control" name="amount" required>
        </div>
        <br>
        <input  type="submit" name="SUBMIT" value="TRASNFER" class="submit" style = "text-transform:uppercase;">   
    </form>
        
</body>
</html>
<?php
//for connection
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "bank";

$db= mysqli_connect($server , $username , $password , $dbname);

if(isset($_POST['SUBMIT'])){
	if(!empty($_POST['sender']) && !empty($_POST['reciever']) && !empty($_POST['amount'])){ 
		$sender = $_POST['sender'];
		$reciever = $_POST['reciever'];
        $amount = $_POST['amount'];
        $result=$db->query("SELECT * FROM customer_info");
        $sender_balance;
        $reciever_balance;
        while($rows=$result->fetch_assoc()) 
            {   if($sender==$rows['name'])
                $sender_balance=$rows['balance'];
                if($reciever==$rows['name'])
                $reciever_balance=$rows['balance'];

            }
            if($reciever!=$sender)
            {     
                if($amount<$sender_balance){
                    $credit=$reciever_balance+$amount;
                    $credit_op=$db->query("UPDATE `customer_info` SET `balance`='$credit' WHERE `name`='$reciever'");
                    $debit=$sender_balance-$amount;
                    $debit_op=$db->query("UPDATE `customer_info` SET `balance`='$debit' WHERE `name`='$sender'");

                    $query = "insert into transanction_history(sender,reciever,amount) values('$sender','$reciever','$amount')";       
                    $run = mysqli_query($db,$query) or die(mysqli_error());
                    if($run){
                                
                        header("Location:landing_page.html");
                    }
                    else{
                        echo "SOMETHING WENT WRONG";
                    }
                }
            
                else{
                    echo "<span style='color:red;'>NOT ENOUGH BALANCE AVAILABLE TO COMPLETE THE TRANSACTION</span>";
                }
            }
            else{
                echo "<span style='color:red;'>YOU CANNOT TRANSFER MONEY TO THE SAME PERSON</span>";
            }
	}
	else{
		echo "<span style='color:red;'>ALL FIELDS ARE COMPULSORY</span>";
	}
}

?>
