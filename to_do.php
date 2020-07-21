<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>To-Do List</title>
</head>
<body>
<style>
    .to_do {
    	background: lightseagreen;
    }
    .card {
    	border-radius: 15px;
    }
</style>
<?php
	include 'connection.php';
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if((!empty($_POST['title'])) && (!empty($_POST['description'])) && (!empty($_POST['category'])) && (!empty($_POST['due_date'])))
		{
			$agent_id = $_SESSION['agent_id'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$category = $_POST['category'];
			$due_date=$_POST['due_date'];
			$status=1;
			$q="insert into to_do values('$agent_id','$title','$description','$category','$due_date','$status')";
			mysqli_query($con,$q) or exit('Error in Query');
			echo "<script>alert('New Item Added')</script>";
		}
		else
		{
			echo "<script>alert('Field Cannot be Left Blank');</script>";
		}
	}
?>
	<div class="container-fluid text-light bg-warning">
		<nav class="navbar container navbar-light ">
		 	<a class="navbar-brand">
		 		Welcome, 
		 		<?php
		 			$agent_id = $_SESSION['agent_id'];
		 			$q="select name from login where agent_id='$agent_id'";
		 			$res=mysqli_query($con,$q) or exit('Error in Query');
		 			$row=mysqli_fetch_array($res);
		 			echo $row[0];
		 		?>
			</a>
		  	<form class="form-inline">
		    	<a href="logout.php">
		    		<button class="btn btn-outline-dark my-2 my-sm-0">Logout</button>
		    	</a>
		  	</form>
		</nav>
	</div>
		
<section>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">Add TODO Item</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
						      <div class="modal-body">
						      		<div class="form-group">
										<label for="agent_id">Title</label>
										<input type="text" id="title" name="title" class="form-control" placeholder="Title" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="description">Description</label>
										<textarea name="description" id="description" class="form-control"></textarea>
									</div>
									<div class="form-group">
										<label for="category">Category</label>
										<input type="text" id="category" name="category" class="form-control" placeholder="Category">
									</div>
									<div class="form-group">
										<label for="due_date">Due Date</label>
										<input type="date" id="due_date" name="due_date" class="form-control">
									</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Add</button>
						      </div>
						  </form>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
		<?php
			$agent_id = $_SESSION['agent_id'];
			$q="select * from to_do where agent_id='$agent_id' ORDER BY due_date";
			$res=mysqli_query($con,$q);
			while ($row=mysqli_fetch_array($res))
			{
				$date = date("d-m-Y", strtotime($row[4]));
				echo "<div class='card my-3'>";
				echo "	<div class='card-body'>";
				echo "	    <h5 class='card-title'>$row[1]</h5>";
				echo "	    <p class='card-text'>$row[2]</p>";
				echo "		<h6 class='card-text'>Due Date : $date</h6>";
				echo "	    <h6 class='card-text'>Category : $row[3]</h6>";
				echo "	</div>";
				echo "</div>";
			}
		?>
		</div>
	</section>
	<footer class="footer fixed-bottom mt-auto py-3">
		<div class="row justify-content-center">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add TODO</button>
			
		</div>
	</footer>
</body>
</html>