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
	<title>See Notes | Teacher</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  


<style type="text/css">
	table{
		font-size: 20px;
		border-radius: 5px;
	}

	table th{
		background-color: #73C6B6;
		width: 100px;
	}

	#btn{
		background-color: #04AA6D;
		margin: 10px;
		
	}

</style>
</head>
<body>
	<div class="col-sm-10" id="nav">
		<?php include("teacher_nav.php");
		?>

    </div><br><br><br><br><br><br>



	<div class="col-sm-12">
		<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Title</th>
      <th scope="col">File</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

	<?php  
$a = "SELECT * FROM `add_notes` WHERE classcode = '$code'" ;
$amn = mysqli_query($conn,$a) ;


if($amn === false) {
    var_dump(mysql_error());
    echo "No Data Found !";
}

  while($row=mysqli_fetch_assoc($amn))  { 
  	$id = $row['id']?>

		
    <tr>
      <td><?php echo $row['Subject']; ?></td>
      <td><?php echo $row['title']; ?></td>
      <td><center><a href="notes/<?php echo $row['filename'];  ?>" class = "btn  btn-danger" id="btn" ><b>Preview</b></a></center></td>
      <td><center><a  href="edit_notes.php?classcode=<?php echo $code;?>&id=<?php echo $id?>" class = "btn  btn-danger" id="btn"  ><b>Edit</b></a>
      	<a   href="delete_notes.php?classcode=<?php echo $code;?>&id=<?php echo $id;?>" class = "btn  btn-danger" id="btn" ><b>Delete</b></a></center></td>
    </tr>
   
  </tbody>
  <?php }
?>
</table>
</div>



	




</body>
</html>