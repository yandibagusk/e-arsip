<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var id_surat = $(this).closest('tr').find('td.edt_idsurat').html();
			var nomor = $(this).closest('tr').find('td.edt_nomor').html();
			var jenis = $(this).closest('tr').find('td.edt_jenis').html();
			var tanggal = $(this).closest('tr').find('td.edt_tanggal').html();
			var perihal = $(this).closest('tr').find('td.edt_perihal').html();
			$('.m_idsurat', myModal).val(id_surat);
			$('.m_nomor', myModal).val(nomor);
			$('.m_jenis', myModal).val(jenis);
			$('.m_tanggal', myModal).val(tanggal);
			$('.m_perihal', myModal).val(perihal);
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
			<h6 style="font-size: 25px;"><b>Outgoing Letter</b></h6>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Letter</button>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTables" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 14px;">
				<tr>
					<th scope="col" width="10">No</th>
					<th hidden scope="col">ID Surat</th>
					<th scope="col" width="130">Reference</th>
					<th scope="col" width="100">Type</th>
					<th scope="col" width="80">Date</th>
					<th scope="col" width="210">Details</th>
					<th scope="col" width="50">Action</th>
				</tr>
			</thead>
			<tbody style="font-size: 14px;">
				<?php $surat=$data->selectSuratKeluar()?>
				<?php foreach ($surat as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td hidden class="edt_idsurat"><?php echo $value['id_surat']; ?></td>
						<td class="edt_nomor"><?php echo $value['nomor']; ?></td>
						<td class="edt_jenis"><?php echo $value['jenis']; ?></td>
						<td class="edt_tanggal"><?php echo date('d-M-Y', strtotime($value['tanggal'])); ?></td>
						<td class="edt_perihal"><?php echo $value['perihal']; ?></td>
						<td>
							<button type="button" class="editlink btn btn-warning btn-sm" style="color: white;" title="Edit Data"></style><i class="fa fa-edit"></i></button>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?page=delsuratkeluar&id=<?php echo $value['id_surat'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</form>
</div>


<!--TAMBAH SURAT KELUAR-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><b>Add Outgoing Letter</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div hidden class="form-group">
						<?php $id_surat = $data->create_idsuratkeluar(); ?>
						<label for="id_surat"><b>Kode Surat</b></label>
						<input type="text" name="id_surat" value="<?php echo $id_surat; ?>" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="nomor"><b>Reference Number</b></label>
						<input type="text" name="nomor" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="jenis"><b>Type</b></label>
						<select class="form-control" name="jenis">
							<option value="" disabled selected> - Select Type - </option>
							<option value="Memo">Memo</option>
							<option value="Undangan">Undangan</option>
							<option value="Pemberitahuan">Pemberitahuan</option>
							<option value="Surat Pengantar">Surat Pengantar</option>
							<option value="Surat Perintah">Surat Perintah</option>
							<option value="Surat Tugas">Surat Tugas</option>
							<option value="Surat Instruksi">Surat Instruksi</option>
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal"><b>Date</b></label>
						<input type="date" name="tanggal" class="form-control" min="<?php echo date("Y-m-d");?>" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="perihal"><b>Details</b></label>
						<textarea class="form-control" name="perihal" rows="3"></textarea>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
					</div>
					<?php 
					if (isset($_POST['simpan'])) {
						$data->addSuratKeluar($_POST['id_surat'],$_POST['nomor'], $_POST['jenis'], $_POST['tanggal'], $_POST['perihal']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<!--EDIT SURAT KELUAR-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><b>Edit Outgoing Letter</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div hidden class="form-group">
						<label for="id_surat"><b>Kode Surat</b></label>
						<input type="text" name="id_surat" value="" class="form-control m_idsurat" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="nomor"><b>Reference Number</b></label>
						<input type="text" name="nomor" class="form-control m_nomor" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="jenis"><b>Type</b></label>
						<select class="form-control m_jenis" name="jenis">
							<option value="" disabled selected> - Pilih Jenis Surat - </option>
							<option value="Memo">Memo</option>
							<option value="Undangan">Undangan</option>
							<option value="Pemberitahuan">Pemberitahuan</option>
							<option value="Surat Pengantar">Surat Pengantar</option>
							<option value="Surat Perintah">Surat Perintah</option>
							<option value="Surat Tugas">Surat Tugas</option>
							<option value="Surat Instruksi">Surat Instruksi</option>
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal"><b>Date</b></label>
						<input type="date" name="tanggal" class="form-control m_tanggal"  min="<?php echo date("Y-m-d");?>" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="perihal"><b>Details</b></label>
						<textarea class="form-control m_perihal" name="perihal" rows="3"></textarea>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="update"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
					</div>
					<?php 
					if (isset($_POST['update'])) {
						$data->updateSuratKeluar($_POST['id_surat'],$_POST['nomor'], $_POST['jenis'], $_POST['tanggal'], $_POST['perihal']);
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