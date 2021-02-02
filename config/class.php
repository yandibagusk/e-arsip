<?php
session_start();
error_reporting(0);
$con = new mysqli("localhost","root","","earsip");

class user {
	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

	function login($usr,$pass){
		$u=$this->koneksi->real_escape_string($usr);
		$p=$this->koneksi->real_escape_string($pass);

		$select=$this->koneksi->query("SELECT * FROM user WHERE username='$u' AND password='$p' limit 1");
		$cek=$select->num_rows;
		$row=$select->fetch_assoc();
		$_SESSION['id'] = $row['username'];
		$_SESSION['hak_akses'] = $row['hak_akses'];
		$_SESSION['cek'] = "login";
		if ($cek>0) {
			if($row['hak_akses']=='Admin'){
				echo "<script>setTimeout(function () {
					swal({
						title: 'Login Successfully',
						type: 'success',
						showConfirmButton: false,
						timer: 1200,
						});
						},10);
						</script>";
						echo "<script>
						setTimeout(function () {
							window.location.href= 'admin/index.php';
							},1230);
							</script>";
						} else if($row['hak_akses']=='User') {
							echo "<script>setTimeout(function () {
								swal({
									title: 'Login Berhasil',
									type: 'success',
									showConfirmButton: false,
									timer: 1200,
									});
									},10);
									</script>";
									echo "<script>
									setTimeout(function () {
										window.location.href= 'user/index.php';
										},1230);
										</script>";
									}
								} else {
									echo "<script>setTimeout(function () {
										swal({
											title: 'Login Failed',
											type: 'error',
											showConfirmButton: false,
											timer: 1200,
											});
											},10);
											</script>";
											echo "<script>
											setTimeout(function () {
												window.location.href= 'index.php';
												},1230);
												</script>";
											}
										}


										/*PENOMORAN OTOMATIS*/
										function create_iduser(){
											$cariid = $this->koneksi->query("SELECT MAX(id_user) FROM user") or die (mysql_error());
											$dataid = mysqli_fetch_array($cariid);
											if($dataid) {
												$nilaiid = substr($dataid[0], 2);
												$id = (int) $nilaiid;
												$id = $id + 1;
												$id_otomatis = "U".str_pad($id, 3, "0", STR_PAD_LEFT);
												return $id_otomatis;
											} else {
												$id_otomatis = "";
											}
										}
										
										function create_idsuratkeluar(){
											$cariid = $this->koneksi->query("SELECT MAX(id_surat) FROM suratkeluar") or die (mysql_error());
											$dataid = mysqli_fetch_array($cariid);
											if($dataid) {
												$nilaiid = substr($dataid[0], 2);
												$id = (int) $nilaiid;
												$id = $id + 1;
												$id_otomatis = "SK".str_pad($id, 3, "0", STR_PAD_LEFT);
												return $id_otomatis;
											} else {
												$id_otomatis = "";
											}
										}
										
										function create_idsuratmasuk(){
											$cariid = $this->koneksi->query("SELECT MAX(id_surat) FROM suratmasuk") or die (mysql_error());
											$dataid = mysqli_fetch_array($cariid);
											if($dataid) {
												$nilaiid = substr($dataid[0], 2);
												$id = (int) $nilaiid;
												$id = $id + 1;
												$id_otomatis = "SM".str_pad($id, 3, "0", STR_PAD_LEFT);
												return $id_otomatis;
											} else {
												$id_otomatis = "";
											}
										}
										
										function create_idagenda(){
											$cariid = $this->koneksi->query("SELECT MAX(id_agenda) FROM agenda") or die (mysql_error());
											$dataid = mysqli_fetch_array($cariid);
											if($dataid) {
												$nilaiid = substr($dataid[0], 2);
												$id = (int) $nilaiid;
												$id = $id + 1;
												$id_otomatis = "AG".str_pad($id, 3, "0", STR_PAD_LEFT);
												return $id_otomatis;
											} else {
												$id_otomatis = "";
											}
										}


										/*USER ACCESS*/
										function jum_user(){
											$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM user");
											while ($fetch = $select->fetch_assoc()) {
												$data[] = $fetch;
											}
											return $data;
										}

										function addUser($id_user, $nama, $email, $username, $password, $hak_akses){
											$cek = $this->koneksi->query("SELECT * FROM user WHERE nama='$nama' OR email='$email'");
											if($cek->num_rows>0){
												echo "<script>setTimeout(function () { 
													swal({
														title: 'Data Already Exists',
														type: 'error',
														showConfirmButton: false,
														timer: 1800,
														});  
														},10);
														window.setTimeout(function(){ 
															window.location.replace('index.php?page=useraccess');
														} ,1800); </script>";
													} else {
														$this->koneksi->query("INSERT INTO user (id_user, nama, email,  username, password, hak_akses) VALUES('$id_user','$nama','$email','$username','$password','$hak_akses')");
														echo "<script>setTimeout(function () {
															swal({
																title: 'Saved Successfully',
																type: 'success',
																showConfirmButton: false,
																timer: 1800,
																});  
																},10);
																window.setTimeout(function(){ 
																	window.location.replace('index.php?page=useraccess');
																} ,1800); </script>";
															}
														}

														function select_user() {
															$select = $this->koneksi->query("SELECT * FROM user");
															while ($fetch = $select->fetch_assoc()) {
																$data[] = $fetch;
															}
															return $data;
														}

														function updateUser($id_user, $nama, $email, $username, $password, $hak_akses){
															$this->koneksi->query("UPDATE user SET nama='$nama', email='$email', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user='$id_user'") or die(mysqli_error($this->koneksi));
															echo "<script>setTimeout(function () { 
																swal({
																	title: 'Updated Successfully',
																	type: 'success',
																	showConfirmButton: false,
																	timer: 1800,
																	});  
																	},10); 
																	window.setTimeout(function(){
																		window.location.replace('index.php?page=useraccess');
																	} ,1800); </script>";
																}

																function delUser($id_user){
																	$this->koneksi->query("DELETE FROM user WHERE id_user='$id_user'");
																	echo "<script>setTimeout(function () {
																		swal({
																			title: 'Deleted Successfully',
																			type: 'success',
																			showConfirmButton: false,
																			timer: 1800,
																			});  
																			},10); 
																			window.setTimeout(function(){ 
																				window.location.replace('index.php?page=useraccess');
																			} ,1800); </script>";
																		}
																		
																		
																		/*SURAT KELUAR*/
																		function jum_suratkeluar(){
																			$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM suratkeluar");
																			while ($fetch = $select->fetch_assoc()) {
																				$data[] = $fetch;
																			}
																			return $data;
																		}

																		function addSuratKeluar($id_surat, $nomor, $jenis, $tanggal, $perihal){
																			$cek = $this->koneksi->query("SELECT * FROM suratkeluar WHERE nomor='$nomor'");
																			if($cek->num_rows>0){
																				echo "<script>setTimeout(function () { 
																					swal({
																						title: 'Data Already Exists',
																						type: 'error',
																						showConfirmButton: false,
																						timer: 1800,
																						});  
																						},10);
																						window.setTimeout(function(){ 
																							window.location.replace('index.php?page=suratkeluar');
																						} ,1800); </script>";
																					} else {
																						$this->koneksi->query("INSERT INTO suratkeluar(id_surat, nomor, jenis, tanggal, perihal) VALUES('$id_surat','$nomor','$jenis','$tanggal','$perihal')");
																						echo "<script>setTimeout(function () {
																							swal({
																								title: 'Saved Successfully',
																								type: 'success',
																								showConfirmButton: false,
																								timer: 1800,
																								});  
																								},10);
																								window.setTimeout(function(){ 
																									window.location.replace('index.php?page=suratkeluar');
																								} ,1800); </script>";
																							}
																						}

																						function selectSuratKeluar() {
																							$select = $this->koneksi->query("SELECT * FROM suratkeluar");
																							while ($fetch = $select->fetch_assoc()) {
																								$data[] = $fetch;
																							}
																							return $data;
																						}

																						function updateSuratKeluar($id_surat, $nomor, $jenis, $tanggal, $perihal){
																							$this->koneksi->query("UPDATE suratkeluar SET nomor='$nomor', jenis='$jenis', tanggal='$tanggal', perihal='$perihal' WHERE id_surat='$id_surat'") or die(mysqli_error($this->koneksi));
																							echo "<script>setTimeout(function () { 
																								swal({
																									title: 'Updated Successfully',
																									type: 'success',
																									showConfirmButton: false,
																									timer: 1800,
																									});  
																									},10); 
																									window.setTimeout(function(){
																										window.location.replace('index.php?page=suratkeluar');
																									} ,1800); </script>";
																								}

																								function delSuratKeluar($id_surat){
																									$this->koneksi->query("DELETE FROM suratkeluar WHERE id_surat='$id_surat'");
																									echo "<script>setTimeout(function () {
																										swal({
																											title: 'Berhasil Dihapus',
																											type: 'success',
																											showConfirmButton: false,
																											timer: 1800,
																											});  
																											},10); 
																											window.setTimeout(function(){ 
																												window.location.replace('index.php?page=suratkeluar');
																											} ,1800); </script>";
																										}
																										
																										
																										
																										/*SURAT KELUAR*/
																										function jum_suratmasuk(){
																											$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM suratmasuk");
																											while ($fetch = $select->fetch_assoc()) {
																												$data[] = $fetch;
																											}
																											return $data;
																										}

																										function addSuratMasuk($id_surat, $nomor, $jenis, $asal, $perihal){
																											$cek = $this->koneksi->query("SELECT * FROM suratmasuk WHERE nomor='$nomor'");
																											if($cek->num_rows>0){
																												echo "<script>setTimeout(function () { 
																													swal({
																														title: 'Data Already Exists',
																														type: 'error',
																														showConfirmButton: false,
																														timer: 1800,
																														});  
																														},10);
																														window.setTimeout(function(){ 
																															window.location.replace('index.php?page=suratmasuk');
																														} ,1800); </script>";
																													} else {
																														$this->koneksi->query("INSERT INTO suratmasuk(id_surat, nomor, jenis, asal, perihal) VALUES('$id_surat','$nomor','$jenis','$asal','$perihal')");
																														echo "<script>setTimeout(function () {
																															swal({
																																title: 'Saved Successfully',
																																type: 'success',
																																showConfirmButton: false,
																																timer: 1800,
																																});  
																																},10);
																																window.setTimeout(function(){ 
																																	window.location.replace('index.php?page=suratmasuk');
																																} ,1800); </script>";
																															}
																														}

																														function selectSuratMasuk() {
																															$select = $this->koneksi->query("SELECT * FROM suratmasuk");
																															while ($fetch = $select->fetch_assoc()) {
																																$data[] = $fetch;
																															}
																															return $data;
																														}

																														function updateSuratMasuk($id_surat, $nomor, $jenis, $asal, $perihal){
																															$this->koneksi->query("UPDATE suratmasuk SET nomor='$nomor', jenis='$jenis', asal='$asal', perihal='$perihal' WHERE id_surat='$id_surat'") or die(mysqli_error($this->koneksi));
																															echo "<script>setTimeout(function () { 
																																swal({
																																	title: 'Updated Successfully',
																																	type: 'success',
																																	showConfirmButton: false,
																																	timer: 1800,
																																	});  
																																	},10); 
																																	window.setTimeout(function(){
																																		window.location.replace('index.php?page=suratmasuk');
																																	} ,1800); </script>";
																																}

																																function delSuratMasuk($id_surat){
																																	$this->koneksi->query("DELETE FROM suratmasuk WHERE id_surat='$id_surat'");
																																	echo "<script>setTimeout(function () {
																																		swal({
																																			title: 'Deteled Successfully',
																																			type: 'success',
																																			showConfirmButton: false,
																																			timer: 1800,
																																			});  
																																			},10); 
																																			window.setTimeout(function(){ 
																																				window.location.replace('index.php?page=suratmasuk');
																																			} ,1800); </script>";
																																		}
																																		
																																		
																																		/*AGENDA*/
																																		function jum_agenda(){
																																			$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM agenda");
																																			while ($fetch = $select->fetch_assoc()) {
																																				$data[] = $fetch;
																																			}
																																			return $data;
																																		}

																																		function addAgenda($id_agenda, $tanggal, $waktu, $tempat, $keterangan){
																																			$cek = $this->koneksi->query("SELECT * FROM agenda WHERE id_agenda='$id_agenda'");
																																			if($cek->num_rows>0){
																																				echo "<script>setTimeout(function () { 
																																					swal({
																																						title: 'Data Already Exists',
																																						type: 'error',
																																						showConfirmButton: false,
																																						timer: 1800,
																																						});  
																																						},10);
																																						window.setTimeout(function(){ 
																																							window.location.replace('index.php?page=agenda');
																																						} ,1800); </script>";
																																					} else {
																																						$this->koneksi->query("INSERT INTO agenda(id_agenda, tanggal, waktu, tempat, keterangan) VALUES('$id_agenda','$tanggal','$waktu','$tempat','$keterangan')");
																																						echo "<script>setTimeout(function () {
																																							swal({
																																								title: 'Saved Successfully',
																																								type: 'success',
																																								showConfirmButton: false,
																																								timer: 1800,
																																								});  
																																								},10);
																																								window.setTimeout(function(){ 
																																									window.location.replace('index.php?page=agenda');
																																								} ,1800); </script>";
																																							}
																																						}

																																						function selectAgenda() {
																																							$select = $this->koneksi->query("SELECT * FROM agenda");
																																							while ($fetch = $select->fetch_assoc()) {
																																								$data[] = $fetch;
																																							}
																																							return $data;
																																						}

																																						function updateAgenda($id_agenda, $tanggal, $waktu, $tempat, $keterangan){
																																							$this->koneksi->query("UPDATE agenda SET tanggal='$tanggal', waktu='$waktu', tempat='$tempat', keterangan='$keterangan' WHERE id_agenda='$id_agenda'") or die(mysqli_error($this->koneksi));
																																							echo "<script>setTimeout(function () { 
																																								swal({
																																									title: 'Updated Successfully',
																																									type: 'success',
																																									showConfirmButton: false,
																																									timer: 1800,
																																									});  
																																									},10); 
																																									window.setTimeout(function(){
																																										window.location.replace('index.php?page=agenda');
																																									} ,1800); </script>";
																																								}

																																								function delAgenda($id_agenda){
																																									$this->koneksi->query("DELETE FROM agenda WHERE id_agenda='$id_agenda'");
																																									echo "<script>setTimeout(function () {
																																										swal({
																																											title: 'Deteled Successfully',
																																											type: 'success',
																																											showConfirmButton: false,
																																											timer: 1800,
																																											});  
																																											},10); 
																																											window.setTimeout(function(){ 
																																												window.location.replace('index.php?page=agenda');
																																											} ,1800); </script>";
																																										}
																																										
																																										function updateSpj($id_agenda){
																																											$this->koneksi->query("UPDATE agenda SET spj=1 WHERE id_agenda='$id_agenda'");
																																											echo "<script>setTimeout(function () {
																																												swal({
																																													title: 'Report Has Completed',
																																													type: 'success',
																																													showConfirmButton: false,
																																													timer: 1800,
																																													});  
																																													},10); 
																																													window.setTimeout(function(){ 
																																														window.location.replace('index.php?page=agenda');
																																													} ,1800); </script>";
																																												}
																																												
																																												function select_report_not_completed() {
																																													$select = $this->koneksi->query("SELECT * FROM agenda WHERE spj=0 AND tanggal<=CURDATE();");
																																													while ($fetch = $select->fetch_assoc()) {
																																														$data[] = $fetch;
																																													}
																																													return $data;
																																												}
																																												
																																												function select_report_completed() {
																																													$select = $this->koneksi->query("SELECT * FROM agenda WHERE spj=1 LIMIT 4");
																																													while ($fetch = $select->fetch_assoc()) {
																																														$data[] = $fetch;
																																													}
																																													return $data;
																																												}
																																												
																																												function select_upcoming_schedule() {
																																													$select = $this->koneksi->query("SELECT * FROM agenda WHERE tanggal > CURDATE();");
																																													while ($fetch = $select->fetch_assoc()) {
																																														$data[] = $fetch;
																																													}
																																													return $data;
																																												}


																																											}
																																											$data = new user($con);
																																											?>