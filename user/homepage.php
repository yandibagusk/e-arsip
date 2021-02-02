<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: -55px;">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="assets/img/home1.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="assets/img/home2.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="assets/img/home3.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="assets/img/home4.jpg" class="d-block w-100" alt="...">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<br>
<div class="container">
	<br>
	<center><h2><b>BERITA TERKINI</b></h2></center><br>
	<div class="row">
		<?php $berita=$data->select_berita_terkini()?>
		<?php foreach ($berita as $key => $value): ?>
			<div class="col-md-4">
				<div class="container" style="background: white; padding: 20px;">
					<center><?php echo "<img class='img-fluid' src='assets/img/$value[foto]' width='300' />";?>
					<b><a href="index.php?page=detail&id=<?php echo $value['id_posting'];?>" id="baca" style="font-size: 20px;"><?php echo $value['judul']; ?></a></b>
					<p style="text-align: justify; margin-top: -15px;"><?php echo substr($value['isi'], 0, 120); ?><b><a href="index.php?page=detail&id=<?php echo $value['id_posting'];?>">&nbsp;&nbsp;[Read More]</a></b></p>
				</center>
				<p style="font-size: 12px; margin-bottom: -6px; margin-left: 8px; color: #A4A4A4;">
					<i class="fa fa-clock-o"></i> Published on <?php echo date("d M Y (h:i)", strtotime($value['submitted_on'])); ?></p>
				</div><br>
			</div>
		<?php endforeach ?>
	</div><br><br>
	<center><h2><b>DAKWAH CORNER</b></h2></center><br>
	<div class="col-md-12">
		<div class="container" style="background-color: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 30px;">
			<?php $artikel=$data->select_artikel_terkini()?>
			<?php foreach ($artikel as $key => $value): ?>
				<div class="row">
					<div class="col-md-2">
						<?php echo "<img class='img-fluid' src='assets/img/$value[foto]' width='150' />";?>
					</div>
					<div class="col-md-10">
						<b><p style="font-size: 18px; margin-bottom: -1px; color: #006400;"><?php echo $value['judul']; ?></p></b>
						<p style="text-align: justify; margin-top: -15px;"><?php echo substr($value['isi'], 0, 210); ?><b><a href="index.php?page=detailartikel&id=<?php echo $value['id_posting'];?>">&nbsp;&nbsp;[Read More]</a></b></p>
						<p style="font-size: 10px; margin-bottom: -6px; margin-top: -12px; color: #A4A4A4;">
							<i class="fa fa-clock-o"></i> Published on <?php echo date("d M Y (h:i)", strtotime($value['submitted_on'])); ?></p>
						</div>
					</div><hr>
				<?php endforeach ?>
			</div>
		</div>
	</div>