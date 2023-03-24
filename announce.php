<?php 
include('dbconnect.php');
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $code = $_GET['classcode'];
    
}
else{
    echo "<script>alert('You haven't logged in ! Please log in to continue .);</script>";
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
   
   .container {
            max-width: 820px;
            margin: 0px auto;
            margin-top: 50px;
        }
        .comment {
            float: left;
            width: 100%;
            height: auto;
        }
        .commenter {
            float: left;
        }
        .commenter img {
            width: 35px;
            height: 35px;
        }
        .comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }

        .textinput {
            float: left;
            width: 100%;
            min-height: 400px;
            outline: none;
            resize: none;
            margin-top: 10%;
        }
        .button1 {
        color: #FFFFFF;
        background-color:#00b33c;
        margin-top: 50px;
    }
    </style>
</head>
<body>
<?php include 'dbconnect.php'; ?>
<div>
<?php include 'teacher_navbar.php'; ?>
</div>
<form class="form-container" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"> 
 
<div class="container">
  
<div class="container">
        <div class="comment">
            <textarea class="textinput" placeholder="Announce Something!"   name="a_msg" style="border:groove 6px #00b33c";></textarea>
            <button class="button button1" type="submit"  value="POST" name="a_add">POST</button>
        </div>
    </div>
</form>
<?php
 $a_fname=$_SESSION['fname'];
 $a_lname=$_SESSION['lname'];
 

?>
<?php
echo "<h2>" . isset($_POST['a_add']) . "</h2>";
if(isset($_POST['a_add']) ){
    $a_msg1=trim($_POST['a_msg']);

    $sql="INSERT INTO  announce (`a_msg`,`a_fname`,`a_lname`) VALUES ('$a_msg1','$a_fname','$a_lname')";
if (mysqli_query($conn,$sql)){
    echo"<script>alert('Posted Succefully');</script>";
      
}
else{
    echo"ERROR:".$sql."<br>" . mysqli_error($conn);
}
}


//<p><? php echo $fname." ".$lname; 
?>
<?php
    $sql="SELECT * from announce";
    $reqult=mysqli_query($conn,$sql);

    ?>
   </body>
   </html>