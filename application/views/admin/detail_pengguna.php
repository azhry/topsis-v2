<div class="page-fixed-main-content">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Detail Pengguna</h2>
                </div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-7">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="width: 200px !important;">
											<b>Username</b>
										</td>
										<td><?= $pengguna->username ?></td>
									</tr>
									<tr>
										<td>
											<b>Role</b>
										</td>
										<td><?= $pengguna->role->role ?></td>
									</tr>
									<tr>
										<td>
											<b>Nama</b>
										</td>
										<td><?= $pengguna->nama ?></td>
									</tr>
									<tr>
										<td>
											<b>Jenis Kelamin</b>
										</td>
										<td><?= $pengguna->jenis_kelamin ?></td>
									</tr>
									<tr>
										<td>
											<b>Email</b>
										</td>
										<td><?= $pengguna->email ?></td>
									</tr>
									<tr>
										<td>
											<b>Alamat</b>
										</td>
										<td><?= $pengguna->alamat ?></td>
									</tr>
									<tr>
										<td>
											<b>Kontak</b>
										</td>
										<td><?= $pengguna->kontak ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>