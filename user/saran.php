	<div class="container animated fadeIn">
		<div class="row">
			<div class="col-md-9">
				<div class="container" style="background-color: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 30px;">
					<h4 style="color: #6E6E6E;"><b>Kritik & Saran</b></h4>
					<hr>
					<form method="POST">
						<div hidden class="form-group">
							<?php $id_saran = $data->create_idsaran(); ?>
							<label for="id_saran"><b>Kode Saran</b></label>
							<input type="text" name="id_saran" value="<?php echo $id_saran; ?>" class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="nama"><b>Nama</b></label>
							<input type="text" name="nama" class="form-control" autocomplete="off" required="yes">
						</div>
						<div class="form-group">
							<label for="email"><b>Alamat Email</b></label>
							<input type="email" name="email" class="form-control" autocomplete="off" required="yes">
						</div>
						<div class="form-group">
							<label for="saran"><b>Kritik & Saran</b></label>
							<textarea class="form-control" name="saran" rows="10" autocomplete="off" required="yes"></textarea>
						</div>
						<button class="btn btn-success" name="simpan" style="background: #006400; border: 0;"><i class="fa fa-send"></i>&nbsp;&nbsp;Kirim</button>
						<?php 
						if (isset($_POST['simpan'])) {
							$data->add_saran_user($_POST['id_saran'],$_POST['nama'],$_POST['email'],$_POST['saran']);
						}
						?>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="container" style="background: white; margin-bottom: 30px; padding-top: 30px; padding-right: 30px; padding-left: 30px; padding-bottom: 30px;">
					<h5><strong>Recent Updates</strong></h5>
					<hr>
					<?php $user=$data->select_berita_terkini()?>
					<?php foreach ($user as $key => $value): ?>
						<b><a href="index.php?page=detail&id=<?php echo $value['id_posting'];?>" style="font-size: 15px; margin-bottom: -1px;"><?php echo $value['judul']; ?></a></b>
						<p style="font-size: 10px; margin-bottom: -6px; color: #A4A4A4;">
							<i class="fa fa-clock-o"></i> Published on <?php echo date("d M Y (h:i)", strtotime($value['submitted_on'])); ?></p><hr>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
