<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model{
    //卖家中心 交易管理 开始
    //卖家中心 交易管理 结束


    //修改烘焙师 个人资料 开始
    public function get_by_name_youxiang_Tel_person_x_birthday_gx_receiv($name,$youxiang,$Tel,$person,$x,$birthday,$gx,$receiv){
        $this->db->where('user_id', 1);
        $query=$this->db->update('t_user',array('email'=>$youxiang,'nickname'=>$name,'tel'=>$Tel,'province'=>$person,'sex'=>$x,'per_sign'=>$gx,'rec_addr'=>$receiv));

    }

    public function get_by_userid($user_id){
        return $this -> db -> get_where('t_user' ,array('user_id' => $user_id)) -> row();
    }


    public function upload_product($data){
        $this ->db -> insert('t_user',$data);
        if($this -> db -> affected_rows()>0){
            return TRUE;
        }
        return FALSE;
    }
    public function get_user(){
        $query = $this->db->get_where('t_user' ,array('user_id' => 1))->result();

        return $query;

    }
     public function do_cha_sign($gx){
		//var_dump($per_sign);die;
		$data = array(
			'per_sign' => $gx
		);
		$this -> db -> where('user_id','1');
		$this -> db -> update('t_user',$data);
		$this -> db -> affected_rows();
	}
	 public function do_cha_addr($receiv){
		//var_dump($per_sign);die;
		$data = array(
			'rec_addr' => $receiv
		);
		$this -> db -> where('user_id','1');
		$this -> db -> update('t_user',$data);
		$this -> db -> affected_rows();
	}
    //修改烘焙师 个人资料 结束
    
    //蛋糕师店铺开始
    /*获取该蛋糕师的蛋糕种类
	 * $user_id为蛋糕师id
	 * */
    public function get_all_category($user_id){
    	return $this -> db -> query("select cate.* from t_category cate where cate.baker_id=$user_id and cate.category_p_id is null") -> result();
    }
    /*获取种类下的蛋糕
	 * $user_id为蛋糕师id
	 **/
    public function get_by_cid($cid,$user_id){
    	return  $this -> db -> query("select ps.*,prod.*,baker.nickname,baker.address,prod_comm.comms,prod_sale.sale,pc.picture_thumb

									from t_size ps,t_product prod,t_user baker,t_product_picture pc,
									(select prod.product_id, count(comm.product_id) as comms
									from t_product prod left join t_product_comment comm
									on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
									(select prod.product_id, sum(orders.amount) as sale
									from t_product prod left join t_order_item orders
									on prod.product_id=orders.product_id group by prod.product_id) prod_sale
									
									where prod.baker_id=$user_id and baker.user_id=$user_id and baker.is_baker=1 
									and pc.product_id=prod.product_id and prod_comm.product_id=prod.product_id 
									and prod_sale.product_id=prod.product_id and pc.product_id=prod.product_id  
									and ps.product_id=prod.product_id and prod.category_id in
											(select cates1.category_id from t_category cates1 where cates1.category_id=$cid
											union
											select cates2.category_id
											from t_category cates1, t_category cates2
											where cates1.category_id=cates2.category_p_id
											and cates1.category_id=$cid ) group by prod.product_id") -> result();
    } 
    //蛋糕师店铺结束
    
    //物流管理开始
    /*获取该烘焙师的所有未发货订单
	 * $user_id为烘焙师id
	 **/
    public function get_all_orders($user_id){
    	return $this -> db -> query("select orders.* from t_order orders where orders.user_id=$user_id and orders.order_state=2") -> result();
    }
    //物流管理结束
    
    
    
    
    
    
    
    
    
    
    
    //宝贝类别-添加 开始
     public function get_all_cate1($user_id){
       return  $this->db->query("select cate.* from t_category cate where cate.baker_id=2 and cate.category_p_id is null")->result();
    }
	 
	 public function get_all_cate2($user_id,$cate1_id){
       return  $this->db->query("select cate.* from t_category cate where cate.baker_id=2 and cate.category_p_id=$cate1_id")->result();
    }
    public function add_cake_style($category_name){
    	$this->db->insert('t_category',array('category_name'=>$category_name,'baker_id'=>2));
    }
	public function del_cake_style(){
		$this->db->delete('t_category',array('category_name'=>$category_name,'baker_id'=>2));
	}
     //宝贝类别-添加 结束
     
     
     
     
     
     
     
}