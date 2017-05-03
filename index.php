<?php

/*
* PHP CRUD w/ SQLite
* copyright Vhexzhen Lei
*
*/

define('ROOT_DIR', 	realpath(dirname(__FILE__)) .'/');
require_once 'config/config.php';
require_once 'redbean_orm/rb.php';

//connect to our sqlite database using RedBean PHP ORM
R::setup($connection_string);	

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<title>PHP CRUD w/ SQLite</title>
</head>
<body>
		<div class="container" style="margin: 70px;">
		<a class="btn btn-info" href="add.php" style="margin-bottom: 10px;"> Add New</a>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-condensed table-stripped table-hover">
						<tr>
							<th> ID </th>
							<th> Name </th>
							<th> Country </th>
							<th> Options </th>
						</tr>
						<tbody>
							<?php
							foreach(R::findAll('list') as $name){

								echo "<tr>";
								echo "<td>".$name['id']."</td>";
								echo "<td>".$name['name']."</td>";
								echo "<td>".$name['country']."</td>";
								echo "<td><a class='btn btn-danger' href='delete.php?id=".$name['id']."'><i class='glyphicon glyphicon-trash'></i> </a>
								<a class='btn btn-info' href='edit.php?id=".$name['id']."'><i class='glyphicon glyphicon-pencil'></i> </a>
								</td>";
								echo "</tr>";
							}	
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
