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

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']==="POST"){

		$userinfo = R::dispense('list');
		$userinfo->name 	= $_POST['complete_name'];
		$userinfo->country  = $_POST['origin_country'];
		$id = R::store($userinfo);

		if(is_int($id)){

			$message = "<div class='alert alert-success'>Successfully Added</div>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<title> Add Record</title>
</head>
	<body>

	<div class="container" style="margin-top: 70px;">
		<div class="row">
			<div class="col-md-4">
			<?php echo isset($message) ? $message : ''; ?>
				<form action="" method="POST">
					<div class="form-group">
						<label>Name</label>
						<input required="" type="text" name="complete_name" class="form-control" />
					</div>

					<div class="form-group">
						<label>Country</label>
						<input required="" type="text" name="origin_country" class="form-control" />
					</div>

					<div class="form-group">
						<button class="btn btn-info" name="submit"> Submit</button>
						<a href="index.php" class="btn btn-info"> Back </a>
					</div>

				</form>
			</div>
		</div>
	</div>

	</body>
</html>


