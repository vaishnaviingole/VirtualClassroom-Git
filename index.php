<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>

    <?php include 'dbconnect.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $role = $_POST['role'];
        
          if($role === 'Faculty'){
            $existSql = "SELECT * FROM `teacherregister` WHERE email = '$email' AND password = '$pass'";
            $result = mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows == 1){
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                header("location: teacher_index.php");
            }
            else{
               echo "<script>alert('Incorrect Email or Password !!');</script>";
            }
          }
          else{
            $existSql = "SELECT * FROM `studentregister` WHERE email = '$email' AND password = '$pass'";
            $result = mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows == 1){
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];


                header("location: student_index.php");
            }
            else{
                echo "<script>alert('Incorrect Email or Password !!');</script>";
            }
          }
    }
?>

    <div class="text-center">
        <img class="mt-4 mb-4"
            src="https://png.pngtree.com/png-vector/20191018/ourmid/pngtree-user-icon-isolated-on-abstract-background-png-image_1824979.jpg"
            height="72" alt="usericon">
        <section class="container-fluid">
            <!-- row and justify-content-center class is used to place the form in center -->
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-4">
                    <form class="form-container" action="index.php" method="POST">
                        <div class="form-group">
                            <h4 class="text-center font-weight-bold"> Login </h4>

                        </div>
                        <div class="form-group">

                            <label for="InputEmail1">Email Address</label>
                            <input type="email" class="form-control" name="email" aria-describeby="emailHelp"
                                placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="student/faculty">Student /Faculty</label>
                            <select class="form-select" aria-label="Default select example" name="role" required>
                                <option value="">--Choose One--</option>
                                <option value="Student">Student</option>
                                <option value="Faculty">Faculty</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        <div class="form-footer">
                            <p> Don't have an account? <a href="register.php">Register</a></p>

                        </div>
                    </form>
                </section>
            </section>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>