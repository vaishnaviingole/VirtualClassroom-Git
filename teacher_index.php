<?php 
include('dbconnect.php');
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

    
}
else{
    echo "<script>alert('You haven't logged in ! Please log in to continue .);</script>";
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Bootstrap CSS -->
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
rel="stylesheet"
integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
crossorigin="anonymous"
/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<title>teacher</title>

<style type="text/css">
.flex-container{
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
height: 400px;
}

.flex-container > div{
margin:10px;
}

.text-center > button {
  width: 200px;
  background-color: #1ABC9C;
}

#main{
  background-color: #17A589;
}


#main h4{
  background-color: #17A589; 
  height: 61px;

}


#class{
  height: 250px;
  border: 2px solid black;
  border-radius: 5px;
  margin: 10px;
  width: auto;
  background-color: #76D7C4;
  margin: 3%;
  margin-left: 4%;
  line-height: none;
}

#class h2{

  color: white;


}

#class h3{

  color: white;


}


#class a{
  text-decoration: none;
}




</style>
</head>
<body>

<div class="col-sm-12" id="main">
<div class="text-center">
  <h4 class="p-3 mb-2  text-white">WELCOME <b><?php echo  $_SESSION['fname']." ".$_SESSION['lname'];?></b> !</h4>
</div>


  
  <button
          type="button"
          class="btn  btn-lg text-white"
          data-bs-toggle="modal"
          data-bs-target="#createModal"
          data-bs-whatever="cModal"
        >
         <i class="fa fa-edit" style="color: white"></i> Create Class
        </button>&nbsp;&nbsp;


  <button
  type="button"
  class="btn  btn-lg text-white"
  data-bs-toggle="modal"
  data-bs-target="#joinModal"
  data-bs-whatever="@mdo"
>
 <i class="fa fa-book" style="color: white"></i> Join Class
</button>
</div>
</div>


  
    



<!-- MODALFOR CREATE CLASS STARTS HERE -->


<div
  class="modal fade"
  id="createModal"
  tabindex="-1"
  aria-labelledby="createModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Create Class</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <div class="modal-body">


<!--PhP scripting for create class-->

<!--for machine generated class code-->
<?PhP
$sql = "SELECT code FROM class ORDER BY code DESC LIMIT 1";
$sql_q = mysqli_query($conn, $sql);
$ro = mysqli_fetch_assoc($sql_q);
                $eid_get_from_sql = $ro['code'];
                function increment($sid)
                {
                    return ++$sid[1];
                }

                $eid_get_from_sql = preg_replace_callback("|(\d+)|", "increment", $eid_get_from_sql);
?>
<!--for machine generated class code end-->

<?php 
if (isset($_POST['submit'])) {
$classname = $_POST['classname'];
$subject = $_POST['subject'];
$query= "INSERT INTO `virtualclassroom`.`class` (`id`,`classname`,`subject` ,`code`)VALUES (NULL , '$classname', '$subject', '$eid_get_from_sql')";

$mn = "INSERT INTO `virtualclassroom`.`class_member` (`id`, `fname`, `lname`, `email`, `classcode`, `roll`, `classname`, `subject`) VALUES (NULL, '$fname', '$lname', '$email', '$eid_get_from_sql', 'Faculty', '$classname', '$subject');";

$mn_q = mysqli_query($conn, $mn);
$query_q = mysqli_query($conn, $query);
if ($query_q == true) {
  echo "<script>alert('Your classcode is: $eid_get_from_sql do share with your students to get them joined into your classroom.');</script>";

}

else{
  mysql_error();
}




        
}

?>
<!--PhP scripting for create class end-->


        <form action="teacher_index.php" method="post" >

          <div class="mb-3">
            <label for="class-name" class="col-form-label"
              >Class Name:</label
            >
            <input type="text" class="form-control" id="class-name" name="classname" required="" />
          </div>
          
          <div class="mb-3">
            <label for="Section" class="col-form-label">Subject:</label>
            <input type="text" class="form-control" id="section" name="subject" required="" />
          </div>

          <div class="mb-3">
            <label for="class-code" class="col-form-label"
              >Classcode:</label>

            <input type="text" class="form-control" id="code" name="code" value="<?php echo $eid_get_from_sql ; ?>" disabled=""/>
            
          </div>
          <div class="modal-footer">
        
        <input type="reset" name="cancel" value="Cancel" class="btn btn-secondary" data-bs-dismiss="modal">

        <input type="submit" name="submit" value="Create" class="btn btn-primary">
          
        
      </div>
        </form>
      </div>

      
    </div>
  </div>
</div>
</div>
<!-- MODAL FOR CREATE CLASS ENDS HERE -->

<div class="text-center">

</div>
<!--PhP scripting for join class -->
<?php
if (isset($_POST['submit_code'])) {
$class_code = $_POST['class_code'];


$abc = "SELECT * FROM `class` WHERE code = '$class_code'";
$run_abc = mysqli_query($conn, $abc);
$row = mysqli_fetch_array($run_abc);
$classname = $row['classname'];
$subject = $row['subject'];
            $count = mysqli_num_rows($run_abc);
            if($count == 0){
                echo "<script>alert('Invalid Class Code ! Please check and try again.');</script>";

            }
            else{
              $que= "INSERT INTO `virtualclassroom`.`class_member` (`id`, `fname`, `lname`, `email`, `classcode`, `roll`, `classname`, `subject`) VALUES (NULL, '$fname', '$lname', '$email', '$class_code', 'Faculty', '$classname', '$subject');";

              $que_q = mysqli_query($conn, $que);
              if ($que_q == true) {
              echo "<script>alert('You have successfully joined classroom as a teacher.');</script>";

              }

              else{
                mysql_error();
                  }
            }





}
?>
<!--PhP scripting for join class end -->


<div class="text-center">
<!-- MODAL FOR JOIN CLASS STARTS HERE HERE -->


<div
  class="modal fade"
  id="joinModal"
  tabindex="-1"
  aria-labelledby="JoineModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="joinModalLabel">Join Class</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form action="teacher_index.php" method="post">
          <div class="mb-3">
            <label for="class-name" class="col-form-label"
              >Enter Code:</label
            >
            <input type="text" class="form-control" id="class-name" name="class_code" required="" />
          </div>

          <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Cancel
        </button>
        <input type="submit" name="submit_code" value="Join" class="btn btn-primary" >
        </button>
        </form>
      </div>
      
      </div>
    </div>
  </div>
</div>


<!--VIEW CLASS STARTS FROM HERE-->


<!-- FORM FOR CREATE CLASS ENDS HERE -->

<!-- Modal -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
crossorigin="anonymous"
></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>



<div class="w3-row w3-border">
  <?php  
$a = "SELECT * FROM `class_member` WHERE fname = '$fname' AND lname = '$lname' AND roll = 'Faculty'" ;
$amn = mysqli_query($conn,$a) ;




if($amn === false) {
    var_dump(mysql_error());
    echo "You have not joined any classroom ! Please join to continue .";
}

  while($row=mysqli_fetch_assoc($amn))  { ?> 

<div class="w3-third w3-container" id="class">
  <a href="teacher_dashboard.php?classcode=<?php echo  $row['classcode']; ?>">
  <div id="bg">
    <h2><?php echo $row['classname']; ?><i class='fa fa-chalkboard-teacher' style='font-size:48px;color:red;float: right;margin-left: 120px'></i></h2>
    <h3> <?php echo $row['subject']; ?></h3><br><br><br><br>
      <p>Click here to visit classroom and view details.</p>
  
  
  </div>
  </a>
  
</div>

<?php } ?>
</div>



    

</body>
</html>
