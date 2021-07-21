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
    </header>
    <br>
                
    <form class="details" action="transaction.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">PLEASE ENTER THE BENEFACTOR NAME:</label>
        <input type="text" class="form-control" name="sender" required>
        <br>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">PLEASE ENTER THE BENEFICIARY NAME:</label>
        <input type="text" class="form-control" name="reciever" required>
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
		echo "<span style='color:red;'>ALL FIELDS ARE COMPULSORY</span>";
	}
}

?>
