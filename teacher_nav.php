<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
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
</style> </head>

<body>
<div class="col-sm-10" id="nav">
<nav class="navbar navbar-default navbar-fixed-top navbar-right" style="background-color: #04AA6D; padding-right: 14px;border-radius: 5px;">

  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"style="background-color:#04AA6D; color: white;" class="btn btn-info">

      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand" href="teacher_dashboard.php?classcode=<?php echo $code ; ?>" style="font-size: 40px;color:white; "><b>CLASSROOM</b></a>

  </div>

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav navbar-right">


<li class="nav-item dropdown active" >
<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown" style="background-color: #04AA6D;color: white;">  ADD ANNOUNCEMENT <i class="fa fa-angle-double-down"></i> </a>
<ul class="dropdown-menu" >
<li><a class="dropdown-item" href="add_msg.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> ADD TEXT MESSAGE</a></li>

<li><a class="dropdown-item" href="add_notes.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 ">  ADD NOTES</a></li>

<li><a class="dropdown-item" href="add_video.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> ADD VIDEO LECTURE</a></li>





</ul>
</li>

<li class="nav-item dropdown active" >
<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown" style="background-color: #04AA6D;color: white;">  SEE ANNOUNCEMENT<i class="fa fa-angle-double-down"></i> </a>
<ul class="dropdown-menu" >
<li><a class="dropdown-item" href="see_msg-teach.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> SEE TEXT MESSAGE</a></li>

<li><a class="dropdown-item" href="see_notes-teach.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 ">  SEE NOTES</a></li>

<li><a class="dropdown-item" href="see_video-teach.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> SEE VIDEO LECTURE</a>
</ul>
</li>


<li class="nav-item dropdown active" >
<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown" style="background-color: #04AA6D;color: white;">  QUIZ <i class="fa fa-angle-double-down"></i> </a>
<ul class="dropdown-menu" >
<li><a class="dropdown-item" href="add_quiz.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 ">  ADD QUIZ</a></li>

<li><a class="dropdown-item" href="see_result.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> SEE RESULT</a></li>
</ul>
</li>

<li class="nav-item dropdown active" >
<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown" style="background-color: #04AA6D;color: white;">  STUDENTS <i class="fa fa-angle-double-down"></i></a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="see_students.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 ">  SEE ENROLLED STUDENTS</a></li>
<li><a class="dropdown-item" href="see_msg.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> SEE MESSAGES</a></li>
</ul>
</li>

<li class="nav-item dropdown active" >
<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown" style="background-color: #04AA6D;color: white;">  LIBRARY <i class="fa fa-angle-double-down"></i></a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="add_book.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 ">  ADD BOOKS</a></li>
<li><a class="dropdown-item" href="see_library.php?classcode=<?php echo $code ; ?>" style="color: #1B2631 "> SEE LIBRARY</a></li>
</ul>
</li>


<li class="nav-item active"><a class="nav-link" href="add_attendance.php?classcode=<?php echo $code ; ?>"style="background-color: #04AA6D;color: white;" > ATTENDANCE</a></li>





</ul>
</div> <!-- navbar-collapse.// -->
</div>
</div>
</nav>
</div>
</body>
</html>




