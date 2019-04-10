<!--Call config file-->
<?php require_once 'db/config.php' ?>

<!-- Call header -->
<?php require_once 'layout/header.php';?>

<!--books-->
<section class="container my-5">
    <h1 class="display-4 mb-5 text-center">Books</h1>
	<div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
           
               <img style="height:200px;" src="image/CSE cover.png" class="card-img" alt="...">
          
               <div class="card-body">
                 <p class="card-text"><a href="<?php echo APPROOT; ?>deptbooks.php?dept=cse" class="nav-link">Computer Science and Engineering</a></p>
               </div>
        </div>
    </div>
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
     
               <img style="height:200px;" src="image/electronicscover.jpg" class="card-img-top cardimg" alt="...">
          
               <div class="card-body">
                 <p class="card-text"><a href="<?php echo APPROOT; ?>deptbooks.php?dept=ece" class="nav-link">Electronics and Communication Engineering</a></p>
               </div>
            </div>
        </div>

        <div class="col-md-4">
        <div class="card mx-auto" style="width: 18rem;">
     
         <img style="height:200px;" src="image/eecover.jpg" class="card-img-top cardimg" alt="...">

        <div class="card-body">
          <p class="card-text"><a href="<?php echo APPROOT; ?>deptbooks.php?dept=ee" class="nav-link">Elecrical Engineering</a></p>
         </div>
    </div>
        </div>
        <div class="col-md-4 mt-5">
        <div class="card mx-auto" style="width: 18rem;">
     
        <img style="height:200px;" src="image/cecover.jpg" class="card-img-top cardimg" alt="...">

        <div class="card-body">
         <p class="card-text"><a href="<?php echo APPROOT; ?>deptbooks.php?dept=ce" class="nav-link">Civil Engineering</a></p>
        </div>
    </div>
        </div>
        <div class="col-md-4">
        <div class="col-md-4 mt-5">
        <div class="card mx-auto" style="width: 18rem;">
     
        <img style="height:200px;" src="image/mechanical.png" class="card-img-top cardimg" alt="...">

        <div class="card-body">
         <p class="card-text"><a href="<?php echo APPROOT; ?>deptbooks.php?dept=me" class="nav-link">Mechanical Engineering</a></p>
        </div>
    </div>
        </div>
    </div>
</section>

<!-- Call Footer -->
	<?php require_once 'layout/footer.php' ?>