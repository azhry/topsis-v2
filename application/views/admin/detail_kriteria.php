<div class="page-fixed-main-content">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Detail Kriteria</h2>
                </div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-7">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="width: 200px !important;">
											<b>Kriteria</b>
										</td>
										<td><?= $kriteria->kriteria ?></td>
									</tr>
									<tr>
										<td>
											<b>Key</b>
										</td>
										<td><?= $kriteria->key ?></td>
									</tr>
									<tr>
										<td>
											<b>Inisial</b>
										</td>
										<td><?= $kriteria->inisial ?></td>
									</tr>
									<tr>
										<td>
											<b>Type</b>
										</td>
										<td><?= $kriteria->type ?></td>
									</tr>
									<tr>
										<td>
											<b>Bobot</b>
										</td>
										<td><?= $kriteria->bobot ?></td>
									</tr>
									<tr>
										<td>
											<b>Exp</b>
										</td>
										<td><?= $kriteria->exp ?></td>
									</tr>
									<tr>
										<td>
											<b>Detail Nilai</b>
										</td>
										<td>
											<ul>
												<?php  
												$details = json_decode($kriteria->details);
												if ($kriteria->type == 'range'):
													foreach ($details as $detail):
												?>
													<li>
														<?= $detail->label . ' | ' . $detail->min . ' s.d. ' . $detail->max . ' | value: ' . $detail->value ?>
													</li>
													<?php endforeach; ?>
												<?php  
												elseif ($kriteria->type == 'option'):
													foreach ($details as $detail):
												?>
													<li>
														<?= $detail->label . ' | value: ' . $detail->value ?>
													</li>
													<?php endforeach; ?>
												<?php endif; ?>
											</ul>
										</td>
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