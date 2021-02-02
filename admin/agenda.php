<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var id_agenda = $(this).closest('tr').find('td.edt_idagenda').html();
			var tanggal = $(this).closest('tr').find('td.edt_tanggal').html();
			var waktu = $(this).closest('tr').find('td.edt_waktu').html();
			var tempat = $(this).closest('tr').find('td.edt_tempat').html();
			var keterangan = $(this).closest('tr').find('td.edt_keterangan').html();
			var spj = $(this).closest('tr').find('td.edt_spj').html();
			$('.m_idagenda', myModal).val(id_agenda);
			$('.m_tanggal', myModal).val(tanggal);
			$('.m_waktu', myModal).val(waktu);
			$('.m_tempat', myModal).val(tempat);
			$('.m_keterangan', myModal).val(keterangan);
			$('.m_spj', myModal).val(spj);
			myModal.modal({ show: true });
			return false;
		});
	});
</script>
<style type="text/css">
	td{
		text-align: center;
	}
</style>

<div style="padding: 25px" class="animated fadeIn" id="tampil">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;"><b>Schedule</b></h6>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Schedule</button>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTables" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 14px;">
				<tr>
					<th scope="col" width="10">No</th>
					<th hidden scope="col">Kode</th>
					<th scope="col" width="60">Date</th>
					<th scope="col" width="40">Time</th>
					<th scope="col" width="100">Place</th>
					<th scope="col" width="120">Schedule Details</th>
					<th scope="col" width="20">Report</th>
					<th scope="col" width="50">Action</th>
				</tr>
			</thead>
			<tbody style="font-size: 14px;">
				<?php $agenda=$data->selectAgenda()?>
				<?php foreach ($agenda as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td hidden class="edt_idagenda"><?php echo $value['id_agenda']; ?></td>
						<td class="edt_tanggal"><?php echo date('d-M-Y', strtotime($value['tanggal'])); ?></td>
						<td class="edt_waktu"><?php echo $value['waktu']; ?></td>
						<td class="edt_tempat"><?php echo $value['tempat']; ?></td>
						<td class="edt_keterangan"><?php echo $value['keterangan']; ?></td>
						<td class="edt_spj">
							<?php 
							if($value['spj']=="0") { ?>
								<a href="index.php?page=updatespj&id=<?php echo $value['id_agenda'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>
								<?php } else if($value['spj'] == "1") { ?>
									<a href="" style="margin: 1px" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
									<?php } ?>
								</td>
								<td>
									<button type="button" class="editlink btn btn-warning btn-sm" style="color: white;" title="Edit Data"></style><i class="fa fa-edit"></i></button>
									<a data-toggle="confirmation" data-title="Delete Data ?" title="Delete Data" data-popout="true" data-singleton="true" href="index.php?page=delagenda&id=<?php echo $value['id_agenda'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</form>
		</div>


		<!--TAMBAH AGENDA-->
		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"><b>Add Schedule</b></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div hidden class="form-group">
								<?php $id_agenda = $data->create_idagenda(); ?>
								<label for="id_agenda"><b>Kode</b></label>
								<input type="text" name="id_agenda" value="<?php echo $id_agenda; ?>" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="tanggal"><b>Date</b></label>
								<input type="date" name="tanggal" class="form-control" min="<?php echo date("Y-m-d");?>" required>
							</div>
							<div class="form-group">
								<label for="waktu"><b>Time</b></label>
								<input type="text" name="waktu" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="tempat"><b>Place</b></label>
								<input type="text" name="tempat" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="keterangan"><b>Schedule Details</b></label>
								<textarea class="form-control" name="keterangan" rows="6"></textarea>
							</div>
							<hr>
							<div style="float: right">
								<button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
								<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
							</div>
							<?php 
							if (isset($_POST['simpan'])) {
								$data->addAgenda($_POST['id_agenda'],$_POST['tanggal'],$_POST['waktu'],$_POST['tempat'], $_POST['keterangan']);
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--EDIT AGENDA-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"><b>Edit Schedule</b></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div hidden class="form-group">
								<label for="id_agenda"><b>Kode</b></label>
								<input type="text" name="id_agenda" value="" class="form-control m_idagenda" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="tanggal"><b>Date</b></label>
								<input type="date" name="tanggal" class="form-control m_tanggal" min="<?php echo date("Y-m-d");?>" required>
							</div>
							<div class="form-group">
								<label for="waktu"><b>Time</b></label>
								<input type="text" name="waktu" class="form-control m_waktu" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="tempat"><b>Place</b></label>
								<input type="text" name="tempat" class="form-control m_tempat" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="keterangan"><b>Schedule Details</b></label>
								<textarea class="form-control m_keterangan" name="keterangan" rows="5"></textarea>
							</div>
							<hr>
							<div style="float: right">
								<button class="btn btn-success" name="update"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
								<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
							</div>
							<?php 
							if (isset($_POST['update'])) {
								$data->updateAgenda($_POST['id_agenda'],$_POST['tanggal'],$_POST['waktu'],$_POST['tempat'], $_POST['keterangan']);
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready( function () {
				$('#myTables').DataTable();
			} );
		</script>

		<script type="text/javascript">
			$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',});
			</script>
			<script>
				$(document).ready(function(){
					$('[data-toggle="popover"]').popover({
						placement : 'top',
						trigger : 'hover'
					});
				});
			</script>