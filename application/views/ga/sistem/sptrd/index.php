<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>SPTRD</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										
										<a  class="btn green" href="<?php echo base_url();?>ga/sptrd_tambah" >
													Add New <i class="icon-plus"></i>
													</a> 
									</div>
									<div class="btn-group">
										
										<a  class="btn green" href="<?php echo base_url();?>ga/sptrd_cetak_excel" >
													Cetak Excel <i class="icon-print"></i>
													</a> 
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
																 <span>STNK Berhasil Diupdate</span>
																</div>";
													}
													else if($this->session->flashdata('sama')){
														echo "<div class='alert alert-block alert-error show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>SPTRD Sudah Dimasukkan</span>
																</div>";
													}
												
							?>
								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<thead>
										<tr>
											<th>No</th>
											<th>Imb</th>
											<th>Nama Perusahaan/ Toko/ Tempat Usaha/ Kantor</th>
											<th>Nominal Pajak</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Kecamatan</th>
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
											<td><?php echo $tampil['imb'];?></td>
											<td><?php echo $tampil['nama_perusahaan'];?></td>
											<td><?php echo $tampil['nominal'];?></td>
											<td><?php echo $tampil['nama_pemilik'];?></td>
											<td><?php echo $tampil['alamat'];?></td>
											<td><?php echo $tampil['kd_kecamatan'];?></td>
											<td><?php echo $tampil['tahun_pendataan'];?></td>
											<td><?php echo $tampil['berlaku_sampai'];?></td>

											
											<td>
											<a class="btn green" href="<?php echo base_url();?>ga/sptrd_edit/<?php echo $tampil['id_sptrd'];?>"><i class="icon-edit"></i> Edit</a>
											<a class="btn blue" href="<?php echo base_url();?>ga/sptrd_detail/<?php echo $tampil['id_sptrd'];?>"><i class="icon-search"></i> Detail</a>
											<!-- <a class="btn red" href="<?php echo base_url();?>ga/stnk_delete/<?php echo $tampil['id_sptrd'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_pemilik'];?>?')"><i class="icon-trash"></i> Delete</a> -->


										</td>
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="10">No Result Data</td>
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

				


				


