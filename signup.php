<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if((!empty($_POST['name'])) && (!empty($_POST['agent_id'])) && (!empty($_POST['password'])) && (!empty($_POST['agent_key'])))
		{
				include 'connection.php';
				$name=$_POST['name'];
				$agent_id=$_POST['agent_id'];
				$password=hash("sha256",$_POST['password']);
				$agent_key=$_POST['agent_key'];
				$q="select * from login where agent_id='$agent_id'";
				$res=mysqli_query($con,$q) or exit('Error in query');
				$c=mysqli_num_rows($res);
				if($c==0)
				{
					$q="Insert into login
						values('$name','$agent_id','$password','$agent_key')";
					mysqli_query($con,$q) or exit('Error in Query');
					echo "<script>alert('Agent Added')</script>";
				}
				else
				{
					echo "<script>alert('Agent Already Exsists')</script>";
				}
		}
		else
		{
			echo "<script>alert('Field Cannot be Left Blank');</script>";
		}
	}
	include 'signup.html';
?>