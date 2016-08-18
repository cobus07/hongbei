<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Personal_model extends CI_Model{
		//个人主页 开始
		/*public function get_person(){
			$query=$this->db->get('t_share');
			return $query->result();
		}*/
		public function add_article($wenzhang){
			$data=array(
					'introduce' => $wenzhang
			);
			$this->db->insert('t_share',$data);

			return $this->db->affected_rows();
		}
		public function add_comment($pinlun){
			$data=array(
				'content'=>$pinlun
			);
			$this->db->insert('t_share_comment',$data);

			return $this->db->affected_rows();
		}


		//个人主页 结束


		//购物订单 开始
		public function get_by_userid($id,$offset,$state,$recycle){
			$this->db->select('orde.*, user2.nickname');
			$this->db->from('t_order orde');
			$this->db->join('t_user user1', 'orde.user_id=user1.user_id');
			$this->db->join('t_user user2','user2.user_id=orde.baker_id');
			$this->db->join('t_baker baker','user2.user_id=baker.baker_id');
			$this->db->order_by('order_date','desc');
			$this->db->where('user1.user_id',$id);
			$this->db->where('order_state',$state);
			$this->db->where('is_recycle',$recycle);
			$this->db->limit(2,$offset);
			return $this->db->get()->result();
		}
		public function get_by_userid_re($id,$offset,$recycle){
			$this->db->select('orde.*, user2.nickname');
			$this->db->from('t_order orde');
			$this->db->join('t_user user1', 'orde.user_id=user1.user_id');
			$this->db->join('t_user user2','user2.user_id=orde.baker_id');
			$this->db->join('t_baker baker','user2.user_id=baker.baker_id');
			$this->db->order_by('order_date','desc');
			$this->db->where('user1.user_id',$id);
			$this->db->where('is_recycle',$recycle);
			$this->db->limit(2,$offset);
			return $this->db->get()->result();
		}
		public function get_order_items($order_id){
			$this->db->select('t_product.*,t_order_item.*');
			$this->db->from('t_order_item');
			$this->db->join('t_product','t_product.product_id=t_order_item.product_id');
			$this->db->join('t_order','t_order.order_id=t_order_item.order_id');
			$this->db->where('t_order.order_id',$order_id);
			return $this->db->get()->result();
		}

		//购物订单 结束

		//新品发布 开始
		public function upload_product($data){
			$this ->db -> insert('t_product',$data);
			if($this -> db -> affected_rows()>0){
				return TRUE;
			}
			return FALSE;
		}
		public function upload_size($data){
			$this ->db -> insert('t_size',$data);
			if($this -> db -> affected_rows()>0){
				return TRUE;
			}
			return FALSE;
		}
		public function get_all_c(){
			return $this -> db -> get('t_category') -> result();
		}
		//新品发布 结束




		//收藏开始
		public function get_by_id($userid,$flag){
			$this -> db -> select('*');
			$this -> db -> from('t_collect_product pc');
			$this -> db -> join('t_product',"t_product.product_id=pc.product_id and t_product.is_out=$flag");
			$this -> db -> join('t_size','t_product.product_id=t_size.product_id');
			$this -> db -> join('t_product_picture','t_product_picture.product_id=pc.product_id and is_cover=1');
			$this -> db -> where('pc.user_id',$userid);
			return $this -> db -> get() -> result();
		}
		public function get_by_id_baker($userid){
			$this -> db -> select('*');
			$this -> db ->from('t_collect_baker pc');
			$this -> db -> join('t_baker','t_baker.baker_id=pc.baker_id');
			$this -> db -> join('t_user','t_user.user_id=t_baker.baker_id');
			//$this -> db -> join('t_size','t_product.product_id = t_size.product_id');
			$this -> db -> where('pc.user_id',$userid);
			//$this -> db ->limit();
			return $this -> db -> get() -> result();
		}
		public function get_by_baker_id($bakerid){
			$this -> db -> select('*');
			$this -> db -> from('t_product pc');
			//$this -> db -> join('t_product','t_product.baker_id=pc.baker_id');
			//$this -> db -> join('t_product','pc.baker_id=t_product.baker_id');
			$this -> db -> join('t_size','t_size.size_id=pc.product_id');
			$this -> db -> join('t_product_picture','t_product_picture.product_id=pc.product_id');
			$this -> db -> where('pc.baker_id',$bakerid);
			$this -> db ->limit(3,0);
			return $this -> db -> get() -> result();
			
		}
		public function get_by_shares_id($bakerid){
			$this -> db -> select('*');
			$this -> db -> from('t_share_picture pc');
			$this -> db -> where('pc.share_id',$bakerid);
			$this -> db ->limit(6,0);
			return $this -> db -> get() -> result();
			
		}
		public function get_share_by_id($userid){
			$this -> db -> select('*');
			$this -> db -> from('t_share_like pc');
			$this -> db -> join('t_share','t_share.user_id=pc.share_id');
			$this -> db -> join('t_user','t_user.user_id = t_share.user_id');
			//$this -> db -> join('');
			$this -> db -> where('pc.like_user_id',$userid);
			return $this -> db -> get() -> result();
		}
		//收藏结束

		//消息 开始
		public function sys_noread(){
			$query = $this->db->query("select * from t_message where type=2 and is_read=0");
			return $query->result();
		}
		public function fri_noread(){
			$query = $this->db->query("select * from t_message where type=1 and is_read=0");
			return $query->result();
		}

		public function select_sysnews(){
			$query = $this->db->query("select * from t_message where type=2 order by add_time");
			return $query->result();
		}
		public function select_frinews(){
			$query = $this->db->query("select * from t_message where type=1 order by add_time desc");
			return $query->result();
		}
		public function send_reply(){
			$this->db->select('mes.*,user1.username,user2.username as friendname,');
			$this->db->from('t_message mes');
			$this->db->join('t_user user1','user1.user_id=mes.receiver_id');
			$this->db->join('t_user user2','user2.user_id=mes.sender_id');
			$this->db->join('t_friend fri','fri.user_id=user1.user_id','fri.user_id=user2.user_id');
			$this->db->where('mes.type',1);
			$this->db->where('user1.user_id',7);
			return $this->db->get()->result();
		}
		public function receive_reply(){
			$this->db->select('*');
			$this->db->from('t_message');
			$this->db->join('t_user','t_user.user_id=t_message.message_id');
			$query = $this->db->get();
			return $query -> row();
		}
		public function del_frinews($message_id){
			$query = $this->db->query("delete from t_message where message_id='$message_id'");
			return $query;
		}
		public function del_sysnews($message_id){
			$query = $this->db->query("delete from t_message where message_id='$message_id'");
			return $query;
		}
		public function select_message($message_id){
			$query = $this->db->query("select * from t_message where message_id='$message_id'");
			$row = $query->row();
			return $row;
		}
		public function receive_frinews($message_id){
			$query = $this->db->query("select * from t_message where message_id='$message_id'");
			$row = $query->row();
			return $row;
		}
		public function reply_friend($data){
			$this->db->insert('t_message',$data);
			//        $this->db->query("insert into t_message(message_id,title,content,add_time,sender_id,receiver_id,type,is_read) values(null,null,$reply_content,$time,$sender_id,$receive_id,1,0)");
			return $this->db->affected_rows();
		}
		public function update_sysnews($user_id){
			return $this->db->query("update t_message set is_read=1 where is_read=0 and type=1 and receiver_id='$user_id'");

		}

		//消息 结束

		//好友列表 开始
		public function get_all_friend($cur_user){
			$rs = $this -> db -> query("select * from t_user where t_user.user_id in (select t_friend.friend_id from t_friend where t_friend.user_id='$cur_user') limit 5") -> result();
			return $rs;
		}

		public function get_all_frother($cur_user){
			$rs = $this -> db -> query("select * from t_user where t_user.user_id in (select t_friend.user_id from t_friend where t_friend.friend_id='$cur_user')") -> result();
			return $rs;
		}

		public function del_friend($user_id){
			$this -> db -> delete('t_friend',array('friend_id'=>$user_id));
			return $this -> db -> affected_rows();

		}

		public function add_friend($user_id,$cur_user){
			$this -> db -> insert('t_friend',array('friend_id'=>$cur_user,'user_id'=>$user_id));
			return $this -> db -> affected_rows();

		}




		//好友列表 结束



	}
?>