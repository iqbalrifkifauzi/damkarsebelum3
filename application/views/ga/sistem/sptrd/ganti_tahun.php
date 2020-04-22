<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Penggantian Tahun</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										<a  class="btn green" href="<?php echo base_url();?>ga/ganti_tahun_excel" >
													Cetak Excel <i class="icon-print"></i>
													</a> 
										
									</div>
									<?php
									foreach ($data_sptrd_total->result_array() as $tampil) {
										$total  = $tampil['total'];
									}

									?>
									
										<div class='alert alert-block alert-error show'>
											<button type='button' class='close' data-dismiss='alert'></button>
										 	<span>Total Nominal Pembayaran Plat Nomor = <?php echo $total;?></span>
										</div>
										
									
									<?php 
									
													if ($this->session->flashdata('message')){
														echo "<div class='alert alert-block alert-error show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>SPTRD Berhasil Dihapus</span>
																</div>";
													}
													else if($this->session->flashdata('berhasil')){
														echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>SPTRD Berhasil Disimpan</span>
																</div>";
													}
													else if($this->session->flashdata('update')){
														echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>SPTRD Berhasil Diganti Plat</span>
																</div>";
													}
												
							?>
								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<thead>
										<tr>
											<th>No</th>
											<th>Imb</th>
											<th>Nominal Retribusi</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Tahun Pendataan</th>
											<th>Berlaku S/d</th>
											<th>Action</th>
											
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										if ($data_sptrd->num_rows()>0) {
											foreach ($data_sptrd->result_array() as $tampil) { ?>
										<tr >
											<td><?php echo $no;?></td>
											<td><?php echo $tampil['Imb'];?></td>
											<td><?php echo $tampil['nominal'];?></td>
											<td><?php echo $tampil['nama_pemilik'];?></td>
											<td><?php echo $tampil['alamat'];?></td>
											<td><?php echo $tampil['tahun_pendataan'];?></td>
											<td><?php echo $tampil['berlaku_sampai'];?></td>

											
											<td>
											<a class="btn green" href="<?php echo base_url();?>ga/ganti_tahun_edit/<?php echo $tampil['id_sptrd'];?>"><i class="icon-edit"></i> Ganti Plat</a>
											

										</td>
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="8">No Result Data</td>
										</tr>
										<?php

										}
										?>
										
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>

				


				


