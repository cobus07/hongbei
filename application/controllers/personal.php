<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Personal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load->model('personal_model');
		$this->load->library('pagination');
	}
	//个人主页 开始
	public function person(){
		/*$query=$this->personal_model->get_person();
		$arr[sList]=$query;*/
		$this -> load -> view('person');
	}
	public function post(){
		$wenzhang = $this->input->post('wenzhang');

		if($wenzhang==''){
			echo 'fail';
		}else{
			$this->load->model('personal_model');
			$result=$this->personal_model->add_article($wenzhang);
			if($result){
				echo 'success';
			}else{
				echo 'fail';
			}
		}
	}
	public function comment(){
		$pinlun=$this->input->post('wenzhang');
		if($pinlun==''){
			echo 'fail';
		}else{
			$this->load->model('personal_model');
			$result=$this->personal_model->add_comment($pinlun);
			if($result){
				echo 'success';
			}else{
				echo 'fail';
			}
		}
	}

			//个人主页 结束


	//发布新品 开始
	public function release()
	{
		$all = $this -> personal_model -> get_all_c();
		$data = array(
			"cs" => $all
		);
		$this->load->view('release',$data);
	}
	public function upload_product()
	{
		$product_name = htmlspecialchars($this -> input -> post('product_name'));
		$category_id = htmlspecialchars($this -> input -> post('category_id'));
		$product_introduce =  htmlspecialchars($this -> input -> post('product_introduce'));
		$product_date =  htmlspecialchars($this -> input -> post('product_date'));
		$product_quality_date =  htmlspecialchars($this -> input -> post('product_quality_date'));
		$product_burdening =  htmlspecialchars($this -> input -> post('product_burdening'));


		$size = htmlspecialchars($this -> input -> post('size'));
		$price = htmlspecialchars($this -> input -> post('price'));


		$data = array(
			'product_name'=>$product_name,
			'category_id'=>$category_id,
			'product_introduce'=>$product_introduce,
			'product_date'=>$product_date,
			'product_quality_date'=>$product_quality_date,
			'product_burdening'=>$product_burdening
		);

		$sp= array(
			'size'=>$size,
			'price'=>$price
		);

		$result1 = $this ->personal_model -> upload_product($data);
		$result2 = $this ->personal_model -> upload_size($sp);

		if($result1&&$result2){
			redirect('personal/release');
		}else{
			redirect('personal/person');
		}

	}
	//发布新品 结束


	//购物订单 开始
	public function order_this()
	{
		$this->load->view('shopping_order');
	}
	public  function check_order_and_product_by_state(){
		$state = $this->input->get('state');
		$recycle = $this->input->get('recycle');
		$id = $this->input->get('id');
		$offset=$this->input->get('offset');
		$this->load->model("personal_model");
		$result = $this->personal_model->get_by_userid($id,$offset,$state,$recycle);
		$totalCount = 6;
		foreach($result as $order){
			$order_id = $order -> order_id;
			$order -> items = $this -> personal_model -> get_order_items($order_id);
			$order->isEnd = ceil($totalCount/2) == ($offset/2+1)?true:false;
		}
		echo json_encode($result);
	}
	public  function check_order_and_product(){
		$recycle = $this->input->get('recycle');
		$id = $this->input->get('id');
		$offset=$this->input->get('offset');
		$this->load->model("personal_model");
		$result = $this->personal_model->get_by_userid_re($id,$offset,$recycle);
		$totalCount = 6;
		foreach($result as $order){
			$order_id = $order -> order_id;
			$order -> items = $this -> personal_model -> get_order_items($order_id);
			$order->isEnd = ceil($totalCount/2) == ($offset/2+1)?true:false;
		}
		echo json_encode($result);
	}

	//购物订单 结束

	//购物车列表 开始
	public function trolley(){
		$this -> load -> view('shopping_trolley');
	}

	//购物车列表 结束
	
	
	//收藏开始
	public function collect()
	{
		//接受数据
		$userid = 6;
		//连接数据库
		$this->load->model('personal_model');
		$products = $this->personal_model->get_by_id($userid,1);
		$sold_outs = $this->personal_model->get_by_id($userid,0);
		$stores = $this->personal_model->get_by_id_baker($userid);
		$i=0;
		$j=0;
		$arr = array();
		foreach($stores as $v){
			$arr[$i]=$v->baker_id;
			$i++;
		}
		foreach($stores as $k){
				$l = $this->personal_model->get_by_baker_id($arr[$j]);
				$j++;
				$k->baker_good=$l;
		}
		$data = array(
			"products" => $products,
			//"stores" =>$stores,
			"sold_outs"=>$sold_outs
		);
		//跳转页面
		$this->load->view('collect',$data);
	}
	public function col_sold_out(){
		$userid = 6;
		$this->load->model('personal_model');
		$sold_outs = $this->personal_model->get_by_id($userid,0);
		//console.log($sold_outs);
		$data = array(
			"sold_outs"=>$sold_outs
		);
		echo json_encode($data);
	}
	public function col_store_information(){
		$userid = 6;
		$this->load->model('personal_model');
		$stores = $this->personal_model->get_by_id_baker($userid);
		$i=0;
		$j=0;
		$arr = array();
		foreach($stores as $v){
			$arr[$i]=$v->baker_id;
			$i++;
		}
		foreach($stores as $k){
				$l = $this->personal_model->get_by_baker_id($arr[$j]);
				$j++;
				$k->baker_good=$l;
		}
		$data = array(
			"stores" =>$stores
		);
		echo json_encode($data);
	}
	public function col_get_share(){
		$userid = 6;
		$this->load->model('personal_model');
		$shares = $this->personal_model->get_share_by_id($userid);
		$i1=0;
		$j1=0;
		$arr1 = array();
		foreach($shares as $v){
			$arr1[$i1]=$v->like_id;
			$i1++;
		}
		foreach($shares as $k){
				$l = $this->personal_model->get_by_shares_id($arr1[$j1]);
				$j1++;
				$k->shares_good=$l;
		}
		$data = array(
			"shares" =>$shares
		);
		echo json_encode($data);
	}
	//收藏结束

	//好友列表 开始
	public function friend_list(){
		$this->load->view('friend_list');
	}

	//好友列表 开始
	public function get_myfriends(){
		$cur_user = $this -> session ->userdata('user')->user_id;
		$friends = $this -> personal_model -> get_all_friend($cur_user);
		echo json_encode($friends);
	}
	public function get_orfriends(){
		$cur_user = $this -> session ->userdata('user')->user_id;
		$friends = $this -> personal_model -> get_all_frother($cur_user);
		echo json_encode($friends);
	}

	public function ajax_session(){
		$user_id = $this -> session ->userdata('user')->user_id;
		echo json_encode($user_id);
	}

	public function ajax_del(){
		$user_id = $this -> input -> get('user_id');
		$result = $this -> personal_model -> del_friend($user_id);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}

	}

	public function ajax_add(){
		$cur_user = $this -> session ->userdata('user')->user_id;
		$user_id = $this -> input -> get('user_id');
		$result = $this -> personal_model -> add_friend($user_id,$cur_user);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}

	public function window(){
		$this->load->view('window');
	}



	//好友列表 结束
//消息 开始
//    系统消息开始
	public function get_noreadsystem_reply(){
		$noread_systems = $this->personal_model->sys_noread();
		$sys_total = count($noread_systems);
		$this->load->view('news_reply',$sys_total);
	}
	public function get_noreadfriend_reply(){
		$noread_friend = $this->personal_model->fri_noread();
		$fri_total = count($noread_friend);
		$this->load->view('news_reply',$fri_total);
	}
	public function system(){
		$this->load->view('news_system');
	}
	public function ajax_index(){
		$sysnews = $this->personal_model->select_sysnews();
		$noread_friend = $this->personal_model->fri_noread();
		$fri_total = count($noread_friend);
		$data = array(
				'sysnews' => $sysnews,
				'fri_total' => $fri_total
		);
		echo json_encode($data);
	}
	public function del_system(){
		$message_id = $this->input->get('message_id');
		$query = $this->personal_model->del_sysnews($message_id);
		if($query){
			echo "success";
		}else{
			echo "error";
		}
	}
	public function ajax_select_by_id(){
		$message_id = $this->input->get('message_id');
		$row = $this->personal_model->select_message($message_id);
		$data = array(
				'row' => $row,
		);
		echo json_encode($data);
	}
	public function update_read(){
		$user_id = $this->input->post('user_id');
		$num = $this->personal_model->update_sysnews($user_id);
		if($num){
			echo "success";
		}else{
			echo "fail";
		}
	}
// 回复消息开始
	public function reply(){
		$noread_systems = $this->personal_model->sys_noread();
		$sys_total = count($noread_systems);
		$noread_friend = $this->personal_model->fri_noread();
		$fri_total = count($noread_friend);

		$sendnews = $this->personal_model->send_reply();
		$data = array(
				'sendnews'=>$sendnews,
				'sys_total'=>$sys_total,
				'fri_total'=>$fri_total
		);

		$this->load->view('news_reply',$data);
	}
	public function ajax_index_receive(){
		$receivenews = $this->personal_model->receive_reply();
		$data = array(
				'receivenews'=>$receivenews
		);
	}

//好友消息开始
	public function friend(){
		$sys = $this->input->get('sys');
		$reply = $this->input->get('reply');
		$frinews = $this->personal_model->select_frinews();
		$noread_systems = $this->personal_model->sys_noread();
		$sys_total = count($noread_systems);
		$data = array(
				'frinews' => $frinews,
				'sys_total'=> $sys_total,
				'sys' => $sys,
				'reply' => $reply
		);
		$this->load->view('news_friend',$data);
	}
	public function del_friend(){
		$message_id = $this->uri->segment(3);
		$query = $this->personal_model->del_frinews($message_id);
		if($query){
			redirect("news_friend/index");
		}else{
			echo "error";
		}
	}

	public function receive_friend(){
		$message_id = $this->input->get('message_id');
		$query = $this->personal_model->receive_frinews($message_id);
		echo json_encode($query);
	}

	public function reply_frinews(){
//        $time = date('Y-m-d',time());
		$receive_id = $this->input->get('receiver_id');
		$sender_id = $this->input->get('sender_id');
		$reply_content = $this->input->get('reply_content');
		$data = array(
				'receive_id' => $receive_id,
				'sender_id' => $sender_id,
//            'time' => $time,
				'reply_content' => $reply_content
		);

		$num_rows = $this->personal_model->reply_friend($data);
		var_dump($num_rows);
		die();

		if($num_rows>0){
			echo "success";
		}else{
			echo "fail";
		}
	}


	//消息 结束

	//客服中心
	public function service_center(){
		$this -> load -> view('service_center');
	}
	//客服中心
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */