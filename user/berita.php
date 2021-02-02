	<div class="container animated fadeIn">
		<div class="row">
			<div class="col-md-9">
				<div class="container" style="background-color: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 30px;">
					<h4 style="color: #6E6E6E;"><b>Berita</b></h4>
					<hr>
					<?php $berita=$data->select_berita_all()?>
					<?php foreach ($berita as $key => $value): ?>
						<div class="row">
							<div class="col-md-2">
								<?php echo "<img class='img-fluid' src='assets/img/$value[foto]' width='120' />";?>
							</div>
							<div class="col-md-10">
								<b><p style="font-size: 18px; margin-bottom: -1px; color: #006400;"><?php echo $value['judul']; ?></p></b>
								<p style="text-align: justify; margin-top: -15px;"><?php echo substr($value['isi'], 0, 210); ?><b><a href="index.php?page=detail&id=<?php echo $value['id_posting'];?>">&nbsp;&nbsp;[Read More]</a></b></p>
								<p style="font-size: 10px; margin-bottom: -6px; margin-top: -12px; color: #A4A4A4;">
									<i class="fa fa-clock-o"></i> Published on <?php echo date("d M Y (h:i)", strtotime($value['submitted_on'])); ?></p>
								</div>
							</div><hr>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="container" style="background: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 30px;">
						<h5><strong>Recent Updates</strong></h5>
						<hr>
						<?php $user=$data->select_postingan_terkini()?>
						<?php foreach ($user as $key => $value): ?>
							<?php if($value['kategori'] == 'Berita') { ?>
								<b><a href="index.php?page=detail&id=<?php echo $value['id_posting'];?>" style="font-size: 15px; margin-bottom: -1px;"><?php echo $value['judul']; ?></a></b>
								<p style="font-size: 10px; margin-bottom: -2px; color: #A4A4A4;">
									<i class="fa fa-clock-o"></i> Published on <?php echo date("d M Y (h:i)", strtotime($value['submitted_on'])); ?></p>
									<p style="font-size: 10px; margin-bottom: -6px; color: #A4A4A4;">Category <?php echo $value['kategori']?></p><hr>
								<?php } else if($value['kategori']=='Artikel') { ?>
									<b><a href="index.php?page=detailartikel&id=<?php echo $value['id_posting'];?>" style="font-size: 15px; margin-bottom: -1px;"><?php echo $value['judul']; ?></a></b>
									<p style="font-size: 10px; margin-bottom: -2px; color: #A4A4A4;">
										<i class="fa fa-clock-o"></i> Published on <?php echo date("d M Y (h:i)", strtotime($value['submitted_on'])); ?></p>
										<p style="font-size: 10px; margin-bottom: -6px; color: #A4A4A4;">Category <?php echo $value['kategori']?></p><hr>
									<?php } endforeach ?>
								</div>
							</div>
				</div>
			</div>
