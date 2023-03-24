
<?php
include('dbconnect.php');
include("teacher_nav.php");
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    

    
}
else{
    echo "<script>alert('You haven't logged in ! Please log in to continue .);</script>";
    
}

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from add_notes where id = '$id'"); 

if($del)
{
    
    
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

$q = "SELECT * FROM add_notes WHERE id = '$id'";
$que = mysqli_query($conn , $q);
$row=mysqli_fetch_assoc($que);
$title = $row['title'] ; 
$Subject = $row['Subject'] ;
$code = $_GET['classcode']; 
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
		<center><h3>Deleted Successfully !</h3></center><hr>
		<h4>Notes  has been deleted successfully !</h4><br>

		<center><a href="see_notes-teach.php?classcode=<?php echo $code;?>" class = "btn  btn-danger" id="btn" ><b>Ok!</b></a></center>
		
	</div>
	<div class="col-sm-4" >
		
	</div>
	
	
</div>
</body>
</html>