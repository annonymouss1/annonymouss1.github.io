<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterData extends CI_Controller {

	function __construct(){
		parent::__construct();
	    $this->load->model('M_MasterData');
	}

	public function list_transport()
	{
		$data['content'] 	= 'master_data/transport/list.php';
		$data['transport']	= $this->M_MasterData->get_transport();
		$this->load->view('template',$data);
	}

	public function list_limbah()
	{
		$data['content'] 	= 'master_data/limbah/list.php';
		$data['limbah']	= $this->M_MasterData->get_limbah();
		$this->load->view('template',$data);
	}
	public function list_driver()
	{
		$data['content'] 	= 'master_data/driver/list.php';
		// $data['limbah']	= $this->M_MasterData->get_limbah();
		$this->load->view('template',$data);
	}
}
