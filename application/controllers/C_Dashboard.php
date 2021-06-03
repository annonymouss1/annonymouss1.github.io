<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
	    $this->load->model('M_MasterData');
	}

	public function index()
	{
		if (empty($this->session->userdata('username'))) {
			$this->login();
		}else{		
			$data['content'] = 'dashboard.php';
			$this->load->view('template',$data);
		}
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$post=$this->input->post();
		$user = $this->M_MasterData->get_user($post['username']);
		if ($user->num_rows() == 1) {
			$row = $user->row();
			if ($post['password'] == $row->password) {
				$sess = array('username' 	=> $row->id_user,
							  'nama_user' 	=> $row->nama_user,
							  'hak_akses' 	=> $row->hak_akses,
							  'dept' 		=> $row->dept,
							  'foto' 		=> $row->foto,
							 );
				$this->session->set_userdata($sess);
				echo "<script>
					alert ('Selamat Datang');
					window.location='" . base_url('index.php/C_Dashboard') . "';
				</script>";
				// echo "<script>window.location=".base_url('index.php/C_Dashboard')."</script>";
			}else{
				echo "<script>
					alert ('Password Salah');
					window.location='" . base_url('index.php/C_Dashboard') . "';
				</script>";
			}
		}else{
				echo "<script>
					alert ('Username Tidak Ditemukan');
					window.location='" . base_url('index.php/C_Dashboard') . "';
				</script>";
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}

}
