<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var id_user = $(this).closest('tr').find('td.edt_iduser').html();
			var nama = $(this).closest('tr').find('td.edt_nama').html();
			var email = $(this).closest('tr').find('td.edt_email').html();
			var username = $(this).closest('tr').find('td.edt_username').html();
			var password = $(this).closest('tr').find('td.edt_password').html();
			var hak_akses = $(this).closest('tr').find('td.edt_hakakses').html();
			$('.m_iduser', myModal).val(id_user);
			$('.m_nama', myModal).val(nama);
			$('.m_email', myModal).val(email);
			$('.m_username', myModal).val(username);
			$('.m_password', myModal).val(password);
			$('.m_hakakses', myModal).val(hak_akses);
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
			<h6 style="font-size: 25px;"><b>User Access</b></h6>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add User</button>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTables" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 14px;">
				<tr>
					<th scope="col">No</th>
					<th hidden scope="col">Kode User</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
					<th scope="col">Previllage</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody style="font-size: 14px;">
				<?php $user=$data->select_user()?>
				<?php foreach ($user as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td hidden class="edt_iduser"><?php echo $value['id_user']; ?></td>
						<td class="edt_nama"><?php echo $value['nama']; ?></td>
						<td class="edt_email"><?php echo $value['email']; ?></td>
						<td class="edt_username"><?php echo $value['username']; ?></td>
						<td class="edt_password" ><?php echo  str_repeat("*", strlen($value['password'])); ?></td>
						<td class="edt_hakakses"><?php echo $value['hak_akses']; ?></td>
						<td>
							<?php if($value['hak_akses']=='Admin') {?>
								<button type="button" class="editlink btn btn-warning btn-sm" style="color: white;" title="Edit Data"></style><i class="fa fa-edit"></i></button>
							<?php } else { ?>
								<button type="button" class="editlink btn btn-warning btn-sm" style="color: white;" title="Edit Data"></style><i class="fa fa-edit"></i></button>
								<a data-toggle="confirmation" data-title="Delete Data ?" title="Delete Data" data-popout="true" data-singleton="true" href="index.php?page=deluser&id=<?php echo $value['id_user'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</form>
</div>


<!--TAMBAH USER-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><b>Add User</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div hidden class="form-group">
						<?php $id_user = $data->create_iduser(); ?>
						<label for="id_user"><b>Kode User</b></label>
						<input type="text" name="id_user" value="<?php echo $id_user; ?>" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="nama"><b>Name</b></label>
						<input type="text" name="nama" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="email"><b>Email</b></label>
						<input type="email" name="email" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="username"><b>Username</b></label>
						<input type="text" name="username" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="password"><b>Password</b></label>
						<input type="password" name="password" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="hak_akses"><b>Previllage</b></label>
						<select class="form-control" name="hak_akses">
							<option value="" disabled selected> - Select Previllage - </option>
							<option value="Admin">Admin</option>
							<option value="User">User</option>
						</select>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
					</div>
					<?php 
					if (isset($_POST['simpan'])) {
						$data->addUser($_POST['id_user'],$_POST['nama'],$_POST['email'],$_POST['username'],$_POST['password'],$_POST['hak_akses']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<!--EDIT USER-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><b>Edit User</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div hidden class="form-group">
						<label for="id_user"><b>Kode User</b></label>
						<input type="text" name="id_user" value="" class="form-control m_iduser" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="nama"><b>Name</b></label>
						<input type="text" name="nama" class="form-control m_nama" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="email"><b>Email</b></label>
						<input type="email" name="email" class="form-control m_email" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="username"><b>Username</b></label>
						<input type="text" name="username" class="form-control m_username" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="password"><b>Password</b></label>
						<input type="password" name="password" class="form-control m_password" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="hak_akses"><b>Previllage</b></label>
						<select class="form-control m_hakakses" name="hak_akses">
							<option value="" disabled selected> - Select Previllage - </option>
							<option value="Admin">Admin</option>
							<option value="User">User</option>
						</select>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="update"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
					</div>
					<?php 
					if (isset($_POST['update'])) {
						$data->updateUser($_POST['id_user'],$_POST['nama'],$_POST['email'],$_POST['username'],$_POST['password'],$_POST['hak_akses']);
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