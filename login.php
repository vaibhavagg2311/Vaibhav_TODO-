<?php
    if(!empty($_GET['msg']))
    {
        echo "<script>alert('Please Login First')</script>";
    }

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if((!empty($_POST['agent_id'])) && (!empty($_POST['password'])) && (!empty($_POST['agent_key'])))
		{
            include 'connection.php';
			$agent_id=$_POST['agent_id'];
			$password=hash("sha256",$_POST['password']);
			$agent_key=$_POST['agent_key'];
            $q="select * from login where agent_id='$agent_id' AND password='$password' AND agent_key='$agent_key'";
			$res=mysqli_query($con,$q) or exit('Error in Query!!');
			$c=mysqli_num_rows($res);
			if($c>0)
			{
				$row=mysqli_fetch_row($row);
				{
					header("location:to_do.php?agent_id=$agent_id");
				}
				session_start();
                $_SESSION['agent_id'] = $agent_id;
                $_SESSION['name'] = $name;
			}
			else {
			 	echo "<script>alert('Please Check Agent ID or Password or Security Key')</script>";
			 } 
		}
	}

	include 'login.html';
?>