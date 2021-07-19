<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="https://image.flaticon.com/icons/png/512/401/401126.png" type="image/gif" />
	<title>GREEN POINTS</title>

	<style>
	body {
		background-image: url('images/5.png');
		height: 100%;
		/*object-fit: cover;*/
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
	}

	.button {
		background-color: #ff5c33;
		border: none;
		color: white;
		padding: 15px 25px;
		text-align: center;
		text-decoration: none;
		font-size: 15px;
		margin: 4px 2px;
		cursor: pointer;
		border-radius: 8px;
	}
	.button:hover {
		background-color:#ffad99;
	}

	h1{
		font-family: Candara;
		color: #00b38f;
		margin-top: 100px;
		margin-left: 210px ;
	}

	#green_point {
		font-family: Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 40%;
		margin-top: 50px;
		margin-left: 200px ;
		text-align: center;	
	}

	#green_point td, #green_point th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#green_point tr:nth-child(even){background-color: #f2f2f2;}

	#green_point tr:hover {background-color: #ddd; }

	#green_point th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: center;
		background-color: #00b38f;
		color: white;
	}
	</style>
</head>

<body>
	<br>
	<a href="home_page.html" class="button" >HOME</a>
	<div class="container">
		<h1>Category-wise points earned per kg</h1>
		<table id=green_point>	
			<tr>
				<th>Waste Category</th>
				<th>Green Points earned per kg</th>
			</tr>
			<?php
			$server = "localhost" ;
			$username = "root";
			$password = "";
			$con = mysqli_connect($server,$username,$password);
			if(!$con)
			{
				die("Connection to Database failed due to".mysqli_connect_error());
			}

			mysqli_select_db($con, "swcs");
			$sql = "SELECT * FROM `green credits`";
			$data= mysqli_query($con,$sql);
			
			while($result=mysqli_fetch_assoc($data))
			{
				echo "
				<tr>
				<td>".$result['Category']."</td>
				<td>".$result['Credit/kg']."</td>
				</tr>
				";
			}
			?>
		</table>
	</div>
</body>
</html>