<!-- Call header -->
<?php require_once 'layout/header.php';?>
<?php
    //require connection
    require_once "db/conn.php";
    

    if(isset($_POST['submit'])){
        //validate form
        $email = $_POST['email'];
        $password = $_POST['password'];
  
        $msg ="";
        $class="";
        $pass_err="";

        $query = "SELECT * FROM students WHERE email ='".$email."';";
        $result = mysqli_query($conn ,$query);
        $alreadyemail = mysqli_fetch_all($result,MYSQLI_ASSOC);

        if($alreadyemail == []){
            //user is not registered
            $msg = "user is not registered";
            $class="is-invalid";
        }else{
            //check password
            foreach($alreadyemail as $student){
                if($student['password'] == $password){
                    //correct password Login user start session
                    $_SESSION['fname'] = $student['fname'];
                    $_SESSION['lname'] = $student['lname'];
                    $_SESSION['email'] = $student['email'];
                    $_SESSION['dept'] = $student['dept'];
                    $_SESSION['id'] = $student['id'];
                    
                    header("Location:index.php");
                }else{
                    //invalid password
                    $pass_err = "invalid Password";
                    $class = "is-invalid";
                }
            }
        }
    }

?>

<!-- Call Config file -->
<?php require_once 'db/config.php'; ?>



<div class="container my-5 w-50">
    <h2>Student Login</h2>
    <form method="POST" action="<?php echo APPROOT; ?>login.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control <?php if($msg !== ""){echo $class;}?>" id="email" required>
            <div class="invalid-feedback"><?php if($msg !== ""){echo $msg;} ?></div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control <?php if($pass_err !== ""){echo $class;}?>" id="password" required>
            <div class="invalid-feedback"><?php if($pass_err !== ""){echo $pass_err;} ?></div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<!-- Call Footer -->
<?php require_once 'layout/footer.php' ?>