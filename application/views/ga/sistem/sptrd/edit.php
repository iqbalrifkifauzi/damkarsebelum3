<div class="row-fluid">
					<div class="span12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Edit SPTRD</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								
								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open('ga/sptrd_update/','class="form-horizontal"'); ?>
									<input type="hidden" name='id_sptrd' value="<?php echo $id_sptrd;?>"> 
									
									
									<!-- <div class="control-group">
												<label class="control-label">Status Kendaraan</label>
												<div class="controls">
													<select id="select2_sample33" name="status_kendaraan" class="span6 select2">
														<?php
														if ($status_kendaraan=="0") { ?>

															<option value="0" selected="selected">Truk</option>
															<option value="1">Operasional</option>
															<option value="2">Komersial</option>

														<?php
														}
														else if ($status_kendaraan=="1"){ ?>
															<option value="0" >Truk</option>
															<option value="1" selected="selected">Operasional</option>
															<option value="2" >Komersial</option>
														<?php
														}
														else { ?>
															<option value="0" >Truk</option>
															<option value="1" >Operasional</option>
															<option value="2" selected="selected">Komersial</option>

														<?php
														}
														?>

														
														
													</select>
												</div>
									</div> -->
									<!-- <div id="pilihanlokasi">
									<div class="control-group">
										<label class="control-label">Lokasi</label>
										<div class="controls">
											<input type="text" name="lokasi" id="lokasi" class="span6 m-wrap" value="<?php echo $lokasi;?>" />
										</div>
									</div>
									</div>
									<div id="pilihanlambung">
									<div class="control-group">
										<label class="control-label">Nomor Lambung</label>
										<div class="controls">
											<input type="text" name="nomor_lambung" id="nomor_lambung" class="span6 m-wrap" value="<?php echo $nomor_lambung;?>" />
										</div>
									</div>
									</div>
									<div id="boksijalak">
									<div class="control-group">
										<label class="control-label">Box</label>
										<div class="controls">
											<input type="text" name="box" id="box" class="span6 m-wrap" value="<?php echo $box;?>" />
										</div>
									</div>
									</div>
									<div id="userkomersil">
									<div class="control-group">
										<label class="control-label">User</label>
										<div class="controls">
											<input type="text" name="komersil" id="komersil" class="span6 m-wrap" value="<?php echo $komersil;?>" />
										</div>
									</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nomor Kontrak</label>
										<div class="controls">
											<input type="text" name="nomor_kontrak" id="nomor_kontrak" class="span6 m-wrap" value="<?php echo $nomor_kontrak;?>" />
										</div>
									</div> -->
									<div class="control-group">
										<label class="control-label">Nama Perusahaan/ Toko/ Tempat Usaha/ Kantor</label>
										<div class="controls">
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="span6 m-wrap" value="<?php echo $nama_perusahaan;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">imb</label>
										<div class="controls">
											<input type="text" name="imb" id="imb" class="span6 m-wrap" value="<?php echo $imb;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Jenis Usaha</label>
										<div class="controls">
											<input type="text" name="jenis_usaha" id="jenis_usaha" class="span6 m-wrap" value="<?php echo $jenis_usaha;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Alamat</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat" value="<?php echo $alamat;?>" ><?php echo $alamat;?></textarea>
											
										</div>
									</div>

									<div class="control-group">
												<label class="control-label">Kecamatan</label>
												<div class="controls">
													<select id="select2_sample2" name="kd_kecamatan" class="span6 select2">
														<option value=""></option>
														<?php
														foreach ($kecamatan->result_array() as $tampil) { 
															if ($kd_kecamatan==$tampil['id_kecamatan']) { ?>
															<option value="<?php echo $tampil['id_kecamatan'];?>" selected="selected"><?php echo $tampil['nama_kecamatan'];?></option>
															<?php
															}
															else { ?>
															<option value="<?php echo $tampil['id_kecamatan'];?>"><?php echo $tampil['nama_kecamatan'];?></option>
															<?php
															}
														
														}
														?>
													</select>
												</div>
											</div>									

									<div class="control-group">
										<label class="control-label">Nomor telepon</label>
										<div class="controls">
											<input type="text" name="tlp" id="tlp" class="span6 m-wrap" value="<?php echo $tlp;?>" />
										</div>
									</div>	
										
									<div class="control-group">
										<label class="control-label">Nama Pemilik</label>
										<div class="controls">
											<input type="text" name="nama_pemilik" id="nama_pemilik" class="span6 m-wrap" value="<?php echo $nama_pemilik;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Luas Tanah</label>
										<div class="controls">
											<input type="text" name="luas_tanah" id="luas_tanah" class="span6 m-wrap" value="<?php echo $luas_tanah;?>" />
										</div>
									</div>	
																	
									<div class="control-group">
										<label class="control-label">Tahun pendataan</label>
										<div class="controls">
											<input type="text" name="tahun_pendataan" id="tahun_pendataan" class="span6 m-wrap" value="<?php echo $tahun_pendataan;?>" />
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
											<input type="text" name="titik_kenal" id="titik_kenal" class="span6 m-wrap" value="<?php echo $titik_kenal;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Uraian Retribusi</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="uraian_retribusi" id="uraian_retribusi" value="<?php echo $uraian_retribusi;?>" ><?php echo $uraian_retribusi;?></textarea>
											
										</div>
									</div>

				

									<div class="control-group">
										<label class="control-label">Nominal Retribusi</label>
										<div class="controls">
											<input type="text" name="nominal" id="nominal" class="span6 m-wrap" value="<?php echo $nominal;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nama Pemeriksa</label>
										<div class="controls">
											<input type="text" name="nama_pemeriksa" id="nama_pemeriksa" class="span6 m-wrap" value="<?php echo $nama_pemeriksa;?>" />
										</div>
									</div>


									

<!-- 

									








									<div class="control-group">
										<label class="control-label">Nomor Rangka</label>
										<div class="controls">
											<input type="text" name="uraian_retribusi" id="uraian_retribusi" class="span6 m-wrap" value="<?php echo $uraian_retribusi;?>" />
										</div>
									</div>





									<div class="control-group">
										<label class="control-label">Bahan Bakar</label>
										<div class="controls">
											<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" value="<?php echo $bahan_bakar;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">titik_kenal TNKB</label>
										<div class="controls">
											<input type="text" name="titik_kenal_tnkb" id="titik_kenal_tnkb" class="span6 m-wrap" value="<?php echo $titik_kenal_tnkb;?>" />
										</div>
									</div>



									<div class="control-group">
										<label class="control-label">Nomor BPKB</label>
										<div class="controls">
											<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" value="<?php echo $nomor_bpkb;?>" />
										</div>
									</div>



									<div class="control-group">
										<label class="control-label">Nomor Urut Pendaftaran</label>
										<div class="controls">
											<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" value="<?php echo $no_urut_pendaftaran;?>" />
										</div>
									</div>
									 -->

									
									
									<div class="form-actions">
										<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Update</button>
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
		// $('#pilihanlokasi').hide(true);
		// $('#boksijalak').hide(true);

		var status = $('#select2_sample33').val();

		if(status=="1") {
			$('#pilihanlokasi').show(true);
			$('#pilihanlambung').show(true);
			$('#boksijalak').hide(true);
			$('#userkomersil').hide(true);
		}
		else if (status=="0"){
			$('#boksijalak').show(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
			$('#userkomersil').hide(true);
		}
		else {
			$('#boksijalak').hide(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
			$('#userkomersil').show(true);
		}

	});

	$('#select2_sample33').click(function(){

		var status = $('#select2_sample33').val();

		if(status=="1") {
			$('#pilihanlokasi').show(true);
			$('#pilihanlambung').show(true);
			$('#boksijalak').hide(true);
			$('#userkomersil').hide(true);
		}
		else if (status=="0") {
			$('#boksijalak').show(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
			$('#userkomersil').hide(true);
		}
		else {
			$('#boksijalak').hide(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
			$('#userkomersil').show(true);
		}


	})

	
</script>