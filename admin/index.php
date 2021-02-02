<?php
include '../config/class.php';
session_start();
if($_SESSION['cek']!="login"){
	header("location:../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Document Archiving Management System</title>
	<link rel="icon" href="../assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap">
	<link rel="stylesheet" type="text/css" href="../assets/css/shadow.css">
	<link rel="stylesheet" type="text/css" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/bootstrap-confirmation.min.js"></script>
	<script src="../assets/js/sweetalert2.all.min.js"></script>
	<script src="../assets/js/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
</script>
</head>
<style type="text/css">
	h2,h3,h4,h6{
		color: #7A7A7D;
	}
	body{
		font-family: 'Manrope', sans-serif;
	}
</style>
<body style="background-color: #F7F7F8">
	<div class="wrapper print">
		<!-- Sidebar  -->
		<nav id="sidebar" class="print">
			<div class="sidebar-header">
				<div class="row" style="margin-bottom: -11px;">
					<div class="col-md-3">
						<img src="../assets/img/logo.png" width="40" style="margin-left: 15px; margin-top: 5px;margin-bottom: 5px;">
					</div>
					<div class="col-md-8">
						<p style="color: white; font-size: 14px;padding-top: 2px;"><b>Document Archiving Management System</b></p>
						</p>
					</div>
				</div>
			</div>

			<ul class="list-unstyled components">
				<p></p>
				<li>
					<a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
				</li>
				<li>
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-archive"></i>&nbsp;&nbsp;Archive</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="index.php?page=suratmasuk"><i class="fa fa-folder"></i>&nbsp;&nbsp;Incoming Letter</a>
						</li>
						<li>
							<a href="index.php?page=suratkeluar"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Outgoing Letter</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="index.php?page=agenda"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Schedule</a>
				</li>
				<li>
					<a href="index.php?page=useraccess"><i class="fa fa-user"></i>&nbsp;&nbsp;User Access</a>
				</li>
				<li>
					<a href="../logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="wrapper">
		<div id="content">
			<div style="margin: 30px;background-color: white;bor;" class="box">
				<?php
				if(!isset($_GET['page'])) {
					include 'dashboard.php';
				} else {
					if($_GET['page']=="useraccess") {
						include 'user-access.php';
					} else if($_GET['page']=="dashboard") {
						include 'dashboard.php';
					} else if($_GET['page']=="useraccess") {
						include 'user-access.php';
					} else if($_GET['page']=="deluser") {
						include 'delUser.php';
					} else if($_GET['page']=="suratkeluar") {
						include 'surat-keluar.php';
					} else if($_GET['page']=="delsuratkeluar") {
						include 'delSuratKeluar.php';
					} else if($_GET['page']=="suratmasuk") {
						include 'surat-masuk.php';
					} else if($_GET['page']=="delsuratmasuk") {
						include 'delSuratMasuk.php';
					} else if($_GET['page']=="agenda") {
						include 'agenda.php';
					} else if($_GET['page']=="updatespj") {
						include 'updateSpj.php';
					} else if($_GET['page']=="delagenda") {
						include 'delAgenda.php';
					}
				} 
				?>
			</div>
		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
</body>
</html>