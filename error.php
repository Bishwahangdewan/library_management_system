<?php 

    require_once "layout/header.php";
    require_once "db/conn.php";
    require_once 'db/config.php'; 

    $err = $_GET['msg'];
    $msg;
    if($err == "bookoverflow"){
        $msg = "You cannot issue more than three books";
    }else{
        echo false;
    }
?>

<div class="container my-5">
    <h1 class="display-4 text-danger"><?php echo $msg ?></h1>
    <a class="btn btn-primary" href="<?php echo APPROOT ?>books.php">Go back</a>
</div>

<?php require_once "layout/footer.php" ?>