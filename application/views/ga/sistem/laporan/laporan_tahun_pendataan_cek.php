<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
<a  class="btn green" href="<?php echo base_url();?>ga/laporan_tahun_pendataan_excel/<?php echo $data_tahun;?>" >
													Cetak Excel <i class="icon-print"></i>
													</a> 
									<thead>
										<tr>
											<th>No</th>
											<th>Plat Nomor</th>
											<th>Nomor Rangka</th>
											<th>Nomor Mesin</th>
											<th>Nominal Pajak</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Tahun Registrasi</th>
											<th>Type</th>
											<th>Jenis</th>
											<th>Merek</th>
											<th>Tahun Pembuatan</th>
											<th>Isi Silinder</th>
											<th>Berlaku S/d</th>
											
											
										</tr>
									</thead>
									<tbody>

									

												
										<?php
										$no=1;
										if ($data_sptrd->num_rows()>0) {
											foreach ($data_sptrd->result_array() as $tampil) { 
												?>


										<tr >
											<td><?php echo $no;?></td>
											<td><?php echo $tampil['imb'];?></td>
											<td><?php echo $tampil['uraian_retribusi'];?></td>
											<td><?php echo $tampil['tlp'];?></td>
											<td><?php echo $tampil['nominal'];?></td>
											<td><?php echo $tampil['nama_pemilik'];?></td>
											<td><?php echo $tampil['alamat'];?></td>
											<td><?php echo $tampil['nama_perusahaan'];?></td>
											<td><?php echo $tampil['tahun_pendataan'];?></td>
											<td><?php echo $tampil['luas_tanah'];?></td>
											<td><?php echo $tampil['berlaku_sampai'];?></td>
											

										
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="14">No Result Data</td>
										</tr>
										<?php

										}
										?>
										
									</tbody>
								</table>