<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load->model('shopping_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}
	public function shopping_order(){

		$this->load->library('pagination');
		$total=$this->shopping_model->get_total_orders();
		$config['base_url'] = site_url('welcome/shopping_order');
		$config['total_rows'] = $total;
		$config['per_page'] = '3';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$this->pagination->initialize($config);
		$start=$this -> uri -> segment(3)==""?0:$this -> uri -> segment(3);


		$rs = $this -> shopping_model -> get_all_orders($start,$config['per_page']);
		$data = array(
				"orders" => $rs,
		);
		$this->load->view('shopping_order',$data);

	}

	public function pass($order_id){

		$this->load->library('pagination');
		$total=$this->shopping_model->get_total_orders();
		$config['base_url'] = site_url('welcome/shopping_order');
		$config['total_rows'] = $total;
		$config['per_page'] = '3';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$this->pagination->initialize($config);
		$start=$this -> uri -> segment(3)==""?0:$this -> uri -> segment(3);

		$this->shopping_model->change_check($order_id);

		$rs = $this -> shopping_model -> get_all_orders($start,$config['per_page']);
		$data = array(
				"orders" => $rs,
		);
		$this->load->view('shopping_order',$data);
	}




	public function shopping_order_two(){
		$this->load->model('shopping_model');
		$query=$this->shopping_model->get_all();
		$data=array(
				'orders'=>$query
		);
		$this->load->view('shopping_order_two',$data);
	}
	public function shopping_order_three(){
		$this->load->model('shopping_model');
		$query=$this->shopping_model->get_all();
		$data=array(
				'orders'=>$query
		);
		$this->load->view('shopping_order_three',$data);

	}
	public function shopping_order_four(){
		$this->load->model('shopping_model');
		$query=$this->shopping_model->get_all();
		$data=array(
				'orders'=>$query
		);
		$this->load->view('shopping_order_four',$data);
	}
	public function shopping_order_five(){
		$this->load->model('shopping_model');
		$query=$this->shopping_model->get_all();
		$data=array(
				'orders'=>$query
		);
		$this->load->view('shopping_order_five',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */