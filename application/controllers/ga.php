<?php

class ga extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ga_model');
	}

	
	public function home() {

		
			$this->template_dua->load('template_dua','ga/sistem/home/index');
		
	}

	

	//AWAL STNK

	public function sptrd() {
		

			$data['data_sptrd'] = $this->ga_model->GetSptrd();
			$this->template_dua->load('template_dua','ga/sistem/sptrd/index',$data);
		
	}

	public function sptrd_tambah() {
		
			$data['kecamatan'] = $this->ga_model->GetKecamatan();
			$this->template_dua->load('template_dua','ga/sistem/sptrd/add',$data);
		
	}

	public function sptrd_simpan() {
		
	
			$this->form_validation->set_rules('imb', 'Imb' );
			$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik');
			$this->form_validation->set_rules('kd_kecamatan', 'kd_kecamatan');
			$this->form_validation->set_rules('nominal', 'Nominal Retribusi');
			$this->form_validation->set_rules('berlaku_sampai', 'Berlaku Sampai Dengan');
			

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_master_type'] = $this->ga_model->GetMasterType();
				$data['kecamatan'] = $this->ga_model->GetKecamatan();
				
				$this->template_dua->load('template_dua','ga/sistem/sptrd/add',$data);
			}
			else {

				$imb = $this->input->post("imb");
				$cek = $this->ga_model->ImbSama($imb);

				if ($cek->num_rows()>0) {

					$this->session->set_flashdata('sama','SPTRD sudah dimasukkan');
					redirect("ga/sptrd");

				}
				else {

						$in_data['imb'] 					= $this->input->post('imb');
						$in_data['nama_pemilik'] 			= $this->input->post('nama_pemilik');
						$in_data['alamat'] 					= $this->input->post('alamat');
						$in_data['nama_perusahaan'] 		= $this->input->post('nama_perusahaan');
						$in_data['kd_kecamatan'] 			= $this->input->post('kd_kecamatan');
						$in_data['jenis_usaha'] 			= $this->input->post('jenis_usaha');
						$in_data['tahun_pendataan'] 		= $this->input->post('tahun_pendataan');
						$in_data['luas_tanah'] 				= $this->input->post('luas_tanah');
						$in_data['uraian_retribusi'] 		= $this->input->post('uraian_retribusi');
						$in_data['tlp'] 					= $this->input->post('tlp');
						$in_data['titik_kenal'] 			= $this->input->post('titik_kenal');
						$in_data['nama_pemeriksa'] 			= $this->input->post('nama_pemeriksa');
						$in_data['berlaku_sampai'] 			= $this->input->post('berlaku_sampai');
						$in_data['nominal'] 				= $this->input->post('nominal');
						$this->db->insert("tbl_sptrd",$in_data);



					$this->session->set_flashdata('berhasil','SPTRD Berhasil Disimpan');
					redirect("ga/sptrd");

				}

						
				
			}
		
	}

	public function sptrd_edit() {
		$id_sptrd = $this->uri->segment(3);

		$query  = $this->ga_model->EditSptrdId($id_sptrd);

		foreach ($query->result_array() as $value) {
			$data['id_sptrd']				= $value['id_sptrd'];
			$data['imb']					= $value['imb'];
			$data['nama_pemilik']			= $value['nama_pemilik'];
			$data['alamat']					= $value['alamat'];
			$data['nama_perusahaan'] 		= $value['nama_perusahaan'];
			$data['kd_kecamatan'] 			= $value['kd_kecamatan'];
			$data['jenis_usaha'] 			= $value['jenis_usaha'];
			$data['tahun_pendataan'] 		= $value['tahun_pendataan'];
			$data['luas_tanah'] 			= $value['luas_tanah'];
			$data['uraian_retribusi'] 		= $value['uraian_retribusi'];
			$data['tlp'] 					= $value['tlp'];
			$data['titik_kenal'] 			= $value['titik_kenal'];
			$data['nama_pemeriksa'] 		= $value['nama_pemeriksa'];
			$data['berlaku_sampai'] 		= $value['berlaku_sampai'];
			$data['nominal'] 				= $value['nominal'];
		}

			$data['kecamatan'] = $this->ga_model->GetKecamatan();
		$this->template_dua->load('template_dua','ga/sistem/sptrd/edit',$data);
	}

	public function sptrd_update() {
		$id['id_sptrd'] = $this->input->post("id_sptrd");

		$in_data['imb'] 					= $this->input->post('imb');
		$in_data['nama_pemilik'] 			= $this->input->post('nama_pemilik');
		$in_data['alamat'] 					= $this->input->post('alamat');
		$in_data['nama_perusahaan'] 		= $this->input->post('nama_perusahaan');
		$in_data['kd_kecamatan'] 			= $this->input->post('kd_kecamatan');
		$in_data['jenis_usaha'] 			= $this->input->post('jenis_usaha');
		$in_data['tahun_pendataan'] 		= $this->input->post('tahun_pendataan');
		$in_data['luas_tanah'] 				= $this->input->post('luas_tanah');
		$in_data['uraian_retribusi'] 		= $this->input->post('uraian_retribusi');
		$in_data['tlp'] 					= $this->input->post('tlp');
		$in_data['titik_kenal'] 			= $this->input->post('titik_kenal');
		$in_data['nama_pemeriksa'] 			= $this->input->post('nama_pemeriksa');
		$in_data['berlaku_sampai'] 			= $this->input->post('berlaku_sampai');
		$in_data['nominal'] 				= $this->input->post('nominal');


		$this->db->update("tbl_sptrd",$in_data,$id);

		$this->session->set_flashdata('update','SPTRD Berhasil Diupdate');
		redirect("ga/sptrd");
	}

	public function sptrd_detail() {
		$id_sptrd = $this->uri->segment(3);

		$data['data_sptrd']  = $this->ga_model->EditSptrdId($id_sptrd);


		$this->template_dua->load('template_dua','ga/sistem/sptrd/show',$data);
	}

	public function sptrd_delete() {
		$id_sptrd  = $this->uri->segment(3);

		$this->ga_model->DeleteSptrdId($id_sptrd);

		$this->session->set_flashdata('message','SPTRD Berhasil Dihapus');
		redirect('ga/sptrd');
	}
	public function sptrd_cetak_excel() {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_all_stnk.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$data['data_sptrd'] = $this->ga_model->GetSptrd();
			$this->load->view('ga/sistem/sptrd/excel',$data);


		

	}

	public function master_asuransi() {

		

			$data['data_master_asuransi'] = $this->ga_model->GetMasterAsuransi();
			$this->template_dua->load('template_dua','ga/sistem/master_asuransi/index',$data);
		

	}

	public function stnk_perpanjangan_pajak_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_perpanjangan_stnk.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
          
			$data['data_sptrd'] 					= $this->ga_model->GetStnkPerpanjangRetribusi($bulan2,$bulan1,$bulan);
			$data['data_total_nominal_pajak'] 	= $this->ga_model->GetStnkPerpanjangRetribusiTotalNominal($bulan2,$bulan1,$bulan);
			
			$this->load->view('ga/sistem/stnk/cetak_perpanjangan_stnk',$data);
		
	}

	//AKHIR STNK

	public function master_asuransi_tambah() {

		

			// $data['kecamatan_asuransi'] = $this->ga_model->GetKecamatanAsuransi();
			$this->template_dua->load('template_dua','ga/sistem/master_asuransi/add');
		
	}

	public function master_asuransi_simpan() {
		

			$this->form_validation->set_rules('nama_ga_master_asuransi', 'Nama Asuransi', 'required');
			$this->form_validation->set_rules('alamat_ga_master_asuransi', 'Alamat', 'required');
			$this->form_validation->set_rules('telp_ga_master_asuransi', 'Telp', 'required');
			// $this->form_validation->set_rules('ga_master_kecamatan_asuransi_id', 'kecamatan Asuransi', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$data['kecamatan_asuransi'] = $this->ga_model->GetKecamatanAsuransi();
				$this->template_dua->load('template_dua','ga/sistem/master_asuransi/add',$data);
			}
			else {

						$in_data['nama_ga_master_asuransi'] 	= $this->input->post('nama_ga_master_asuransi');
						$in_data['alamat_ga_master_asuransi'] 	= $this->input->post('alamat_ga_master_asuransi');
						$in_data['telp_ga_master_asuransi'] 	= $this->input->post('telp_ga_master_asuransi');
						// $in_data['ga_master_kecamatan_asuransi_id'] 	= $this->input->post('ga_master_kecamatan_asuransi_id');
						
						$this->db->insert("tbl_ga_master_asuransi",$in_data);

					$this->session->set_flashdata('berhasil','Master Asuransi Berhasil Disimpan');
					redirect("ga/master_asuransi");
				
			}
		
	}

	public function master_asuransi_edit() {
		$id_ga_master_asuransi = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterAsuransiID($id_ga_master_asuransi);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_asuransi']  		= $value['id_ga_master_asuransi'];
			$data['nama_ga_master_asuransi']  		= $value['nama_ga_master_asuransi'];
			$data['alamat_ga_master_asuransi']  	= $value['alamat_ga_master_asuransi'];
			$data['telp_ga_master_asuransi']  		= $value['telp_ga_master_asuransi'];
		// 	$data['ga_master_kecamatan_asuransi_id']  	= $value['ga_master_kecamatan_asuransi_id'];
		// 
		}

		// $data['kecamatan_asuransi'] =  $this->ga_model->GetKecamatanAsuransi();

		$this->template_dua->load('template_dua','ga/sistem/master_asuransi/edit',$data);
	}

	public function master_asuransi_update() {

		

			$id['id_ga_master_asuransi'] =  $this->input->post('id_ga_master_asuransi');

			$in_data['nama_ga_master_asuransi'] 		= $this->input->post('nama_ga_master_asuransi');
			$in_data['alamat_ga_master_asuransi'] 		= $this->input->post('alamat_ga_master_asuransi');
			$in_data['telp_ga_master_asuransi'] 		= $this->input->post('telp_ga_master_asuransi');
			// $in_data['ga_master_kecamatan_asuransi_id'] 	= $this->input->post('ga_master_kecamatan_asuransi_id');

			$this->db->update("tbl_ga_master_asuransi",$in_data,$id);

			$this->session->set_flashdata('update','Master Asuransi Berhasil Diupdate');
			redirect("ga/master_asuransi");


		

	}

	public function master_asuransi_delete(){
		

			$id_ga_master_asuransi = $this->uri->segment(3);

			$this->ga_model->DeleteMasterId($id_ga_master_asuransi);

			$this->session->set_flashdata('message','Master Asuransi Berhasil Dihapus');
			redirect('ga/master_asuransi');

		
	}

	//Awal Ga Asuransi

	public function asuransi() {
		

			$data['data_asuransi'] =  $this->ga_model->GetAsuransi();
			$this->template_dua->load('template_dua','ga/sistem/asuransi/index',$data);

		
	}

	public function asuransi_tambah () {
		

			$data['data_master_asuransi'] 				=  $this->ga_model->GetMasterAsuransi();
			$data['data_sptrd'] 							=  $this->ga_model->GetStnk();
			$data['kecamatan_asuransi'] 		=  $this->ga_model->GetKecamatanAsuransi();
			$data['kecamatan_asuransi_view'] 	=  $this->ga_model->GetKecamatanAsuransiView();

			// echo $this->db->last_query();
			// die();
			$this->template_dua->load('template_dua','ga/sistem/asuransi/add',$data);

		
	}

	public function asuransi_simpan () {
		

			$this->form_validation->set_rules('no_polis', 'Nomor Polis', 'required');
			$this->form_validation->set_rules('ga_master_asuransi_id', 'Asuransi', 'required');
			$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
			$this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
			$this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir', 'required');
			$this->form_validation->set_rules('pic', 'PIC', 'required');
			$this->form_validation->set_rules('pic_telp', 'PIC Telp', 'required');
			$this->form_validation->set_rules('nominal', 'Nominal Asuransi', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
				$this->template_dua->load('template_dua','ga/sistem/asuransi/add',$data);
			}
			else {

						$in_data['no_polis'] 							= $this->input->post('no_polis');
						$in_data['pic'] 								= $this->input->post('pic');
						$in_data['pic_telp'] 							= $this->input->post('pic_telp');
						$in_data['tgl_join'] 							= $this->input->post('tgl_join');
						$in_data['tgl_berakhir'] 						= $this->input->post('tgl_berakhir');
						$in_data['ga_master_asuransi_id'] 				= $this->input->post('ga_master_asuransi_id');
						$in_data['ga_master_kecamatan_asuransi_id'] 		= $this->input->post('ga_master_kecamatan_asuransi_id');
						$in_data['view_ga_master_kecamatan_asuransi_id'] 	= $this->input->post('view_ga_master_kecamatan_asuransi_id');
						$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
						$in_data['master_login_id'] 					= $this->session->userdata("id_master_login");
						$in_data['nominal'] 							= $this->input->post('nominal');
						$in_data['status'] 								= "0";
						
						$this->db->insert("tbl_ga_asuransi",$in_data);

					$this->session->set_flashdata('berhasil','Asuransi Berhasil Disimpan');
					redirect("ga/asuransi");
				
			}

		
	}

	public function asuransi_edit() {
		

			$id_ga_asuransi = $this->uri->segment(3);

			$query =  $this->ga_model->EditAsuransiId($id_ga_asuransi);

			foreach ($query->result_array() as $value) {
				$data['id_ga_asuransi']  				= $value['id_ga_asuransi'];
				$data['no_polis']  						= $value['no_polis'];
				$data['pic']  							= $value['pic'];
				$data['pic_telp']  						= $value['pic_telp'];
				$data['tgl_join']  						= $value['tgl_join'];
				$data['tgl_berakhir']  					= $value['tgl_berakhir'];
				$data['ga_master_asuransi_id']  		= $value['ga_master_asuransi_id'];
				$data['ga_master_kecamatan_asuransi_id']  	= $value['ga_master_kecamatan_asuransi_id'];
				$data['view_ga_master_kecamatan_asuransi_id']  	= $value['view_ga_master_kecamatan_asuransi_id'];
				$data['ga_stnk_id']  					= $value['ga_stnk_id'];
				$data['nominal']  						= $value['nominal'];
			}

				$data['data_master_asuransi'] 				=  $this->ga_model->GetMasterAsuransi();
				$data['data_sptrd'] 							=  $this->ga_model->GetStnk();
				$data['kecamatan_asuransi'] 		=  $this->ga_model->GetKecamatanAsuransi();
				$data['kecamatan_asuransi_view'] 	=  $this->ga_model->GetKecamatanAsuransiView();
			$this->template_dua->load('template_dua','ga/sistem/asuransi/edit',$data);

		
	}

	public function asuransi_update () {
		

			$id['id_ga_asuransi'] =  $this->input->post('id_ga_asuransi');

			$in_data['no_polis'] 							= $this->input->post('no_polis');
			$in_data['pic'] 								= $this->input->post('pic');
			$in_data['pic_telp'] 							= $this->input->post('pic_telp');
			$in_data['tgl_join'] 							= $this->input->post('tgl_join');
			$in_data['tgl_berakhir'] 						= $this->input->post('tgl_berakhir');
			$in_data['ga_master_asuransi_id'] 				= $this->input->post('ga_master_asuransi_id');
			$in_data['ga_master_kecamatan_asuransi_id'] 		= $this->input->post('ga_master_kecamatan_asuransi_id');
			$in_data['view_ga_master_kecamatan_asuransi_id'] 	= $this->input->post('view_ga_master_kecamatan_asuransi_id');
			$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
			$in_data['nominal'] 							= $this->input->post('nominal');

			$this->db->update("tbl_ga_asuransi",$in_data,$id);

			$this->session->set_flashdata('update','Asuransi Berhasil Diupdate');
			redirect("ga/asuransi");

		
	}

	public function asuransi_delete () {
		

			$id_ga_asuransi =  $this->uri->segment(3);

			$this->ga_model->DeleteAsuransiId($id_ga_asuransi);
			
			$this->session->set_flashdata('message','Asuransi Berhasil Dihapus');
			redirect('ga/asuransi');

		
	}

	public function asuransi_detail () {
		

			$id_ga_asuransi =  $this->uri->segment(3);

			$data['data_asuransi'] =  $this->ga_model->DetailAsuransiId($id_ga_asuransi);

			$this->template_dua->load('template_dua','ga/sistem/asuransi/show',$data);

		
	}

	public function asuransi_batas() {
		

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

            $data['data_asuransi'] =  $this->ga_model->GetAsuransiExpired($bulan2,$bulan1,$bulan,$tahun);
            // echo $this->db->last_query();
            // die();
            $data['data_asuransi_total']  =  $this->ga_model->GetAsuransiExpiredTotal($bulan2,$bulan1,$bulan,$tahun);

            $this->template_dua->load('template_dua','ga/sistem/asuransi/exspired',$data);



		
	}

	public function asuransi_batas_edit() {
		

			$id_ga_asuransi = $this->uri->segment(3);

			$query =  $this->ga_model->EditAsuransiId($id_ga_asuransi);

			foreach ($query->result_array() as $value) {
				$data['id_ga_asuransi']  		= $value['id_ga_asuransi'];
				$data['no_polis']  		= $value['no_polis'];
				$data['tgl_join']  				= $value['tgl_join'];
				$data['tgl_berakhir']  			= $value['tgl_berakhir'];
				$data['ga_master_asuransi_id']  = $value['ga_master_asuransi_id'];
				$data['ga_stnk_id']  			= $value['ga_stnk_id'];
				$data['nominal']  				= $value['nominal'];
			}

				$data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/asuransi/exspired_edit',$data);

		
	}

	public function asuransi_batas_update() {
		

			$id['id_ga_asuransi'] =  $this->input->post('id_ga_asuransi');

			
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			

			$this->db->update("tbl_ga_asuransi",$in_data,$id);

			$this->session->set_flashdata('update','Asuransi Berhasil Diperpanjang');
			redirect("ga/asuransi_batas");

		
	}

	public function asuransi_batas_excel() {
		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_asuransi_expired.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

            $data['data_asuransi'] =  $this->ga_model->GetAsuransiExpired($bulan2,$bulan1,$bulan,$tahun);

            $data['data_asuransi_total']  =  $this->ga_model->GetAsuransiExpiredTotal($bulan2,$bulan1,$bulan,$tahun);

			

            $this->load->view('ga/sistem/asuransi/cetak_asuransi',$data);



		
	}

	//Akhir asuransi

	public function ganti_tahun() {
		

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

			$data['data_sptrd'] = $this->ga_model->GetSptrdGantiTahun($bulan2,$bulan1,$tahun,$bulan);
			$data['data_sptrd_total'] = $this->ga_model->GetsptrdGantiTahunTotal($bulan2,$bulan1,$tahun,$bulan);
			$this->template_dua->load('template_dua','ga/sistem/sptrd/ganti_tahun',$data);

		
	}

	public function ganti_tahun_excel() {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_ganti_tahun.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

			$data['data_sptrd'] = $this->ga_model->GetSptrdGantitahun($bulan2,$bulan1,$tahun,$bulan);
			$data['data_sptrd_total'] = $this->ga_model->GetSptrdGantitahunTotal($bulan2,$bulan1,$tahun,$bulan);
			
			$this->load->view('ga/sistem/sptrd/cetak_ganti_tahun',$data);
		

	}

	public function ganti_tahun_edit() {
		$id_sptrd = $this->uri->segment(3);

		$query  = $this->ga_model->EditSptrdId($id_sptrd);

		foreach ($query->result_array() as $value) {
			$data['id_sptrd']				= $value['id_sptrd'];
			$data['imb']		= $value['imb'];
			$data['nama_pemilik']			= $value['nama_pemilik'];
			$data['alamat']					= $value['alamat'];
			$data['nama_perusahaan'] 					= $value['nama_perusahaan'];
			$data['kecamatan'] 					= $value['kecamatan'];
			$data['jenis_usaha'] 					= $value['jenis_usaha'];
			$data['tahun_pendataan'] 		= $value['tahun_pendataan'];
			$data['luas_tanah'] 			= $value['luas_tanah'];
			$data['uraian_retribusi'] 			= $value['uraian_retribusi'];
			$data['tlp'] 			= $value['tlp'];
			$data['titik_kenal'] 					= $value['titik_kenal'];
			$data['nama_pemeriksa'] 			= $value['nama_pemeriksa'];
			$data['berlaku_sampai'] 		= $value['berlaku_sampai'];
			$data['kecamatan'] 	= $value['kecamatan'];
			
		}

		$this->template_dua->load('template_dua','ga/sistem/sptrd/ganti_tahun_edit',$data);
	}

	public function ganti_tahun_update() {
		$id['id_sptrd'] = $this->input->post("id_sptrd");

		
		$in_data['berlaku_sampai'] 			= $this->input->post('berlaku_sampai');


		$this->db->update("tbl_sptrd",$in_data,$id);

		$this->session->set_flashdata('update','SPTRD Berhasil Diupdate');
		redirect("ga/ganti_tahun");
	}

	public function perpanjang_retribusi () {
		

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
			
          
			$data['data_sptrd'] 					= $this->ga_model->GetSptrdPerpanjangRetribusi($bulan2,$bulan1,$bulan);
			$data['data_total_nominal_retribusi'] 	= $this->ga_model->GetSptrdPerpanjangRetribusiTotalNominal($bulan2,$bulan1,$bulan);
			$this->template_dua->load('template_dua','ga/sistem/sptrd/perpanjang_retribusi',$data);

		
	}

	public function perpanjang_retribusi_edit() {
				

			$in_data['tanggal_perpanjang_retribusi'] 	= date('Y-m-d');
			$in_data['bulan_retribusi'] 				= date('Y-m-d', strtotime("+2 month"));
			$in_data['imb_id'] 					= $this->uri->segment(3);
			$in_data['master_login_id'] 			= $this->session->userdata("id_master_login");

			$id['id_sptrd'] 					= $this->uri->segment(3);
			$update['status_perpanjang_retribusi'] 	= "0";

			$this->db->insert("tbl_perpanjang_retribusi",$in_data);
			$this->db->update("tbl_sptrd",$update,$id);
			
			$this->session->set_flashdata('message','SPTRD Berhasil Diperpanjang');
			redirect('ga/perpanjang_retribusi');

		
	}

	public function master_type() {

		

			$data['data_master_type'] = $this->ga_model->GetMasterType();
			$this->template_dua->load('template_dua','ga/sistem/master_type/index',$data);
		

	}

	public function master_type_tambah() {

		

			$this->template_dua->load('template_dua','ga/sistem/master_type/add');
		
	}

	public function master_type_simpan() {
		

			$this->form_validation->set_rules('nama_ga_master_type', 'Type', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_dua->load('template_dua','ga/sistem/master_type/add');
			}
			else {

						$in_data['nama_ga_master_type'] 	= $this->input->post('nama_ga_master_type');
						
						$this->db->insert("tbl_ga_master_type",$in_data);

					$this->session->set_flashdata('berhasil','Master Type Berhasil Disimpan');
					redirect("ga/master_type");
				
			}
		
	}

	public function master_type_edit() {
		$id_ga_master_type = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterTypeID($id_ga_master_type);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_type']  	= $value['id_ga_master_type'];
			$data['nama_ga_master_type']  	= $value['nama_ga_master_type'];
			
		}

		$this->template_dua->load('template_dua','ga/sistem/master_type/edit',$data);
	}

	public function master_type_update() {

		

			$id['id_ga_master_type'] =  $this->input->post('id_ga_master_type');

			$in_data['nama_ga_master_type'] 	= $this->input->post('nama_ga_master_type');
			

			$this->db->update("tbl_ga_master_type",$in_data,$id);

			$this->session->set_flashdata('update','Master Type Berhasil Diupdate');
			redirect("ga/master_type");


		

	}

	public function master_type_delete(){
		

			$id_ga_master_type = $this->uri->segment(3);

			$this->ga_model->DeleteMasterTypeId($id_ga_master_type);

			$this->session->set_flashdata('message','Master Type Berhasil Dihapus');
			redirect('ga/master_type');

		
	}

	//Awal kecamatan

	public function master_kecamatan() {

		

			$data['kecamatan'] = $this->ga_model->GetKecamatan();
			$this->template_dua->load('template_dua','ga/sistem/master_kecamatan/index',$data);
		

	}

	public function master_kecamatan_tambah() {

		

			$this->template_dua->load('template_dua','ga/sistem/master_kecamatan/add');
		
	}

	public function master_kecamatan_simpan() {
		

			$this->form_validation->set_rules('nama_ga_master_kecamatan', 'kecamatan', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_dua->load('template_dua','ga/sistem/master_kecamatan/add');
			}
			else {

						$in_data['nama_ga_master_kecamatan'] 	= $this->input->post('nama_ga_master_kecamatan');
						
						$this->db->insert("tbl_ga_master_kecamatan",$in_data);

					$this->session->set_flashdata('berhasil','Master kecamatan Berhasil Disimpan');
					redirect("ga/master_kecamatan");
				
			}
		
	}

	public function master_kecamatan_edit() {
		$id_ga_master_kecamatan = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterkecamatanID($id_ga_master_kecamatan);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_kecamatan']  	= $value['id_ga_master_kecamatan'];
			$data['nama_ga_master_kecamatan']  	= $value['nama_ga_master_kecamatan'];
			
		}

		$this->template_dua->load('template_dua','ga/sistem/master_kecamatan/edit',$data);
	}

	public function master_kecamatan_update() {

		

			$id['id_ga_master_kecamatan'] =  $this->input->post('id_ga_master_kecamatan');

			$in_data['nama_ga_master_kecamatan'] 	= $this->input->post('nama_ga_master_kecamatan');
			

			$this->db->update("tbl_ga_master_kecamatan",$in_data,$id);

			$this->session->set_flashdata('update','Master kecamatan Berhasil Diupdate');
			redirect("ga/master_kecamatan");


		

	}

	public function master_kecamatan_delete(){
		

			$id_ga_master_kecamatan = $this->uri->segment(3);

			$this->ga_model->DeleteMasterkecamatanId($id_ga_master_kecamatan);

			$this->session->set_flashdata('message','Master kecamatan Berhasil Dihapus');
			redirect('ga/master_kecamatan');

		
	}

	//Akhir kecamatan



	public function master_kecamatan_asuransi() {

		

			$data['kecamatan_asuransi'] = $this->ga_model->GetKecamatanAsuransi();
			$this->template_dua->load('template_dua','ga/sistem/master_kecamatan_asuransi/index',$data);
		

	}

	public function master_kecamatan_asuransi_tambah() {

		

			$this->template_dua->load('template_dua','ga/sistem/master_kecamatan_asuransi/add');
		
	}

	public function master_kecamatan_asuransi_simpan() {
		

			$this->form_validation->set_rules('nama_ga_master_kecamatan_asuransi', 'kecamatan', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_dua->load('template_dua','ga/sistem/master_kecamatan_asuransi/add');
			}
			else {

						$in_data['nama_ga_master_kecamatan_asuransi'] 	= $this->input->post('nama_ga_master_kecamatan_asuransi');
						
						$this->db->insert("tbl_ga_master_kecamatan_asuransi",$in_data);

					$this->session->set_flashdata('berhasil','Master kecamatan Asuransi Berhasil Disimpan');
					redirect("ga/master_kecamatan_asuransi");
				
			}
		
	}

	public function master_kecamatan_asuransi_edit() {
		$id_ga_master_kecamatan_asuransi = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterkecamatanAsuransiID($id_ga_master_kecamatan_asuransi);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_kecamatan_asuransi']  	= $value['id_ga_master_kecamatan_asuransi'];
			$data['nama_ga_master_kecamatan_asuransi']  = $value['nama_ga_master_kecamatan_asuransi'];
			
		}

		$this->template_dua->load('template_dua','ga/sistem/master_kecamatan_asuransi/edit',$data);
	}

	public function master_kecamatan_asuransi_update() {

		

			$id['id_ga_master_kecamatan_asuransi'] =  $this->input->post('id_ga_master_kecamatan_asuransi');

			$in_data['nama_ga_master_kecamatan_asuransi'] 	= $this->input->post('nama_ga_master_kecamatan_asuransi');
			

			$this->db->update("tbl_ga_master_kecamatan_asuransi",$in_data,$id);

			$this->session->set_flashdata('update','Master kecamatan Asuransi Berhasil Diupdate');
			redirect("ga/master_kecamatan_asuransi");


		

	}

	public function master_kecamatan_asuransi_delete(){
		

			$id_ga_master_kecamatan_asuransi = $this->uri->segment(3);

			$this->ga_model->DeleteMasterkecamatanId($id_ga_master_kecamatan_asuransi);

			$this->session->set_flashdata('message','Master kecamatan Asuransi Berhasil Dihapus');
			redirect('ga/master_kecamatan_asuransi');

		
	}

	public function master_lising() {

		

			$data['data_master_lising'] = $this->ga_model->GetMasterLising();
			$this->template_dua->load('template_dua','ga/sistem/master_lising/index',$data);
		

	}

	public function master_lising_tambah() {

		

			$this->template_dua->load('template_dua','ga/sistem/master_lising/add');
		
	}

	public function master_lising_simpan() {
		

			$this->form_validation->set_rules('nama_ga_master_lising', 'Lising', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_dua->load('template_dua','ga/sistem/master_lising/add');
			}
			else {

						$in_data['nama_ga_master_lising'] 	= $this->input->post('nama_ga_master_lising');
						$in_data['alamat'] 					= $this->input->post('alamat');
						$in_data['telp'] 					= $this->input->post('telp');
						
						$this->db->insert("tbl_ga_master_lising",$in_data);

					$this->session->set_flashdata('berhasil','Master Lising Berhasil Disimpan');
					redirect("ga/master_lising");
				
			}
		
	}

	public function master_lising_edit() {
		$id_ga_master_lising = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterLisingID($id_ga_master_lising);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_lising']  	= $value['id_ga_master_lising'];
			$data['nama_ga_master_lising']  	= $value['nama_ga_master_lising'];
			$data['alamat']  					= $value['alamat'];
			$data['telp']  						= $value['telp'];
			
		}

		$this->template_dua->load('template_dua','ga/sistem/master_lising/edit',$data);
	}

	public function master_lising_update() {

		

			$id['id_ga_master_lising'] =  $this->input->post('id_ga_master_lising');

			$in_data['nama_ga_master_lising'] 	= $this->input->post('nama_ga_master_lising');
			$in_data['alamat'] 					= $this->input->post('alamat');
			$in_data['telp'] 					= $this->input->post('telp');
			

			$this->db->update("tbl_ga_master_lising",$in_data,$id);

			$this->session->set_flashdata('update','Master Lising Berhasil Diupdate');
			redirect("ga/master_lising");


		

	}

	public function master_lising_delete(){
		

			$id_ga_master_lising = $this->uri->segment(3);

			$this->ga_model->DeleteMasterLisingId($id_ga_master_lising);

			$this->session->set_flashdata('message','Master Lising Berhasil Dihapus');
			redirect('ga/master_lising');

		
	}

	//Awal Ga GPS

	public function gps() {
		

			$data['data_gps'] =  $this->ga_model->GetGps();
			$this->template_dua->load('template_dua','ga/sistem/gps/index',$data);

		
	}

	public function gps_tambah () {
		

			// $data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
			$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/gps/add',$data);

		
	}

	public function gps_simpan () {
		

			$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
			$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
			$this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
			$this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir', 'required');
			$this->form_validation->set_rules('nominal', 'Nominal Pulsa GPS', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				
				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
				$this->template_dua->load('template_dua','ga/sistem/gps/add',$data);
			}
			else {

						$in_data['no_telp'] 				= $this->input->post('no_telp');
						$in_data['tgl_join'] 				= $this->input->post('tgl_join');
						$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
						$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
						$in_data['master_login_id'] 		= $this->session->userdata("id_master_login");
						$in_data['status'] 					= "0";
						$in_data['nominal'] 				= $this->input->post('nominal');
						
						$this->db->insert("tbl_ga_gps",$in_data);

					$this->session->set_flashdata('berhasil','GPS Berhasil Disimpan');
					redirect("ga/gps");
				
			}

		
	}

	public function gps_edit() {
		

			$id_ga_gps = $this->uri->segment(3);

			$query =  $this->ga_model->EditGpsId($id_ga_gps);

			foreach ($query->result_array() as $value) {
				$data['id_ga_gps']  			= $value['id_ga_gps'];
				$data['no_telp']  				= $value['no_telp'];
				$data['tgl_join']  				= $value['tgl_join'];
				$data['tgl_berakhir']  			= $value['tgl_berakhir'];
				$data['ga_stnk_id']  			= $value['ga_stnk_id'];
				$data['nominal']  				= $value['nominal'];
			}

				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/gps/edit',$data);

		
	}

	public function gps_update () {
		

			$id['id_ga_gps'] =  $this->input->post('id_ga_gps');

			$in_data['no_telp'] 				= $this->input->post('no_telp');
			$in_data['tgl_join'] 				= $this->input->post('tgl_join');
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
			$in_data['nominal'] 				= $this->input->post('nominal');

			$this->db->update("tbl_ga_gps",$in_data,$id);

			$this->session->set_flashdata('update','Gps Berhasil Diupdate');
			redirect("ga/gps");

		
	}

	public function gps_delete () {
		

			$id_ga_gps =  $this->uri->segment(3);

			$this->ga_model->DeleteGpsId($id_ga_gps);
			
			$this->session->set_flashdata('message','Gps Berhasil Dihapus');
			redirect('ga/gps');

		
	}

	public function gps_detail () {
		

			$id_ga_gps =  $this->uri->segment(3);

			$data['data_gps'] =  $this->ga_model->DetailGpsId($id_ga_gps);

			$this->template_dua->load('template_dua','ga/sistem/gps/show',$data);

		
	}

	public function gps_batas() {
		

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
            $tahun = date('Y');

            $data['data_gps'] =  $this->ga_model->GetGpsExpired($bulan1,$bulan,$tahun);
            $data['data_gps_total'] =  $this->ga_model->GetGpsExpiredTotal($bulan1,$bulan,$tahun);

            $this->template_dua->load('template_dua','ga/sistem/gps/exspired',$data);



		
	}

	public function gps_batas_edit() {
		

			$id_ga_gps = $this->uri->segment(3);

			$query =  $this->ga_model->EditGpsId($id_ga_gps);

			foreach ($query->result_array() as $value) {
				$data['id_ga_gps']  			= $value['id_ga_gps'];
				$data['no_telp']  				= $value['no_telp'];
				$data['tgl_join']  				= $value['tgl_join'];
				$data['tgl_berakhir']  			= $value['tgl_berakhir'];
				$data['ga_stnk_id']  			= $value['ga_stnk_id'];
				$data['nominal']  			= $value['nominal'];
			}

				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/gps/exspired_edit',$data);

		
	}

	public function gps_batas_update() {
		

			$id['id_ga_gps'] =  $this->input->post('id_ga_gps');

			
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			

			$this->db->update("tbl_ga_gps",$in_data,$id);

			$this->session->set_flashdata('update','GPS Berhasil Diperpanjang');
			redirect("ga/gps_batas");

		
	}

	public function gps_batas_excel() {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_perpanjangan_gps.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

            $data['data_gps'] =  $this->ga_model->GetGpsExpired($bulan2,$bulan1,$bulan,$tahun);
            $data['data_gps_total'] =  $this->ga_model->GetGpsExpiredTotal($bulan2,$bulan1,$bulan,$tahun);
			
			$this->load->view('ga/sistem/gps/cetak_perpanjangan_gps',$data);
		

	}

	//Akhir Ga GPS


	//Awal Ga KIR

	public function kir() {
		

			$data['data_kir'] =  $this->ga_model->GetKir();
			$this->template_dua->load('template_dua','ga/sistem/kir/index',$data);

		
	}

	public function kir_tambah () {
		

			// $data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
			$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/kir/add',$data);

		
	}

	public function kir_simpan () {
		

			$this->form_validation->set_rules('no_kir', 'Nomor Kir', 'required');
			$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
			$this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
			$this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir', 'required');
			$this->form_validation->set_rules('nominal', 'Nominal KIR', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				
				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
				$this->template_dua->load('template_dua','ga/sistem/kir/add',$data);
			}
			else {

						$in_data['no_kir'] 					= $this->input->post('no_kir');
						$in_data['tgl_join'] 				= $this->input->post('tgl_join');
						$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
						$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
						$in_data['master_login_id'] 		= $this->session->userdata("id_master_login");
						$in_data['nominal'] 				= $this->input->post('nominal');
						$in_data['status'] 					= "0";
						
						$this->db->insert("tbl_ga_kir",$in_data);

					$this->session->set_flashdata('berhasil','KIR Berhasil Disimpan');
					redirect("ga/kir");
				
			}

		
	}

	public function kir_edit() {
		

			$id_ga_kir = $this->uri->segment(3);

			$query =  $this->ga_model->EditKirId($id_ga_kir);

			foreach ($query->result_array() as $value) {
				$data['id_ga_kir']  			= $value['id_ga_kir'];
				$data['no_kir']  				= $value['no_kir'];
				$data['tgl_join']  				= $value['tgl_join'];
				$data['tgl_berakhir']  			= $value['tgl_berakhir'];
				$data['ga_stnk_id']  			= $value['ga_stnk_id'];
				$data['nominal']  				= $value['nominal'];
			}

				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/kir/edit',$data);

		
	}

	public function kir_update () {
		

			$id['id_ga_kir'] =  $this->input->post('id_ga_kir');

			$in_data['no_kir'] 				= $this->input->post('no_kir');
			$in_data['tgl_join'] 				= $this->input->post('tgl_join');
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
			$in_data['nominal'] 				= $this->input->post('nominal');

			$this->db->update("tbl_ga_kir",$in_data,$id);

			$this->session->set_flashdata('update','Kir Berhasil Diupdate');
			redirect("ga/kir");

		
	}

	public function kir_delete () {
		

			$id_ga_kir =  $this->uri->segment(3);

			$this->ga_model->DeleteKirId($id_ga_kir);
			
			$this->session->set_flashdata('message','Kir Berhasil Dihapus');
			redirect('ga/kir');

		
	}

	public function kir_detail () {
		

			$id_ga_kir =  $this->uri->segment(3);

			$data['data_kir'] =  $this->ga_model->DetailKirId($id_ga_kir);

			$this->template_dua->load('template_dua','ga/sistem/kir/show',$data);

		
	}

	public function kir_batas() {
		

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

            $data['data_kir'] =  $this->ga_model->GetKirExpired($bulan2,$bulan1,$bulan,$tahun);
            $data['data_kir_total'] =  $this->ga_model->GetKirExpiredTotal($bulan2,$bulan1,$bulan,$tahun);

            $this->template_dua->load('template_dua','ga/sistem/kir/exspired',$data);



		
	}

	public function kir_batas_edit() {
		

			$id_ga_kir = $this->uri->segment(3);

			$query =  $this->ga_model->EditKirId($id_ga_kir);

			foreach ($query->result_array() as $value) {
				$data['id_ga_kir']  			= $value['id_ga_kir'];
				$data['no_kir']  				= $value['no_kir'];
				$data['tgl_join']  				= $value['tgl_join'];
				$data['tgl_berakhir']  			= $value['tgl_berakhir'];
				$data['ga_stnk_id']  			= $value['ga_stnk_id'];
				$data['nominal']  				= $value['nominal'];
			}

				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua','ga/sistem/kir/exspired_edit',$data);

		
	}

	public function kir_batas_update() {
		

			$id['id_ga_kir'] =  $this->input->post('id_ga_kir');

			
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			

			$this->db->update("tbl_ga_kir",$in_data,$id);

			$this->session->set_flashdata('update','KIR Berhasil Diperpanjang');
			redirect("ga/kir_batas");

		
	}

	public function kir_batas_excel() {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_perpanjangan_kir.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$bulan=  date('m', strtotime("+2 month"));
			$bulan1=  date('m', strtotime("+1 month"));
			$bulan2=  date('m');
            $tahun = date('Y');

            $data['data_kir'] =  $this->ga_model->GetKirExpired($bulan2,$bulan1,$bulan,$tahun);
            $data['data_kir_total'] =  $this->ga_model->GetKirExpiredTotal($bulan2,$bulan1,$bulan,$tahun);
			
			$this->load->view('ga/sistem/kir/cetak_perpanjangan_kir',$data);
		

	}

	//Akhir Ga KIR

	//Awal Backup Database

	public function database () {
		

			$this->load->helper('download');
			$tanggal=date('Ymd-His');
			$namaFile=$tanggal . '.sql.zip';
			$this->load->dbutil();
			$backup=& $this->dbutil->backup();
			force_download($namaFile, $backup);

		
	}
	//Akhir Backup Database

	//Awal GA Perolehan

	public function perolehan() {
		

			$data['data_perolehan'] =  $this->ga_model->GetPerolehan();
			$this->template_dua->load('template_dua','ga/sistem/perolehan/index',$data);

		
	}

	public function perolehan_tambah () {
		

			// $data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
			$data['data_sptrd'] 					=  $this->ga_model->GetStnk();
			$data['data_klasifikasi_kendaraan'] =  $this->ga_model->GetKlasifikasiKendaraan();
			$this->template_dua->load('template_dua','ga/sistem/perolehan/add',$data);

		
	}

	public function perolehan_simpan () {
		


			$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
			$this->form_validation->set_rules('ga_master_klasifikasi_kendaraan_id', 'Klasifikasi Kendaraan', 'required');
			$this->form_validation->set_rules('tgl_perolehan', 'Tanggal Perolehan', 'required');
			$this->form_validation->set_rules('nilai_perolehan', 'Nilai Perolehan', 'required');
			
			

			if ($this->form_validation->run() == FALSE)
			{
				
				$data['data_sptrd'] 				=  $this->ga_model->GetStnk();
				$this->template_dua->load('template_dua','ga/sistem/perolehan/add',$data);
			}
			else {

						
						$in_data['tgl_perolehan'] 						= $this->input->post('tgl_perolehan').'-00';
						$in_data['nilai_perolehan'] 					= $this->input->post('nilai_perolehan');
						$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
						$in_data['ga_master_klasifikasi_kendaraan_id'] 	= $this->input->post('ga_master_klasifikasi_kendaraan_id');
						
						
						$this->db->insert("tbl_sptrd_perolehan",$in_data);

						// echo $this->db->last_query();
						// die;

					$this->session->set_flashdata('berhasil','Perolehan STNK Berhasil Disimpan');
					redirect("ga/perolehan");
				
			}

		
	}

	public function perolehan_edit() {
		

			$id_sptrd_perolehan = $this->uri->segment(3);

			$query =  $this->ga_model->EditPerolehanId($id_sptrd_perolehan);

			foreach ($query->result_array() as $value) {
				$data['id_sptrd_perolehan']  				= $value['id_sptrd_perolehan'];
				$data['tgl_perolehan']  					= $value['tgl_perolehan'];
				$data['nilai_perolehan']  					= $value['nilai_perolehan'];
				$data['ga_stnk_id']  						= $value['ga_stnk_id'];
				$data['ga_master_klasifikasi_kendaraan_id'] = $value['ga_master_klasifikasi_kendaraan_id'];

			}

				$data['data_sptrd'] 					=  $this->ga_model->GetStnk();
				$data['data_klasifikasi_kendaraan'] =  $this->ga_model->GetKlasifikasiKendaraan();
			$this->template_dua->load('template_dua','ga/sistem/perolehan/edit',$data);

		
	}

	public function perolehan_update () {
		

			$id['id_sptrd_perolehan'] =  $this->input->post('id_sptrd_perolehan');

			$in_data['tgl_perolehan'] 						= $this->input->post('tgl_perolehan');
			$in_data['tgl_perolehan'] 						= $this->input->post('tgl_perolehan');
			$in_data['nilai_perolehan'] 					= $this->input->post('nilai_perolehan');
			$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
			$in_data['ga_master_klasifikasi_kendaraan_id'] 	= $this->input->post('ga_master_klasifikasi_kendaraan_id');


			$this->db->update("tbl_sptrd_perolehan",$in_data,$id);

			$this->session->set_flashdata('update','Perolehan STNK Berhasil Diupdate');
			redirect("ga/perolehan");

		
	}

	public function perolehan_delete () {
		

			$id_sptrd_perolehan =  $this->uri->segment(3);

			$this->ga_model->DeletePerolehanId($id_sptrd_perolehan);
			
			$this->session->set_flashdata('message','Perolehan STNK Berhasil Dihapus');
			redirect('ga/perolehan');

		
	}

	public function perolehan_detail () {
		

			$id_sptrd_perolehan =  $this->uri->segment(3);

			$data['data_perolehan'] =  $this->ga_model->DetailPerolehanId($id_sptrd_perolehan);

			$this->template_dua->load('template_dua','ga/sistem/perolehan/show',$data);

		
	}

	public function perolehan_cetak_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_perolehan_stnk.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$data['data_perolehan'] =  $this->ga_model->GetPerolehan();
			$this->load->view('ga/sistem/perolehan/excel',$data);

		


	}

	//Awal Klasifikasi Kendaraan

	public function klasifikasi_kendaraan() {

		

			$data['data_klasifikasi_kendaraan'] = $this->ga_model->GetKlasifikasiKendaraan();
			$this->template_dua->load('template_dua','ga/sistem/klasifikasi_kendaraan/index',$data);
		

	}

	public function klasifikasi_kendaraan_tambah() {

		

			$this->template_dua->load('template_dua','ga/sistem/klasifikasi_kendaraan/add');
		
	}

	public function klasifikasi_kendaraan_simpan() {
		

			$this->form_validation->set_rules('nama_ga_master_klasifikasi_kendaraan', 'Klasifikasi Kendaraan', 'required');
			$this->form_validation->set_rules('nilai', 'Nilai', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_dua->load('template_dua','ga/sistem/klasifikasi_kendaraan/add');
			}
			else {

						$in_data['nama_ga_master_klasifikasi_kendaraan'] 	= $this->input->post('nama_ga_master_klasifikasi_kendaraan');
						$in_data['nilai'] 									= $this->input->post('nilai');
						
						$this->db->insert("tbl_ga_master_klasifikasi_kendaraan",$in_data);

					$this->session->set_flashdata('berhasil','KlasifikasiKendaraan Berhasil Disimpan');
					redirect("ga/klasifikasi_kendaraan");
				
			}
		
	}

	public function klasifikasi_kendaraan_edit() {
		$id_ga_master_klasifikasi_kendaraan = $this->uri->segment(3);

		$query  = $this->ga_model->EditKlasifikasiKendaraanID($id_ga_master_klasifikasi_kendaraan);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_klasifikasi_kendaraan']  	= $value['id_ga_master_klasifikasi_kendaraan'];
			$data['nama_ga_master_klasifikasi_kendaraan']  	= $value['nama_ga_master_klasifikasi_kendaraan'];
			$data['nilai']  								= $value['nilai'];
			
		}

		$this->template_dua->load('template_dua','ga/sistem/klasifikasi_kendaraan/edit',$data);
	}

	public function klasifikasi_kendaraan_update() {

		

			$id['id_ga_master_klasifikasi_kendaraan'] =  $this->input->post('id_ga_master_klasifikasi_kendaraan');

			$in_data['nama_ga_master_klasifikasi_kendaraan'] 	= $this->input->post('nama_ga_master_klasifikasi_kendaraan');
			$in_data['nilai'] 									= $this->input->post('nilai');
			

			$this->db->update("tbl_ga_master_klasifikasi_kendaraan",$in_data,$id);

			$this->session->set_flashdata('update','Klasifikasi Kendaraan Berhasil Diupdate');
			redirect("ga/klasifikasi_kendaraan");


		

	}

	public function klasifikasi_kendaraan_delete(){
		

			$id_ga_master_klasifikasi_kendaraan = $this->uri->segment(3);

			$this->ga_model->DeleteKlasifikasiKendaraanId($id_ga_master_klasifikasi_kendaraan);

			$this->session->set_flashdata('message','Klasifikasi Kendaraan Berhasil Dihapus');
			redirect('ga/klasifikasi_kendaraan');

		
	}

	public function perolehan_cek () {

			$data['data_perolehan'] =  $this->ga_model->GetPerolehan();
			$data['pilihan']	=  $this->input->post("pilihan");
			$this->load->view('ga/sistem/perolehan/pilih',$data);
		
		
	}

	//Akhir Klasifikasi Kendaraan





	//Awal Laporan

	public function laporan_tahun_pendataan() {

		

			$data['data_tahun'] =  $this->ga_model->GetTahunPendataan();
			// $data['data_lising'] =  $this->ga_model->GetMasterLising();
			$this->template_dua->load('template_dua','ga/sistem/laporan/laporan_tahun_pendataan',$data);

		

	}

	public function laporan_tahun_pendataan_cek () {

		

		$tahun = $this->input->post("tahun");
		$data['data_tahun'] =  $tahun;

		$data['data_sptrd'] =  $this->ga_model->GetTahunPendataanTahun($tahun);
		$this->load->view('ga/sistem/laporan/laporan_tahun_pendataan_cek',$data);

		
	}

	public function laporan_tahun_pendataan_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_tahun_pendataan_stnk.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$tahun = $this->uri->segment(3);
			$data['data_tahun'] =  $tahun;
			$data['data_sptrd'] =  $this->ga_model->GetTahunPendataanTahun($tahun);
			$this->load->view('ga/sistem/laporan/laporan_tahun_pendataan_cetak',$data);

		

	}

	public function laporan_tahun_pembayaran_status_cek () {
		

		$status = $this->input->post("status");
		$data['data_status'] =  $status;

		$data['data_sptrd'] =  $this->ga_model->GetStatusSptrd($status);
		$this->load->view('ga/sistem/laporan/laporan_status_pembayaran_cek',$data);

		
	}

	public function laporan_status_kendaraan_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_status_kendaraan_excel.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$status = $this->uri->segment(3);
			
			$data['data_status'] =  $status;

			$data['data_sptrd'] =  $this->ga_model->GetStatusStnk($status);
			$this->load->view('ga/sistem/laporan/laporan_status_kendaraan_cetak',$data);

		

	}

	public function laporan_lising_stnk_cek () {

		

		$lising = $this->input->post("lising");
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_sptrd'] =  $this->ga_model->GetStnkLising($lising);
		$this->load->view('ga/sistem/laporan/laporan_lising_stnk_cek',$data);

		
	}

	public function laporan_lising_stnk_excel () {
		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_leasing_stnk_excel.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$lising = $this->uri->segment(3);
			
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkLising($lising);
			$this->load->view('ga/sistem/laporan/laporan_lising_stnk_cetak',$data);

		
	}

	public function laporan_tahun_status_lising_cek () {
		

			$tahun 	=  $this->input->post("tahun");
			$status =  $this->input->post("status");
			$lising =  $this->input->post("lising");

			$data['data_tahun'] =  $tahun;
			$data['data_status'] =  $status;
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkTahunStatusLising($tahun,$status,$lising);
			$this->load->view('ga/sistem/laporan/laporan_tahun_status_lising_stnk_cek',$data);



		
	}

	public function laporan_tahun_status_lising_stnk_excel () {
		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_tahun_status_leasing_stnk_excel.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			
			
			$tahun 	=  $this->uri->segment(3);
			$status =  $this->uri->segment(4);
			$lising =  $this->uri->segment(5);

			$data['data_tahun'] =  $tahun;
			$data['data_status'] =  $status;
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkTahunStatusLising($tahun,$status,$lising);
			$this->load->view('ga/sistem/laporan/laporan_tahun_status_lising_stnk_cetak',$data);
			

		
	}

	public function laporan_tahun_pembayaran_cek () {
		

			$tahun 	=  $this->input->post("tahun");
			$status =  $this->input->post("status");
			

			$data['data_tahun'] =  $tahun;
			$data['data_status'] =  $status;
			

			$data['data_sptrd'] =  $this->ga_model->GetSptrdTahunStatus($tahun,$status);
			$this->load->view('ga/sistem/laporan/laporan_tahun_status_pembayaran_cek',$data);



		
	}

	public function laporan_tahun_status_stnk_excel () {
		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_tahun_status_stnk_excel.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			
			
			$tahun 	=  $this->uri->segment(3);
			$status =  $this->uri->segment(4);
		

			$data['data_tahun'] =  $tahun;
			$data['data_status'] =  $status;
			

			$data['data_sptrd'] =  $this->ga_model->GetStnkTahunStatus($tahun,$status);
			$this->load->view('ga/sistem/laporan/laporan_tahun_status_stnk_cetak',$data);
			

		
	}

	public function laporan_tahun_lising_cek () {
		

			$tahun 	=  $this->input->post("tahun");
			$lising =  $this->input->post("lising");

			$data['data_tahun'] =  $tahun;
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkTahunLising($tahun,$lising);
			$this->load->view('ga/sistem/laporan/laporan_tahun_lising_stnk_cek',$data);
		



		
	}

	public function laporan_tahun_lising_stnk_excel () {
		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_tahun_leasing_stnk_excel.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			
			
			$tahun 	=  $this->uri->segment(3);
			$lising =  $this->uri->segment(4);

			$data['data_tahun'] =  $tahun;
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkTahunLising($tahun,$lising);
			$this->load->view('ga/sistem/laporan/laporan_tahun_lising_stnk_cetak',$data);
			

		
	}

	public function laporan_status_lising_cek () {

		

			
			$status =  $this->input->post("status");
			$lising =  $this->input->post("lising");

		
			$data['data_status'] =  $status;
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkStatusLising($status,$lising);
			$this->load->view('ga/sistem/laporan/laporan_status_lising_stnk_cek',$data);



		


	}

	public function laporan_status_lising_stnk_excel () {
		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_status_leasing_stnk_excel.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			
			
			
			$status =  $this->uri->segment(3);
			$lising =  $this->uri->segment(4);

			$data['data_status'] =  $status;
			$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

			$data['data_sptrd'] =  $this->ga_model->GetStnkStatusLising($status,$lising);
			$this->load->view('ga/sistem/laporan/laporan_status_lising_stnk_cetak',$data);
			

		
	}
	//Akhir Laporannnn



	//Awal Laporan Kir Tahun
	public function laporan_tahun_kir () {

		


            $tahun = date('Y');

            $data['data_kir'] =  $this->ga_model->GetTahunKir($tahun);
            $this->template_dua->load('template_dua','ga/sistem/laporan/laporan_tahun_kir',$data);


		

	}

	public function laporan_tahun_kir_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_kir.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$tahun = date('Y');

            $data['data_kir'] =  $this->ga_model->GetTahunKir($tahun);

			$this->load->view('ga/sistem/laporan/laporan_tahun_kir_excel',$data);

		


	}
	//Akhir Laporan Kir Tahun

	//Awal Laporan Asuransi Tahun
	public function laporan_tahun_asuransi () {

		


            $tahun = date('Y');

            $data['data_asuransi'] =  $this->ga_model->GetTahunAsuransi($tahun);
            $this->template_dua->load('template_dua','ga/sistem/laporan/laporan_tahun_asuransi',$data);


		

	}

	public function laporan_tahun_asuransi_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_asuransi.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$tahun = date('Y');

            $data['data_asuransi'] =  $this->ga_model->GetTahunAsuransi($tahun);

			$this->load->view('ga/sistem/laporan/laporan_tahun_asuransi_excel',$data);

		


	}
	//Akhir Laporan Asuransi Tahun

	//Awal Laporan PAJAK STNK Tahun
	public function laporan_tahun_retribusi_sptrd () {

		


            $tahun = date('Y');

            $data['data_sptrd'] 	= $this->ga_model->GetRetribusiSptrdTahun($tahun);
            $data['total']		= $this->ga_model->GetRetribusiSptrdTahunTotal($tahun);

            $this->template_dua->load('template_dua','ga/sistem/laporan/laporan_tahun_retribusi_sptrd',$data);


		

	}

	public function laporan_tahun_pajak_stnk_excel () {

		

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=cetak_retribusi_sptrd.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			$tahun = date('Y');

            $data['data_sptrd'] 	= $this->ga_model->GetRetribusiSptrdTahun($tahun);

			$this->load->view('ga/sistem/laporan/laporan_tahun_retribusi_sptrd_excel',$data);
		


	}
	//Akhir Laporan PAJAK STNK Tahun
	
}