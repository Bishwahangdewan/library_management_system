<?php
    //require connection
    require_once "db/conn.php";

    if(isset($_POST['submit'])){
        //validate form
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $dept = $_POST['dept'];

        $msg ="";
        $class="";

        //validate password
        if($password !== $cpassword){
            $msg = "Password does not match";
            $class="is-invalid";
        }else{

            $query = "SELECT * FROM students WHERE email ='".$email."';";
            $result = mysqli_query($conn ,$query);
            $alreadyemail = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            if($alreadyemail == []){
                //no email exists register user and create new table for books
                $query = "INSERT INTO students (fname, lname, email,password,dept)
                VALUES ('$fname', '$lname', '$email', '$password' ,'$dept')";

                if(mysqli_query($conn ,$query)){
                    //student registered  
                    header("Location:newbook.php?"."email=$email");
                }
            }else{
                //email exists show error
                $msg="Email is already taken";
                $class="is-invalid";
            }
        }

    }

?>

<?php require_once 'db/config.php'; ?>
<!-- Call header -->
<?php require_once 'layout/header.php';?>

<div class="container my-5 w-50">
    <h2>Student Register</h2>
    <form method="POST" action="<?php echo APPROOT; ?>register.php">
        <div class="form-group">
            <label for="fname">Firstname</label>
            <input type="text" name="fname" class="form-control" id="fname" required>
        </div>

        
        <div class="form-group">
            <label for="lname">Lastname</label>
            <input type="text" name="lname" class="form-control" id="lname" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control <?php if($msg !== ""){echo $class;}?>" id="email" required>
            <div class="invalid-feedback"><?php if($msg !== ""){echo $msg;} ?></div>
        </div>

        <div class="form-group">
            <label for="dept">Department</label>
            <input type="text" name="dept" class="form-control" id="dept" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control <?php if($msg !== ""){echo $class;}?>" id="cpassword" required>
            <div class="invalid-feedback"><?php if($msg !== ""){echo $msg;} ?></div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<!-- Call Footer -->
<?php require_once 'layout/footer.php' ?>