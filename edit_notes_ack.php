
<?php
include('dbconnect.php');
include("teacher_nav.php");
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $code = $_GET['classcode']; 
    

    
}
else{
    echo "<script>alert('You haven't logged in ! Please log in to continue .);</script>";
    
}
?>

<?php 
$id = $_GET['id'];
$q = "SELECT * FROM add_notes WHERE id = '$id' AND classcode = '$code'";
$que = mysqli_query($conn , $q);
$row=mysqli_fetch_assoc($que);	
$title = $row['title'] ;
$Subject = $row['Subject'] ;
$filename = $row['filename'];
$code = $_GET['classcode']; 

if (isset($_POST['submit'])) {
	$t = $_POST['Title'];
	$s = $_POST['Subject'];
	$edit = mysqli_query($conn ,"UPDATE add_notes SET title='$t', Subject='$s' where id='$id'");
	
    if($edit)
    {
       
        
    }
    	

}


?>



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#cont{
			margin-top: 50px;
			
		}


		#box{
			margin-top: 10%;
			background-color: #EDF9F6;
			height: 200px;
			border: 1px solid black;
			border-radius: 5px

		}


		hr{
			background-color: black
		}
	</style>
</head>
<body>
<div class="col-sm-12" id="cont">
	<div class="col-sm-4" >
		
	</div>
	<div class="col-sm-4" id="box">
		<center><h3>Notes Edited Successfully !</h3></center><hr>
		<h4>Notes  has been Edited successfully !</h4><br>

		<center><a href="see_notes-teach.php?classcode=<?php echo $code;?>" class = "btn  btn-danger" id="btn" ><b>Ok!</b></a></center>
		
	</div>
	<div class="col-sm-4" >
		
	</div>
	
	
</div>
</body>
</html>