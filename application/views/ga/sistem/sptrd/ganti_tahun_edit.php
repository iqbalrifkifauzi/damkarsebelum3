<div class="row-fluid">
					<div class="span12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>PERPANJANG tahun SPTRD</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								
								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open('ga/ganti_tahun_update/','class="form-horizontal"'); ?>
									<input type="hidden" name='id_sptrd' value="<?php echo $id_sptrd;?>"> 
									
									<div class="control-group">
										<label class="control-label">Nama Perusahaan/ Toko/ Tempat Usaha/ Kantor</label>
										<div class="controls">
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="span6 m-wrap" value="<?php echo $nama_perusahaan;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Imb</label>
										<div class="controls">
											<input type="text" name="imb" id="imb" class="span6 m-wrap" value="<?php echo $imb;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Jenis Usaha</label>
										<div class="controls">
											<input type="text" name="jenis_usaha" id="jenis_usaha" class="span6 m-wrap" value="<?php echo $jenis_usaha;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor Telepon</label>
										<div class="controls">
											<input type="text" name="tlp" id="tlp" class="span6 m-wrap" value="<?php echo $tlp;?>" readonly="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nama Pemilik</label>
										<div class="controls">
											<input type="text" name="nama_pemilik" id="nama_pemilik" class="span6 m-wrap" value="<?php echo $nama_pemilik;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Luas Tanah</label>
										<div class="controls">
											<input type="text" name="luas_tanah" id="luas_tanah" class="span6 m-wrap" value="<?php echo $luas_tanah;?>" readonly="true"/>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">Tahun Pendataan</label>
										<div class="controls">
											<input type="text" name="tahun_pendataan" id="tahun_pendataan" class="span6 m-wrap" value="<?php echo $tahun_pendataan;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Berlaku Sampai</label>
										<div class="controls">
											<div class="input-append date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input  class="m-wrap m-ctrl-medium date-picker" name="berlaku_sampai"  type="text"  id="berlaku_sampai" value="<?php echo $berlaku_sampai;?>"  data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd" > 
             									<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div>	
									

									<div class="control-group">
										<label class="control-label">Titik Kenal</label>
										<div class="controls">
											<input type="text" name="titik_kenal" id="titik_kenal" class="span6 m-wrap" value="<?php echo $titik_kenal;?>" readonly="true" />
										</div>
									</div>	

									<div class="control-group">
										<label class="control-label">Uraian Retribusi</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="uraian_retribusi" id="uraian_retribusi" value="<?php echo $uraian_retribusi;?>" readonly="true"><?php echo $uraian_retribusi;?></textarea>
											
										</div>
									</div>																									
									<div class="control-group">
										<label class="control-label">Nama Pemeriksa</label>
										<div class="controls">
											<input type="text" name="nama_pemeriksa" id="nama_pemeriksa" class="span6 m-wrap" value="<?php echo $nama_pemeriksa;?>" readonly="true" />
										</div>
									</div>









<!-- 									<div class="control-group">
										<label class="control-label">Type</label>
										<div class="controls">
											<input type="text" name="type" id="type" class="span6 m-wrap" value="<?php echo $nama_ga_master_type;?>" readonly="true"/>
										</div>
									</div> -->








<!-- 									<div class="control-group">
										<label class="control-label">Nomor Rangka</label>
										<div class="controls">
											<input type="text" name="uraian_retribusi" id="uraian_retribusi" class="span6 m-wrap" value="<?php echo $uraian_retribusi;?>" readonly="true"/>
										</div>
									</div>




									<div class="control-group">
										<label class="control-label">Bahan Bakar</label>
										<div class="controls">
											<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" value="<?php echo $bahan_bakar;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">titik_kenal TNKB</label>
										<div class="controls">
											<input type="text" name="titik_kenal_tnkb" id="titik_kenal_tnkb" class="span6 m-wrap" value="<?php echo $titik_kenal_tnkb;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tahun Registrasi</label>
										<div class="controls">
											<input type="text" name="tahun_registrasi" id="tahun_registrasi" class="span6 m-wrap" value="<?php echo $tahun_registrasi;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor BPKB</label>
										<div class="controls">
											<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" value="<?php echo $nomor_bpkb;?>" readonly="true"/>
										</div>
									</div>



									<div class="control-group">
										<label class="control-label">Nomor Urut Pendaftaran</label>
										<div class="controls">
											<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" value="<?php echo $no_urut_pendaftaran;?>" readonly="true"/>
										</div>
									</div> -->
									


									
									<div class="form-actions">
										<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Update</button>
										<a href="<?php echo base_url();?>ga/ganti_tahun" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
									<?php echo form_close(); ?>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>


