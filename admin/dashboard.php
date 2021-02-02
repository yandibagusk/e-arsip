<style type="text/css">
	.card {
		transition: all 0.3s;
		color: white;
	}
	/*.card:hover {
		transition: all 0.7s;
		transform: scale(1.09);
		}*/
		.icon{
			opacity: 0.7;
			color: white;
		}
		.icon:hover{
			opacity: 1;
			color: white;
		}
		.text{
			opacity: 0.7;
			color: white;
		}
		.text:hover{
			opacity: 1;
			color: white;
		}
		.count{
			opacity: 0.7;
			font-weight: bold;
		}
		.count:hover{
			opacity: 1;
			font-weight: bold;
		}
		a{
			color: white;
		}
		a:hover{
			color: white;
			text-decoration: none;
		}

	</style>

	<div style="padding: 25px;" class="animated fadeIn">
		<div class="row">
			<div class="col-md-9">
				<h4><b>Dashboard</b></h4>
			</div>
			<div class="col-md-3">
				<h5 style="color: #7A7A7D; text-align: right;">
					<?php
					date_default_timezone_set('Asia/Jakarta');
					$jam=date("H:i:s");
					$a = date ("H");
					if (($a>=4) && ($a<=10)){
						echo "<b>Selamat Pagi</b>";
					} else if(($a>=10) && ($a<=14)) {
						echo "<b>Selamat Siang</b>";
					} else if (($a>14) && ($a<=17)){
						echo "<b>Selamat Sore</b>";
					} else { 
						echo "<b>Selamat Malam</b>";
					}
					?>
				</h5>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-danger">Not Completed <i class="fa fa-exclamation-triangle"></i></div>
					<div class="card-body">
						<?php $notcomplete = $data-> select_report_not_completed() ?>
						<?php foreach ($notcomplete as $key => $value): ?>
							<div class="alert alert-danger" role="alert" style="font-size: 14px;">
								<?php echo $value['keterangan']; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-success">Has Completed <i class="fa fa-check-circle"></i></div>
					<div class="card-body">
						<?php $complete = $data-> select_report_completed() ?>
						<?php foreach ($complete as $key => $value): ?>
							<div class="alert alert-success" role="alert" style="font-size: 14px;">
								<?php echo $value['keterangan']; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-warning">Upcoming Schedule <i class="fa fa-history"></i></div>
					<div class="card-body">
						<?php $upcoming = $data-> select_upcoming_schedule() ?>
						<?php foreach ($upcoming as $key => $value): ?>
							<div class="alert alert-warning" role="alert" style="font-size: 14px;">
								<?php echo $value['keterangan']; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-3">
				<div class="card bg-danger">
					<div class="card-body">
						<center><a class="icon" href="index.php?page=suratmasuk"><i class="fa fa-folder fa-5x"></i></a></center>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-9"><div style="padding: 0px; font-size: 15px;"><b>Incoming Letter</b></div></div>
							<div class="col-md-3">
								<?php
								$surat = $data->jum_suratmasuk();
								foreach ($surat as $key => $value): ?>
									<?php echo $value['jumlah']; ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card bg-warning">
					<div class="card-body">
						<center><a class="icon" href="index.php?page=suratkeluar"><i class="fa fa-folder-open fa-5x"></i></a></center>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-9"><div style="padding: 0px; font-size: 15px;"><b>Outgoing Letter</b></div></div>
							<div class="col-md-3">
								<?php
								$surat = $data->jum_suratkeluar();
								foreach ($surat as $key => $value):
									?>
									<?php echo $value['jumlah']; ?>
									<?php
								endforeach;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card bg-success">
					<div class="card-body">
						<center><a class="icon" href="index.php?page=agenda"><i class="fa fa-calendar fa-5x"></i></a></center>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-9"><div style="padding: 0px; font-size: 15px;"><b>Schedule</b></div></div>
							<div class="col-md-3">
								<?php
								$agenda = $data->jum_agenda();
								foreach ($agenda as $key => $value): ?>
									<?php echo $value['jumlah']; ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card bg-primary">
					<div class="card-body">
						<center><a class="icon" href="index.php?page=useraccess"><i class="fa fa-user fa-5x"></i></a></center>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-9"><div style="padding: 0px; font-size: 15px;"><b>User Access</b></div></div>
							<div class="col-md-3">
								<?php
								$user = $data->jum_user();
								foreach ($user as $key => $value): ?>
									<?php echo $value['jumlah']; ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>