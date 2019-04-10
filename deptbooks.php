<?php 
	//require connection
	require_once "db/conn.php";

	$department = mysqli_real_escape_string($conn,$_GET['dept']);
	$books = [];

	//get cse books
	if($department == "cse"){
		$query = "SELECT * FROM books WHERE dept ='".$department."';";

		$result = mysqli_query($conn ,$query);

        $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
       

		
	//get ee books
	}elseif($department == "ee"){
		$query = "SELECT * FROM books WHERE dept ='".$department."';";

		$result = mysqli_query($conn ,$query);

		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

	//get ece books
	}elseif($department == "ece"){
		$query = "SELECT * FROM books WHERE dept ='".$department."';";

		$result = mysqli_query($conn ,$query);

		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

	//get ce books
	}elseif($department == "ce"){
		$query = "SELECT * FROM books WHERE dept ='".$department."';";

		$result = mysqli_query($conn ,$query);

		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

	//get me books
	}else{
		$query = "SELECT * FROM books WHERE dept ='".$department."';";

		$result = mysqli_query($conn ,$query);

		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

		
	}

?>

<?php require_once "layout/header.php" ?>


    <section class="container">
        <h1 class="text-center mt-5">Books</h1>
        <div class="row mt-5">
            <?php foreach($posts as $post): ?>
            <div class="col-md-4 mt-5">
            <div class="card mx-auto" style="width: 18rem;">
     
                 <img style="height:300px;" src="image/bookscover/<?php echo $post['cover']; ?>" class="card-img-top cardimg" alt="...">

                 <div class="card-body">
                     <p class="card-text"><a href="<?php echo APPROOT; ?>eachbook.php?id=<?php echo $post['bookid'] ?>" class="nav-link"><?php echo $post['name'] ?></a></p>
                     <p class="ml-3 lead"><?php echo $post['author']; ?></p>
                 </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php require_once "layout/footer.php" ?>
