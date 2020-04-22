<div class="row-fluid">
					<div class="span12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>DETAIL SPTRD</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								
								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open('','class="form-horizontal"'); ?>
									
									<?php

									foreach ($data_sptrd->result() as  $value) { ?>
									
									<!-- <div class="control-group">
										<label class="control-label">Status Kendaraan</label>
										<div class="controls">
										<?php 
										if ($value->status_kendaraan=="0") { ?>

											<input type="text" name="status_kendaraan" id="status_kendaraan" class="span6 m-wrap" value="Truk" disabled="true"/>
										<?php
										} 
										else { ?>
											<input type="text" name="status_kendaraan" id="status_kendaraan" class="span6 m-wrap" value="Operasional" disabled="true"/>

										<?php
										}
										?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Lokasi</label>
										<div class="controls">
											<input type="text" name="lokasi" id="lokasi" class="span6 m-wrap" value="<?php echo $value->lokasi;?>" disabled="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Box</label>
										<div class="controls">
											<input type="text" name="box" id="box" class="span6 m-wrap" value="<?php echo $value->box;?>" disabled="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">User Komersial</label>
										<div class="controls">
											<input type="text" name="komersil" id="komersil" class="span6 m-wrap" value="<?php echo $value->komersil;?>" disabled="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nomor Kontrak</label>
										<div class="controls">
											<input type="text" name="nomor_kontrak" id="nomor_kontrak" class="span6 m-wrap" value="<?php echo $value->nomor_kontrak;?>" disabled="true"/>
										</div>
									</div>
									 -->
									<div class="control-group">
										<label class="control-label">Nama Perusahaan/ Toko/ Tempat Usaha/ Kantor</label>
										<div class="controls">
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="span6 m-wrap" value="<?php echo $value->nama_perusahaan;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Imb</label>
										<div class="controls">
											<input type="text" name="imb" id="imb" class="span6 m-wrap" value="<?php echo $value->imb;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Jenis Usaha</label>
										<div class="controls">
											<input type="text" name="jenis_usaha" id="jenis_usaha" class="span6 m-wrap" value="<?php echo $value->jenis_usaha;?>" disabled="true"/>
										</div>
									</div>									

									<div class="control-group">
										<label class="control-label">Alamat</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat" value="<?php echo $value->alamat;?>" disabled="true"><?php echo $value->alamat;?></textarea>
											
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Kecamatan</label>
										<div class="controls">
											<input type="text" name="kd_kecamatan" id="kd_kecamatan" class="span6 m-wrap" value="<?php echo $value->nama_kecamatan;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor Telepon</label>
										<div class="controls">
											<input type="text" name="tlp" id="tlp" class="span6 m-wrap" value="<?php echo $value->tlp;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nama Pemilik</label>
										<div class="controls">
											<input type="text" name="nama_pemilik" id="nama_pemilik" class="span6 m-wrap" value="<?php echo $value->nama_pemilik;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Luas Tanah</label>
										<div class="controls">
											<input type="text" name="luas_tanah" id="luas_tanah" class="span6 m-wrap" value="<?php echo $value->luas_tanah;?>" disabled="true"/>
										</div>
									</div>	

									<div class="control-group">
										<label class="control-label">Tahun Pendataan</label>
										<div class="controls">
											<input type="text" name="tahun_pendataan" id="tahun_pendataan" class="span6 m-wrap" value="<?php echo $value->tahun_pendataan;?>" disabled="true"/>
										</div>
									</div>	

									<div class="control-group">
										<label class="control-label">Berlaku Sampai</label>
										<div class="controls">
											<div class="input-append date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input  class="m-wrap m-ctrl-medium date-picker" name="berlaku_sampai"  type="text"  id="berlaku_sampai" value="<?php echo $value->berlaku_sampai;?>"  data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd" disabled="true"> 
             									<span class="add-on"><i class="icon-calendar" disabled="true"></i></span>
											</div>
										</div>
									</div>									



									<div class="control-group">
										<label class="control-label">Titik Kenal</label>
										<div class="controls">
											<input type="text" name="titik_kenal" id="titik_kenal" class="span6 m-wrap" value="<?php echo $value->titik_kenal;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Uraian Retribusi</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="uraian_retribusi" id="uraian_retribusi" value="<?php echo $value->uraian_retribusi;?>" disabled="true"><?php echo $value->uraian_retribusi;?></textarea>
											
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nama Pemeriksa</label>
										<div class="controls">
											<input type="text" name="nama_pemeriksa" id="nama_pemeriksa" class="span6 m-wrap" value="<?php echo $value->nama_pemeriksa;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nominal</label>
										<div class="controls">
											<input type="text" name="nominal" id="nominal" class="span6 m-wrap" value="<?php echo $value->nominal;?>" disabled="true"/>
										</div>
									</div>




<!-- 

									<div class="control-group">
										<label class="control-label">Type</label>
										<div class="controls">
											<input type="text" name="type" id="type" class="span6 m-wrap" value="<?php echo $value->nama_ga_master_type;?>" disabled="true"/>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">Bahan Bakar</label>
										<div class="controls">
											<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" value="<?php echo $value->bahan_bakar;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">titik_kenal TNKB</label>
										<div class="controls">
											<input type="text" name="titik_kenal_tnkb" id="titik_kenal_tnkb" class="span6 m-wrap" value="<?php echo $value->titik_kenal_tnkb;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tahun Registrasi</label>
										<div class="controls">
											<input type="text" name="tahun_registrasi" id="tahun_registrasi" class="span6 m-wrap" value="<?php echo $value->tahun_registrasi;?>" disabled="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor BPKB</label>
										<div class="controls">
											<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" value="<?php echo $value->nomor_bpkb;?>" disabled="true"/>
										</div>
									</div>



									<div class="control-group">
										<label class="control-label">Nomor Urut Pendaftaran</label>
										<div class="controls">
											<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" value="<?php echo $value->no_urut_pendaftaran;?>" disabled="true"/>
										</div>
									</div> -->
									



									 	
									 <?php
									}
									?> 
									
									
									
									<div class="form-actions">
										
										<a href="<?php echo base_url();?>ga/sptrd" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
									
								</div>
								
							</div>
						</div>
						
					</div>
				</div>


