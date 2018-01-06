<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$infoDojo = null;
		$nameUser = null;
		$listAnggota = null;
		$iuran = 0;
		$hutang = 0;
		$piutang = 0;
		$pemasukan = 0;
		$pengeluaran = 0;
		$saldoDojo = 0;
		if($this->session->has_userdata('login')){
			$query = $this->Model->ambil("id",$_SESSION['login'],"tbl_user");
			foreach($query->result_array() as $result){
				$nameUser = $result['nama'];
				if($_SESSION['jabatan']== 'Admin Kabupaten'){
					$listAnggota = $this->Model->list_data_all('tbl_user')->result_array();
				}else{
					
					$infoDojo = $this->Model->ambil("kode_dojo",$result['kode_dojo'],"tbl_dojo")->result_array();
					$listAnggota = $this->Model->ambil("kode_dojo",$result['kode_dojo'],"tbl_user")->result_array();	
				}
			}
			if($infoDojo != null){
				foreach ($infoDojo as $key => $value) {
					# menghitung total iuran
					$queryIuran = $this->Model->ambil("kode_dojo",$value['kode_dojo'],"tbl_iuran")->result_array();
					foreach ($queryIuran as $key => $value) {
						# code...
						$iuran += $value['besaran_iuran'];
					}

					# menghitung total hutang
					$queryHutang = $this->Model->ambil("kode_dojo",$value['kode_dojo'],"tbl_hutang")->result_array();
					foreach ($queryHutang as $key => $value) {
						# code...
						$hutang += $value['besaran_hutang'];
					}

					# menghitung total piutang
					$queryPiutang = $this->Model->ambil("kode_dojo",$value['kode_dojo'],"tbl_piutang")->result_array();
					foreach ($queryPiutang as $key => $value) {
						# code...
						$piutang += $value['besaran_piutang'];
					}

					# menghitung total pengeluaran
					$queryPengeluaran = $this->Model->ambil("kode_dojo",$value['kode_dojo'],"tbl_pengeluaran")->result_array();
					foreach ($queryPengeluaran as $key => $value) {
						# code...
						$pengeluaran += $value['besaran_pengeluaran'];
					}

					# menghitung total pemasukan
					$queryPemasukan = $this->Model->ambil("kode_dojo",$value['kode_dojo'],"tbl_pemasukan")->result_array();
					foreach ($queryPemasukan as $key => $value) {
						# code...
						$pemasukan += $value['besaran_pemasukan'];
					}

					$saldoDojo += ($pemasukan + $iuran + $piutang) - ($hutang + $pengeluaran);
				}
				
			}
		}else{
			$_SESSION['login'] = null;
			$_SESSION['level'] = null;
			$_SESSION['nama'] = null;
			$_SESSION['kode_dojo'] = null;
			$_SESSION['nama_dojo'] = null;
			$_SESSION['jabatan'] = null;
			$_SESSION['kode_kabupaten_kota'] = null;
			$_SESSION['kode_provinsi'] = null;
			$_SESSION['kode_negara'] = null;
		}
		
		$data = array(
			'saldoDojo' => $saldoDojo,
			'listAnggota' => $listAnggota,
			'nameUser' => $nameUser,
			'page' => 'home',
			'link' => 'home'
		);

		$this->load->view('template/wrapper', $data);
	}
}
