<?php

class ga_model extends CI_Model {

	function CekGaLogin($data) {

		$username = mysql_real_escape_string($data['username']);
		$password = md5(mysql_real_escape_string($data['password']));

		
		$ceklogin = $this->db->query("select a.*,b.nama_bagian,c.nama_perusahaan from tbl_master_login a join tbl_master_bagian b on a.bagian_id=b.id_master_bagian join tbl_master_perusahaan c on a.perusahaan_id=c.id_master_perusahaan where a.username='$username' and a.password='$password' and a.bagian_id='5' ");

		
		if (count($ceklogin->result())>0) {

			foreach ($ceklogin->result() as $value) {
				$sess_data['logged_in'] 		= 'LoginOke';
				$sess_data['id_master_login']  	= $value->id_master_login;
				$sess_data['username']  		= $value->username;
				$sess_data['password']  		= $value->password;
				$sess_data['nama']  			= $value->nama;
				$sess_data['email']  			= $value->email;
				$sess_data['perusahaan_id']  	= $value->perusahaan_id;
				$sess_data['bagian_id']  		= $value->bagian_id;
				$sess_data['nama_bagian']  		= $value->nama_bagian;
				$sess_data['nama_perusahaan']  	= $value->nama_perusahaan;

				$this->session->set_userdata($sess_data);

			}
			redirect("ga/home");
		}
		else {
			$this->session->set_flashdata("error","Username atau Password Anda Salah!");
			redirect('ga');
		}

	}

	//Awal STNK

	function GetSptrd() {

		return $this->db->query("select a.* from tbl_sptrd a order by a.id_sptrd desc");
	} 

	function EditSptrdId($id_sptrd) {
		return $this->db->query("select * from tbl_sptrd where id_sptrd='$id_sptrd' ");
	}


	function DeleteSptrdId($id_sptrd) {
		return $this->db->query("delete from tbl_sptrd where id_sptrd='$id_sptrd'");
	}

	function ImbSama($imb) {

		return $this->db->query("select * from tbl_sptrd where binary(imb)='$imb' ");
	}

	//AKHIR SATNK

	function GetMasterAsuransi() {
		return $this->db->query("select a.* from tbl_ga_master_asuransi a  order by a.id_ga_master_asuransi desc");
	}

	function EditMasterAsuransiID($id_ga_master_asuransi) {
		return $this->db->query("select * from tbl_ga_master_asuransi where id_ga_master_asuransi='$id_ga_master_asuransi' ");
	}

	function DeleteMasterId($id_ga_master_asuransi) {
		return $this->db->query("delete from tbl_ga_master_asuransi where id_ga_master_asuransi='$id_ga_master_asuransi' ");
	}

	//Awal Asuransi

	function GetAsuransi() {
		return $this->db->query("select a.*,a.nominal as nominal_asuransi,b.*,c.*,d.* from tbl_ga_asuransi a 
		join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd join tbl_master_login d on a.master_login_id=d.id_master_login order by a.id_ga_asuransi desc");
	} 

	function EditAsuransiId($id_ga_asuransi) {
		return $this->db->query("select * from tbl_ga_asuransi where id_ga_asuransi='$id_ga_asuransi' ");
	}

	function DeleteAsuransiId($id_ga_asuransi) {
		return $this->db->query("delete from tbl_ga_asuransi where id_ga_asuransi='$id_ga_asuransi' ");
	}

	function DetailAsuransiId($id_ga_asuransi) {
		return $this->db->query("select a.*,a.nominal as nominal_asuransi,b.*,c.*,d.*,e.*,f.* from tbl_ga_asuransi a join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		join tbl_ga_master_type e on c.type=e.id_ga_master_type
		join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_asuransi='$id_ga_asuransi' ");
	}

	function GetAsuransiExpired($bulan2,$bulan1,$bulan,$tahun) {
		return $this->db->query("select a.*,a.nominal as nominal_asuransi,b.*,c.*,d.* from tbl_ga_asuransi a join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and (month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan')");
	}

	function GetAsuransiExpiredTotal($bulan2,$bulan1,$bulan,$tahun) {
		return $this->db->query("select sum(a.nominal) as total_asuransi from tbl_ga_asuransi a join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and (month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan')");
	}

	//Asuransi

	function GetSptrdGantiTahun($bulan2,$bulan1,$tahun,$bulan) {
		return $this->db->query("select * from tbl_sptrd where year(berlaku_sampai)='$tahun' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_sptrd desc");
	}

	function GetSptrdGantiTahunTotal($bulan2,$bulan1,$tahun,$bulan) {
		return $this->db->query("select sum(nominal) as total from tbl_sptrd where year(berlaku_sampai)='$tahun' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_sptrd desc");
	}

	function GetSptrdPerpanjangRetribusi($bulan2,$bulan1,$bulan) {
		return $this->db->query("select * from tbl_sptrd where status_perpanjang_retribusi='1' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_sptrd desc");
	}
	function GetSptrdPerpanjangRetribusiTotalNominal($bulan2,$bulan1,$bulan) {
		return $this->db->query("select sum(nominal) as total from tbl_sptrd where status_perpanjang_retribusi='1' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_sptrd desc");
	

	//Awal Type 

	}

	//Akhir Type

	//Awal Jenis 

	function GetKecamatan() {
		return $this->db->query("select * from tbl_kecamatan order by id_kecamatan desc");
	}

	function EditKecamatanID($id_kecamatan) {
		return $this->db->query("select * from tbl_kecamatan where id_kecamatan='$id_kecamatan' ");
	}

	function DeleteKecamatanId($id_kecamatan) {
		return $this->db->query("delete from tbl_kecamatan where id_kecamatan='$id_kecamatan' ");
	}

	//Akhir Jenis


	//Awal Jenis Asuransi

	function GetMasterJenisAsuransi() {
		return $this->db->query("select * from tbl_ga_master_jenis_asuransi order by id_ga_master_jenis_asuransi desc");
	}

	function EditMasterJenisAsuransiID($id_ga_master_jenis_asuransi) {
		return $this->db->query("select * from tbl_ga_master_jenis_asuransi where id_ga_master_jenis_asuransi='$id_ga_master_jenis_asuransi' ");
	}

	function DeleteMasterJenisAsuransivId($id_ga_master_jenis_asuransi) {
		return $this->db->query("delete from tbl_ga_master_jenis_asuransi where id_ga_master_jenis_asuransi='$id_ga_master_jenis_asuransi' ");
	}

	function GetMasterJenisAsuransiView() {
		return $this->db->query("select * from tbl_ga_master_jenis_asuransi_view order by id_ga_master_jenis_asuransi desc");
	}

	//Akhir Jenis

	//Awal Lising 

	function GetMasterLising() {
		return $this->db->query("select * from tbl_ga_master_lising order by id_ga_master_lising desc");
	}

	function EditMasterLisingID($id_ga_master_lising) {
		return $this->db->query("select * from tbl_ga_master_lising where id_ga_master_lising='$id_ga_master_lising' ");
	}

	function DeleteMasterLisingId($id_ga_master_lising) {
		return $this->db->query("delete from tbl_ga_master_lising where id_ga_master_lising='$id_ga_master_lising' ");
	}

	//Akhir Lising


	//Awal GPS
	function GetGps() {
		return $this->db->query("select a.*,a.nominal as nominal_gps,c.*,d.* from tbl_ga_gps a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		order by a.id_ga_gps desc");
	} 

	function EditGpsId($id_ga_gps) {
		return $this->db->query("select * from tbl_ga_gps where id_ga_gps='$id_ga_gps' ");
	}

	function DeleteGpsId($id_ga_gps) {
		return $this->db->query("delete from tbl_ga_gps where id_ga_gps='$id_ga_gps' ");
	}

	function DetailGpsId($id_ga_gps) {
		return $this->db->query("select a.*,a.nominal as nominal_gps,c.*,d.*,e.*,f.*
		from tbl_ga_gps a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		join tbl_ga_master_type e on c.type=e.id_ga_master_type
		join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_gps='$id_ga_gps' ");
	}

	function GetGpsExpired($bulan2,$bulan1,$bulan,$tahun) {
		return $this->db->query("select a.*,a.nominal as nominal_gps,c.*,d.* 
		from tbl_ga_gps a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}
	function GetGpsExpiredTotal($bulan2,$bulan1,$bulan,$tahun) {
		return $this->db->query("select sum(a.nominal) as total 
		from tbl_ga_gps a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}
	//Akhir GPS

	//Awal KIR
	function GetKir() {
		return $this->db->query("select a.*,a.nominal as nominal_kir,c.*,d.* from tbl_ga_kir a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		order by a.id_ga_kir desc");
	} 

	function EditKirId($id_ga_kir) {
		return $this->db->query("select * from tbl_ga_kir where id_ga_kir='$id_ga_kir' ");
	}

	function DeleteKirId($id_ga_kir) {
		return $this->db->query("delete from tbl_ga_kir where id_ga_kir='$id_ga_kir' ");
	}

	function DetailKirId($id_ga_kir) {
		return $this->db->query("select a.*,a.nominal as nominal_kir,c.*,d.*,e.*,f.*
		from tbl_ga_kir a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		join tbl_ga_master_type e on c.type=e.id_ga_master_type
		join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_kir='$id_ga_kir' ");
	}

	function GetKirExpired($bulan2,$bulan1,$bulan,$tahun) {
		return $this->db->query("select a.*,a.nominal as nominal_kir,c.*,d.* 
		from tbl_ga_kir a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}

	function GetKirExpiredTotal($bulan2,$bulan1,$bulan,$tahun) {
		return $this->db->query("select sum(a.nominal) as total 
		from tbl_ga_kir a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}
	//Akhir KIR

	//Awal Perolehan
	function GetPerolehan() {
		return $this->db->query("select a.*,((year(curdate())-year(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))) as tahun, 
((month(curdate())-month(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))) as bulan,c.*,d.* from tbl_sptrd_perolehan a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd  
		join tbl_ga_master_klasifikasi_kendaraan d on a.ga_master_klasifikasi_kendaraan_id=d.id_ga_master_klasifikasi_kendaraan
		order by a.id_sptrd_perolehan desc");
	} 

	function GetPerolehanPilhan($pilihan) {
		return $this->db->query("select a.*,((year(curdate())-year(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))) as tahun, 
((month(curdate())-month(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))+$pilihan) as bulan,c.*,d.* from tbl_sptrd_perolehan a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd  
		join tbl_ga_master_klasifikasi_kendaraan d on a.ga_master_klasifikasi_kendaraan_id=d.id_ga_master_klasifikasi_kendaraan
		order by a.id_sptrd_perolehan desc");
	} 

	function EditPerolehanId($id_sptrd_perolehan) {
		return $this->db->query("select * from tbl_sptrd_perolehan where id_sptrd_perolehan='$id_sptrd_perolehan' ");
	}

	function DeletePerolehanId($id_sptrd_perolehan) {
		return $this->db->query("delete from tbl_sptrd_perolehan where id_sptrd_perolehan='$id_sptrd_perolehan' ");
	}

	function DetailPerolehanId($id_sptrd_perolehan) {
		return $this->db->query("select a.*,c.*,e.*,f.*
		from tbl_sptrd_perolehan a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		left join tbl_ga_master_type e on c.type=e.id_ga_master_type
		left join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_sptrd_perolehan='$id_sptrd_perolehan' ");
	}

	//Akhir Perolehan

	//Awal Klasifikasi Kendaraan 

	function GetKlasifikasiKendaraan() {
		return $this->db->query("select * from tbl_ga_master_klasifikasi_kendaraan order by id_ga_master_klasifikasi_kendaraan desc");
	}

	function EditKlasifikasiKendaraanID($id_ga_master_klasifikasi_kendaraan) {
		return $this->db->query("select * from tbl_ga_master_klasifikasi_kendaraan where id_ga_master_klasifikasi_kendaraan='$id_ga_master_klasifikasi_kendaraan' ");
	}

	function DeleteKlasifikasiKendaraanId($id_ga_master_klasifikasi_kendaraan) {
		return $this->db->query("delete from tbl_ga_master_klasifikasi_kendaraan where id_ga_master_klasifikasi_kendaraan='$id_ga_master_klasifikasi_kendaraan' ");
	}

	//Akhir Klasifikasi Kendaraan


	//Awal Laporanfff
	// function GetTahunPembuatan () {
	// 	return $this->db->query("select tahun_pembuatan from tbl_sptrd group by tahun_pembuatan order by tahun_pembuatan asc");
	// }

	// function GetTahunPembuatanTahun ($tahun) {
	// 	return $this->db->query("select * from tbl_sptrd where tahun_pembuatan='$tahun' order by id_sptrd desc");
	// }

	// function GetStatusStnk($status) {
	// 	return $this->db->query("select * from tbl_sptrd where status_kendaraan='$status' order by id_sptrd desc");
	// }

	// function GetMasterLisingID($lising) {
	// 	return $this->db->query("select * from tbl_ga_master_lising where id_ga_master_lising='$lising' ");
	// }

	// function GetSptrdLising($lising) {
	// 	return $this->db->query("select * from tbl_sptrd where ga_master_lising_id='$lising' ");
	// }

	// function GetSptrdTahunStatusLising($tahun,$status,$lising) {
	// 	return $this->db->query("select * from tbl_sptrd where tahun_pembuatan='$tahun' 
	// 		and status_kendaraan='$status'
	// 		and ga_master_lising_id='$lising' 
	// 		order by id_sptrd desc");
	// }


	//Akhir Laporan


	//Awal Laporan
	function GetTahunPendataan () {
		return $this->db->query("select tahun_pendataan from tbl_sptrd group by tahun_pendataan order by tahun_pendataan asc");
	}

	function GetTahunpendataanTahun ($tahun) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		 where a.tahun_pendataan='$tahun' order by a.id_sptrd desc");
	}

	function GetStatusStnk($status) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		 where a.status_kendaraan='$status' order by a.id_sptrd desc");
	}

	function GetMasterLisingID($lising) {
		return $this->db->query("select * from tbl_ga_master_lising where id_ga_master_lising='$lising' ");
	}

	function GetSptrdLising($lising) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		  where a.ga_master_lising_id='$lising' ");
	}

	function GetSptrdTahunStatusLising($tahun,$status,$lising) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		 where a.tahun_pembuatan='$tahun' 
			and a.status_kendaraan='$status'
			and a.ga_master_lising_id='$lising' 
			order by a.id_sptrd desc");
	}

	function GetSptrdTahunStatus($tahun,$status) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		 where a.tahun_pembuatan='$tahun' 
			and a.status_pembayaran='$status'
			order by a.id_sptrd desc");
	}

	function GetSptrdTahunLising($tahun,$lising) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		 where a.tahun_pembuatan='$tahun' 
			and a.ga_master_lising_id='$lising' 
			order by a.id_sptrd desc");
	}

	function GetSptrdStatusLising($status,$lising) {
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_sptrd a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		 where a.status_kendaraan='$status'
			and a.ga_master_lising_id='$lising' 
			order by a.id_sptrd desc");
	}


	//Akhir Laporan


	//Awal Laporan tahun KIR
	function GetTahunKir($tahun) {

		return $this->db->query("select a.*,a.nominal as nominal_kir,month(a.tgl_berakhir) as bulan,c.*,d.* 
		from tbl_ga_kir a 
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun'
		order by a.tgl_berakhir asc");

	}
	//Akhir Laporan Tahun Kir

	//Awal Laporan tahun Asuransi
	function GetTahunAsuransi($tahun) {

		return $this->db->query("select a.*,a.nominal as nominal_asuransi,month(tgl_berakhir) as bulan,b.*,c.*,d.* from tbl_ga_asuransi a 
		join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_sptrd c on a.ga_stnk_id=c.id_sptrd 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun'
		order by a.tgl_berakhir asc");

	}
	//Akhir Laporan Tahun Asuransi

	//Awal Laporan tahun Pajak Stnk
	function GetRetribusiSptrdTahun($tahun) {

		return $this->db->query("select *,month(berlaku_sampai) as bulan from tbl_sptrd where year(berlaku_sampai)='$tahun'
		order by month(berlaku_sampai) asc");

	}

	function GetRetribusiSptrdTahunTotal($tahun) {

		return $this->db->query("select count(id_sptrd) as total from tbl_sptrd where year(berlaku_sampai)='$tahun'
		order by berlaku_sampai asc");

	}
	//Akhir Laporan Tahun Pajak Stnk


}