<?php
	$str = "";
	if($_POST) 
	{
		$user1 = $_POST['user1'];
		$user2 = $_POST['user2'];
		$credit = $_POST['credits'];
		if($user1!="" && $user2!="" && $credit!="") 
		{
			$link = mysqli_connect("localhost","root","","transfercredits");
			if(!mysqli_connect_error())
			{
				$query="select * from users where userid=$user1";
				$result = mysqli_query($link,$query);
				if ($result)
				{
					$query="select * from users where userid=$user2";
					$result = mysqli_query($link,$query);
					if ($result)
					{
                    	
						$query="select * from credits where credit=$credit";
						$result = mysqli_query($link,$query);
						$q1="select curcredits from users where userid=$user1";
						$r1 = mysqli_query($link,$q1);
						$q2="select curcredits from users where userid=$user2";
						$r2 = mysqli_query($link,$q2);
						if ($result)
						{
							
							$query = "insert into transfers (fromuserid,touserid,credit) values ($user1,$user2,$credit) ";
							$result = mysqli_query($link,$query);
							if ($result)
							{	
								$query = "update users set curcredit=curcredit+$credit where userid=$user2";
								$result = mysqli_query($link,$query);
								if ($result)
								{
									$query = "update users set curcredit=curcredit-$credit where userid=$user1";
									$result = mysqli_query($link,$query);
									if ($result)
									{
										
										session_start();
										header('Location: http://localhost/NewFolder/one.php');
									}
								}
								
							}
						}
						else $str="Enter valid credit value.[1-50]";


					}
                    else $str="Enter valid user id.";

				}
				else $str="Enter valid user id.";

			}
			else $str="connection failed.";
		}
		else
		{
			$str = "Enter Values for Required fields.";
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	
	
	<title>Transfer Credits</title>
	
	<style type="text/css">
		#box {
			border:1px solid grey;
			padding:50px;
			margin:100px 0px;
			background-color:#F3F3F3;
		}
		.alert-danger {
			margin:10px 0px;
			text-align:center;
			padding:5px;
		}
		
		sup {
			color:red;
			font-size:medium;
		}
	</style>

  </head>
  <body>
    <?php $uid=$_GET['id']; ?>
	<div class="container">
	<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
	<div id="box">
	<div class="alert-danger"><?php echo $str; ?></div>
	<form method="post">
		<div class="form-group">
      <label for="user1">From User ID<sup>*</sup></label>
      <input type="text" class="form-control" name="user1" id="user1" value=<?php echo $uid ?> >
    </div>
    <div class="form-group">
      <label for="user2">To User ID<sup>*</sup></label>
      <input type="text" class="form-control" name="user2" id="user2" placeholder="Ex: 01">
    </div>
    <div class="form-group">
      <label for="credits">Credits<sup>*</sup></label>
        <input type="text" class="form-control" name="credits" id="credits" placeholder="Ex: 01">
    </div>
    <button class="btn btn-primary">Transfer</button>
	</form>
	</div>
	</div>
	<div class="col-sm-2"></div>
	</div>
	</div>
	
	

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>