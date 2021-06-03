<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Transaction extends CI_Controller {

	function __construct(){
		parent::__construct();
	    $this->load->model('M_Transaction');
	    $this->load->model('M_MasterData');
	}

	public function scheduler()
	{
		$data['content'] 	= 'transaction/scheduler/list.php';
		$data['schedule']	= $this->M_Transaction->get_schedule();
		$data['perusahaan']	= $this->M_MasterData->get_perusahaan();
		$data['limbah']	= $this->M_MasterData->get_limbah();
		$data['driver']	= $this->M_MasterData->get_free_driver();
		$data['transport']	= $this->M_MasterData->get_free_transport();
		$this->load->view('template',$data);
	}

	public function add_schedule()
	{
		$post = $this->input->post();
		$data = array('customer' 	=> $post['customer'],
					  'kode_limbah'	=> $post['limbah'],
					  'tujuan_awal'	=> $post['tujuan'],
					  'tgl_request'	=> $post['tgl_request'],
					  'qty_plan'	=> $post['qty_plan'],
					  'tgl_input'	=> date('Y-m-d'),
					 );
		$insert = $this->db->insert('tb_transaksi_pengangkutan',$data);
		if ($insert) {
			echo "<script>
				alert ('Data Berhasil Disimpan');
				window.location='" . base_url('index.php/C_Transaction/scheduler') . "';
			</script>";
		}else{
			echo "<script>
				alert ('Terjadi Kesalahan Penyimpanan Data');
				window.location='" . base_url('index.php/C_Transaction/scheduler') . "';
			</script>";
		}
	}

	public function get_transaction_ajax()
	{
		$post = $this->input->post();
		// exit(var_dump($_POST));
		$row = $this->M_Transaction->get_schedule($post['id_transaksi'])->row_array();
		$data=array('id_transaksi'		=> $row['id_transaksi'],
					'nama_perusahaan'	=> $row['customer'],
					'limbah'			=> $row['jenis_limbah'],
					'hari'				=> date('l',strtotime($row['tgl_request'])),
					'tanggal'			=> date('d-M-Y',strtotime($row['tgl_request'])),
					'qty_plan'			=> $row['qty_plan'],
				   );
		echo json_encode($data);

	}

	public function approval()
	{
		$post = $this->input->post();
		// exit(var_dump($post));
		if ($post['penyetujuan'] == 'setuju') {
			$penyetujuan = 1;
		}else if ($post['penyetujuan'] == 'tolak') {
			$penyetujuan = 2;
		}

		$data = array('id_transaksi' 	=> $post['id_transaksi'],
					  'status_angkut'	=> $penyetujuan,
					 );

		$update = $this->M_Transaction->approval($data);
// exit(var_dump($penyetujuan,$update));
		if ($update && $penyetujuan == 1) {
			echo "approve";
		}else if ($update && $penyetujuan == 2) {
			echo "reject";
		}else{
			echo "gagal";
		}

	}

	public function add_detail_schedule()
	{
		$post = $this->input->post();
		$data = array('driver' 			=> $post['driver'],
					  'no_mobil'		=> $post['no_mobil'],
					  'tujuan_akhir'	=> $post['tujuan'],
					  'status_angkut'	=> 3,
					  'qty_actual'		=> $post['qty_actual'],
					  'id_transaksi'	=> $post['id_transaksi'],
					 );
		$update_driver = $this->M_MasterData->book_driver($post['driver']);
		$add_detail = $this->M_Transaction->add_detail($data);
		// $this->db->error();
	    // exit(var_dump($post));
		if ($add_detail) {
			echo "<script>
				alert ('Data Berhasil Disimpan');
				window.location='" . base_url('index.php/C_Transaction/scheduler') . "';
			</script>";
		}else{
			echo "<script>
				alert ('Terjadi Kesalahan Penyimpanan Data');
				window.location='" . base_url('index.php/C_Transaction/scheduler') . "';
			</script>";
		}
	}
}
