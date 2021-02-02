<?php include 'config/class.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Document Archiving Management System</title>
	<link rel="icon" href="assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/cssuser.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.min.css">
	
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/sweetalert2.all.min.js"></script>
</script>
</head>
<style type="text/css">
	h4,h6, h5{
		color: #7A7A7D;
	}
	body{
		font-family: 'Manrope', sans-serif;
		background-color: #0E466C;
	}
</style>
<body>
	<br>
	<div class="login">
		<form method="POST">
			<div class="container" style="width: 400px; height: 410px; background-color: #F2F2F2; padding-right: 30px; padding-left: 30px; padding-top: 23px; margin-top: 85px; margin-bottom: 70px; border-radius: 10px;">
				<div class="login">
					<form class="form-signin" method="POST">
						<div class="text-center mb-4">
							<img src="assets/img/logo.png" style="width: 75px;">
							<h4 style="margin-top: 6px; margin-bottom: -9px;"><b>DOCUMENT ARCHIVING MANAGEMENT SYSTEM</b></h4>
						</div>
						<hr>
						<div class="form-label-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-user"></i></div>
								</div>
								<input type="username" class="form-control" id="username" name="username" placeholder="Username" autofocus="on" autocomplete="off">
							</div>
						</div>			
						<br>
						<div class="form-label-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-lock"></i></div>
								</div>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
							</div>
						</div>	
						<hr>
						<button class="btn btn-block" type="submit" value="LOGIN" name="signin" style="background: #1A2C43; border: 0; color: white;">
							<span class="fa fa-sign-in"></span> Login
						</button>
						<center><p style="font-size: 12px; margin-top: 10px; color: #7A7A7D;">Copyright &COPY; <b>Yandi Bagus Kurniawan</b> | 2020</p></center>
						<?php 
						if (isset($_POST['signin'])) {
							$data->login($_POST['username'],$_POST['password']);
						}
						?>
					</form>
				</div>
			</div>
		</form>
	</div>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
</body>
</html>