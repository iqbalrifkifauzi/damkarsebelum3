<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Add SPTRD</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<?php if(validation_errors()) { ?>
								<div class="alert alert-block alert-error">
								  <button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo validation_errors(); ?>
								</div>
								<?php 
								} 
								?>

								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open('ga/sptrd_simpan/','class="form-horizontal"'); ?>
									
									
									
									<!-- <div class="control-group">
												<label class="control-label">Status Kendaraan</label>
												<div class="controls">
													<select id="select2_sample33" name="status_kendaraan" class="span6 select2">
														<option value="0"></option>

														
													</select>
												</div>
									</div>
									
									<div id="pilihanlokasi">
									<div class="control-group">
										<label class="control-label">Lokasi</label>
										<div class="controls">
											<input type="text" name="lokasi" id="lokasi" class="span6 m-wrap" placeholder="Lokasi..." />
										</div>
									</div>
									</div>
									<div id="pilihanlambung">
									<div class="control-group">
										<label class="control-label">Nomor Lambung</label>
										<div class="controls">
											<input type="text" name="nomor_lambung" id="nomor_lambung" class="span6 m-wrap" placeholder="Nomor Lambung..." />
										</div>
									</div>
									</div>
									<div id="boksijalak">
									<div class="control-group">
										<label class="control-label">Box</label>
										<div class="controls">
											<input type="text" name="box" id="box" class="span6 m-wrap" placeholder="Box..." />
										</div>
									</div>
									</div>
									<div id="userkomersil">
									<div class="control-group">
										<label class="control-label">User</label>
										<div class="controls">
											<input type="text" name="komersil" id="komersil" class="span6 m-wrap" placeholder="User..." />
										</div>
									</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nomor Kontrak</label>
										<div class="controls">
											<input type="text" name="nomor_kontrak" id="nomor_kontrak" class="span6 m-wrap" placeholder="Nomer Kontrak..." />
										</div>
									</div> -->

									<div class="control-group">
										<label class="control-label">Nama Perusahaan/ Toko/ Tempat Usaha/ Kantor</label>
										<div class="controls">
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="span6 m-wrap" placeholder="nama_perusahaan..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">imb</label>
										<div class="controls">
											<input type="text" name="imb" id="imb" class="span6 m-wrap" placeholder="Imb..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Jenis Usaha</label>
										<div class="controls">
											<input type="text" name="jenis_usaha" id="jenis_usaha" class="span6 m-wrap" placeholder="jenis usaha..." />
										</div>
									</div>

									<div class="control-group">
												<label class="control-label">Kecamatan</label>
												<div class="controls">
													<select id="select2_sample2" name="kd_kecamatan" class="span6 select2">
														<option value=""></option>
														<?php
														foreach ($kecamatan->result_array() as $tampil) { ?>
															<option value="<?php echo $tampil['id_kecamatan'];?>"><?php echo $tampil['nama_kecamatan'];?></option>
														<?php
														}
														?>
													</select>
												</div>
									</div>
									<div class="control-group">
										<label class="control-label">Alamat</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat"  ></textarea>
											
										</div>
									</div>	
	
	
									<div class="control-group">
										<label class="control-label">Nomor telpon</label>
										<div class="controls">
											<input type="text" name="tlp" id="tlp" class="span6 m-wrap" placeholder="Nomor telepon..." />
										</div>
									</div>
	
									<div class="control-group">
										<label class="control-label">Nama Pemilik</label>
										<div class="controls">
											<input type="text" name="nama_pemilik" id="nama_pemilik" class="span6 m-wrap" placeholder="Nama Pemilik..." />
										</div>
									</div>
	
									<div class="control-group">
										<label class="control-label">Luas Tanah</label>
										<div class="controls">
											<input type="text" name="luas_tanah" id="luas_tanah" class="span6 m-wrap" placeholder="Luas Tanah..." />
										</div>
									</div>
	
									<div class="control-group">
										<label class="control-label">Tahun Pendataan</label>
										<div class="controls">
											<input type="text" name="tahun_pendataan" id="tahun_pendataan" class="span6 m-wrap" placeholder="Tahun Pendataan..." />
										</div>
									</div>								


								
									<div class="control-group">
										<label class="control-label">Berlaku Sampai</label>
										<div class="controls">
											<div class="input-append date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input  class="m-wrap m-ctrl-medium date-picker" name="berlaku_sampai"  type="text"  id="berlaku_sampai" placeholder="Berlaku Sampai..."  data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd" > 
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div>
	
									<div class="control-group">
										<label class="control-label">Titik Kenal</label>
										<div class="controls">
											<input type="text" name="titik_kenal" id="titik_kenal" class="span6 m-wrap" placeholder="titik kenal..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Uraian Retribusi</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="uraian_retribusi" id="uraian_retribusi"  ></textarea>
											
										</div>
									</div>									
									
									<div class="control-group">
										<label class="control-label">Nominal Retribusi</label>
										<div class="controls">
											<input type="text" name="nominal" id="nominal" class="span6 m-wrap" placeholder="Nominal Retribusi..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nama Pemeriksa</label>
										<div class="controls">
											<input type="text" name="nama_pemeriksa" id="nama_pemeriksa" class="span6 m-wrap" placeholder="Nama Pemeriksa..." />
										</div>
									</div>

<!-- 
									
									
									



									<div class="control-group">
										<label class="control-label">Nomor Rangka</label>
										<div class="controls">
											<input type="text" name="uraian_retribusi" id="uraian_retribusi" class="span6 m-wrap" placeholder="Nomor Rangka..." />
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">Bahan Bakar</label>
										<div class="controls">
											<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" placeholder="Bahan Bakar..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">titik_kenal TNKB</label>
										<div class="controls">
											<input type="text" name="titik_kenal_tnkb" id="titik_kenal_tnkb" class="span6 m-wrap" placeholder="titik_kenal TNKB..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor BPKB</label>
										<div class="controls">
											<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" placeholder="Nomor BPKB..." />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Kode Lokasi</label>
										<div class="controls">
											<input type="text" name="nama_pemeriksa" id="nama_pemeriksa" class="span6 m-wrap" placeholder="Kode Lokasi..." />
										</div>
									</div> -->

									<!-- <div class="control-group">
										<label class="control-label">Nomor Urut Pendaftaran</label>
										<div class="controls">
											<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" placeholder="Nomor Urut Pendaftaran..." />
										</div>
									</div> -->

									
									<div class="form-actions">
										<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Simpan</button>
										<a href="<?php echo base_url();?>ga/sptrd" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
									<?php echo form_close(); ?>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#ga_master_lising_id').focus();
		$('#pilihanlokasi').hide(true);
		$('#pilihanlambung').hide(true);
		$('#boksijalak').hide(true);
		$('#userkomersil').hide(true);

	});

	$('#select2_sample33').click(function(){

		var status = $('#select2_sample33').val();

		if(status=="1") {
			$('#pilihanlokasi').show(true);
			$('#pilihanlambung').show(true);
			$('#boksijalak').hide(true);
		}
		else if (status=="0"){
			$('#boksijalak').show(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
		}
		else {
			$('#boksijalak').hide(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
			$('#userkomersil').show(true);
		}


	})

	
</script>
