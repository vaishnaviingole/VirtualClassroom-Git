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
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
body{
font-family: times new roman;
}
#main{
height: auto;
width: 100%;
background-color: #04AA6D;
}

#nav{
height: auto;
width: 100%;
font-family: times new roman;


}


.dropdown-menu{

	
}

.dropdown-item{
	color: white;
	font-weight: bold;
}
</style> 
 
<style type="text/css">
	.main{
		box-sizing: border-box;
		margin:auto;
		max-width: 100%;
		max-height: 100%;
	}
input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}	
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size: 15px;
}
input [type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;   
}
input[type=submit]:hover {
  background-color: black;
}
.main {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px;
  height: 100%;
}
.a {
  float: left;
  width: 25%;
  margin-top: 6px;
}
.b {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:before {
  content: "";
  display: table;
  clear: both;
}
#submit  {
	float:right;
	width: 150px;
	font-size: 20px;
	background-color: green;	
}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .a, .b, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

</style>
	<title>Add Book</title>
</head>
<body>
	<div class="col-sm-10" id="nav">
		<?php include("teacher_nav.php");
		?>

</div><br><br><br><br><br><br><br><br>
	
	

	<div class="main">
		<h2>Add Book</h2>
		<form method="post" action="add_book.php?classcode=<?php echo $code; ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="a">
					<label for="title">Title</label>	
				</div>

				<div class="b">
					<input type="text"
					 id="title"
					name="Title"
					placeholder="Add Title.."
					required="">
				</div>	
			</div>

			<div class="row">
				<div class="a">
					<label for="Subject">Subject</label>	
				</div>
				<div class="b">
					<input type="text" name="Subject" id="Subject" placeholder="Add Subject..">
				</div>	
			</div>

			<!--<div class="row">
				<div class="a">
					<label for="Topic">Topic</label>	
				</div>
				<div class="b">
					<textarea id="Topic" name="Topic" placeholder="Write Something.." style="height: 200px">	
					</textarea>	
				</div>
			</div>-->

			<div class="row">
				<div class="a">
					<label for="file">Add File</label>	
				</div>
				<div class="b">
					<input type="file" name="filename" id="file" required="">	
				</div>
			</div>
			<br>

			<div class="submit">
				<input class="btn btn-info" name="submit" id="submit" type="submit" value="Submit" onclick="attention()">
			</div>
		</form>	
	</div>
</body>
</html>
<?php
include("dbconnect.php");
if (isset($_POST['submit'])) {
  $Title=$_POST['Title'];
  $Subject=$_POST['Subject'];
  $filename=$_FILES['filename']['name'];
  $tmp_name=$_FILES['filename']['tmp_name'];
  $location="books/";

  move_uploaded_file($tmp_name, $location.$filename);

  $sql="INSERT INTO `virtualclassroom`.`add_books` (`id`, `title`, `Subject`, `filename`, `fname`, `lname`, `classcode`) VALUES (NULL, '$Title', '$Subject', '$filename', '$fname', '$lname', '$code')";

$execute_query=mysqli_query($conn,$sql);

if ($execute_query==true) {
	echo"<script>alert('Book inserted succesfully!');</script>";
}

}

?>