<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Product_model extends CI_Model {


	// 蛋糕分类列表开始
	public function prod($startnum, $pagesize, $arr) {
		if (array_key_exists('search', $arr)) {
			$search = $arr['search'];
			$sql = "select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales
                    from t_size ps,t_product prod,t_user,t_product_picture proc,
                         (select prod.product_id, count(comm.product_id) as comms
                            from t_product prod left join t_product_comment comm
                          on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                         (select prod.product_id, count(item.product_id) as sales
                            from t_product prod left join t_order_item item
                          on prod.product_id=item.product_id group by prod.product_id) prod_sales
                    where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                          and prod.product_id=ps.product_id and prod.product_id=proc.product_id like'%$search%'
                          group by prod.product_id";
		}

		if (array_key_exists('sort1', $arr)) {
			if ($arr['sort1'] == 'good' || $arr['sort1'] == 'popular') {
				$sql = "select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales,prod_goods.goods,prod_collects.collects
                        from t_size ps,t_product prod,t_user,t_product_picture proc,
                                 (select prod.product_id, count(comm.product_id) as comms
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                                 (select prod.product_id, sum(comm.good_comment) as goods
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_goods,
                                 (select prod.product_id, count(item.product_id) as sales
                                    from t_product prod left join t_order_item item
                                  on prod.product_id=item.product_id group by prod.product_id) prod_sales,
                                 (select prod.product_id, count(pc.product_id) as collects
                                    from t_product prod left join t_collect_product pc
                                    on prod.product_id=pc.product_id group by prod.product_id) prod_collects
                        where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                                    and prod.product_id=ps.product_id and prod.product_id=proc.product_id and prod_goods.product_id=prod.product_id
                                    and prod.product_id=prod_collects.product_id";
				if (array_key_exists('size', $arr)) {
					$size = $arr['size'];
					$sql .= " and ps.size = $size";
				}
				if (array_key_exists('price1', $arr) && array_key_exists('price2', $arr)) {
					$first = $arr['price1'];
					$last = $arr['price2'];
					$sql .= " and ps.price between $first and $last";
				}
				if ($arr['sort1'] == 'good' && $arr['sort2']) {
					$sc = $arr['sort2'];
					$sql .= " order by prod_goods.goods $sc";
				}
				if ($arr['sort1'] == 'popular' && $arr['sort2']) {
					$sc = $arr['sort2'];
					$sql .= " order by prod_collects.collects $sc";
				}

			} else {
				$sql = "select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales
                from t_size ps,t_product prod,t_user,t_product_picture proc,
                     (select prod.product_id, count(comm.product_id) as comms
                        from t_product prod left join t_product_comment comm
                      on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                     (select prod.product_id, count(item.product_id) as sales
                        from t_product prod left join t_order_item item
                      on prod.product_id=item.product_id group by prod.product_id) prod_sales
                where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                      and prod.product_id=ps.product_id and prod.product_id=proc.product_id";

				if (array_key_exists('size', $arr)) {
					$size = $arr['size'];
					$sql .= " and ps.size = $size";
				}
				if (array_key_exists('price1', $arr) && array_key_exists('price2', $arr)) {
					$first = $arr['price1'];
					$last = $arr['price2'];
					$sql .= " and ps.price between $first and $last";
				}
				if ($arr['sort1'] == 'price' && $arr['sort2']) {
					$sc = $arr['sort2'];
					$sql .= " order by ps.price $sc";
				}
				if ($arr['sort1'] == 'sale' && $arr['sort2']) {
					$sc = $arr['sort2'];
					$sql .= " order by prod_sales.sales $sc";
				}

			}
		} else {
			$sql = "select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales
                    from t_size ps,t_product prod,t_user,t_product_picture proc,
                         (select prod.product_id, count(comm.product_id) as comms
                            from t_product prod left join t_product_comment comm
                          on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                         (select prod.product_id, count(item.product_id) as sales
                            from t_product prod left join t_order_item item
                          on prod.product_id=item.product_id group by prod.product_id) prod_sales
                    where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                          and prod.product_id=ps.product_id and prod.product_id=proc.product_id";
			if (array_key_exists('size', $arr)) {
				$size = $arr['size'];
				//var_dump($size);die;
				$sql .= " and ps.size = $size";
			}
			if (array_key_exists('price1', $arr) && array_key_exists('price2', $arr)) {
				$first = $arr['price1'];
				$last = $arr['price2'];
				//var_dump($first);die;
				$sql .= " and ps.price between $first and $last";
			}
		}
		// $sql .= " group by prod.product_id";
		$sql .= " limit $startnum,$pagesize";

		$query = $this -> db -> query($sql) -> result();
		return $query;
	}

	public function get_all_num($arr) {
		$sql = "select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales,prod_goods.goods,prod_collects.collects
                        from t_size ps,t_product prod,t_user,t_product_picture proc,
                                 (select prod.product_id, count(comm.product_id) as comms
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                                 (select prod.product_id, sum(comm.good_comment) as goods
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_goods,
                                 (select prod.product_id, count(item.product_id) as sales
                                    from t_product prod left join t_order_item item
                                  on prod.product_id=item.product_id group by prod.product_id) prod_sales,
                                 (select prod.product_id, count(pc.product_id) as collects
                                    from t_product prod left join t_collect_product pc
                                    on prod.product_id=pc.product_id group by prod.product_id) prod_collects
                        where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                                    and prod.product_id=ps.product_id and prod.product_id=proc.product_id and prod_goods.product_id=prod.product_id
                                    and prod.product_id=prod_collects.product_id";
		if (array_key_exists('size', $arr)) {
			$size = $arr['size'];
			$sql .= " and ps.size = $size";
		}
		if (array_key_exists('price1', $arr) && array_key_exists('price2', $arr)) {
			$first = $arr['price1'];
			$last = $arr['price2'];
			$sql .= " and ps.price between $first and $last";
		}
		if (array_key_exists('sort1', $arr) && array_key_exists('sort2', $arr)) {
			if ($arr['sort1'] == 'price' && $arr['sort2']) {
				$sc = $arr['sort2'];
				$sql .= " order by ps.price $sc";
			}
			if ($arr['sort1'] == 'sale' && $arr['sort2']) {
				$sc = $arr['sort2'];
				$sql .= " order by prod_sales.sales $sc";
			}
			if ($arr['sort1'] == 'popular' && $arr['sort2']) {
				$sc = $arr['sort2'];
				$sql .= " order by prod_collects.collects $sc";
			}
			if ($arr['sort1'] == 'good' && $arr['sort2']) {
				$sc = $arr['sort2'];
				$sql .= " order by prod_goods.goods $sc";
			}
		}
		//$sql .= " group by prod.product_id";
		return $this -> db -> query($sql) -> num_rows();
	}

	public function prod_sale() {
		$sql = "select  prod.*,ps.*,proc.*,prod_sales.sales
                from t_size ps,t_product prod,t_product_picture proc,(select prod.product_id, count(*) as sales from t_product prod, t_order_item item where prod.product_id=item.product_id group by prod.product_id) prod_sales
                where prod.product_id=prod_sales.product_id and prod.product_id=ps.product_id and prod.product_id=proc.product_id order by prod_sales.sales desc limit 4";
		$query = $this -> db -> query($sql) -> result();
		return $query;
	}

	// 蛋糕分类列表结束

	// 蛋糕师 蛋糕列表 开始

	/*获取该烘焙师的所有蛋糕一级种类
	 * $userId,烘焙师id
	 * */
	public function get_all_cates1($user_id) {
		return $this -> db -> query("select cate1.* from t_category cate1 where cate1.category_p_id is null and cate1.baker_id=$user_id") -> result();
	}

	/*获取该烘焙师的所有蛋糕二级种类
	 * $userId,烘焙师id
	 * */
	public function get_all_cates2($user_id) {
		return $this -> db -> query("select cate2.* from t_category cate2 where cate2.category_p_id is not null and cate2.baker_id=$user_id") -> result();
		//var_dump($a);die;
	}

	/*获取已点击的一级种类下的二级种类
	 * $cate1,一级种类的名字
	 * */
	public function get_cates2_by_cate1($cate1) {
		return $this -> db -> query("select t_category.* from t_category where t_category.category_p_id=$cate1") -> result();
		//var_dump($cates2);die;
	}

	/*获取蛋糕列表的所有信息
	 * $userId,烘焙师id
	 * */
	public function get_all_results($user_id, $arr) {
		//查询所有蛋糕信息
		$sql = "select ps.*,prod.*,baker.nickname,baker.address,prod_comm.comms,prod_sale.sale,pc.picture_thumb

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
								and ps.product_id=prod.product_id";
		$sql1 = " group by prod.product_id";
		if($arr){//如果点击了参数
			if ($arr) {//点击了参数
			if (array_key_exists('sort1', $arr)) {//点击了排序
				if ($arr['sort1'] == 'collect') {//点击了人气排序
					$sql = "select ps.*,prod.*,baker.nickname,baker.address,prod_comm.comms,prod_sale.sale,pc.picture_thumb,prod_collects.collects

									from t_size ps,t_product prod,t_user baker,t_product_picture pc,
									(select prod.product_id, count(comm.product_id) as comms
									from t_product prod left join t_product_comment comm
									on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
									(select prod.product_id, sum(orders.amount) as sale
									from t_product prod left join t_order_item orders
									on prod.product_id=orders.product_id group by prod.product_id) prod_sale,
									(select prod.product_id, count(pc.product_id) as collects
			                        from t_product prod left join t_collect_product pc
			                        on prod.product_id=pc.product_id group by prod.product_id) prod_collects
									
									where prod.baker_id=$user_id and baker.user_id=$user_id and baker.is_baker=1 
									and pc.product_id=prod.product_id and prod_comm.product_id=prod.product_id 
									and prod_sale.product_id=prod.product_id and pc.product_id=prod.product_id  
									and ps.product_id=prod.product_id and prod.product_id=prod_collects.product_id";
					
					if ($arr['sort1'] == 'collect' && $arr['sort2']) {//点击人气排序
						$sc = $arr['sort2'];
						$sql.=$sql1;
						$sql .= " order by prod_collects.collects $sc";
					}
				}//点击了人气排序if结束
				else{//点击人气排序之外的其他排序
					if ($arr['sort1'] == 'price' && $arr['sort2']) {//点击价格排序
						$sc = $arr['sort2'];
						$sql.=$sql1;
						$sql .= " order by ps.price $sc";
					}
					if ($arr['sort1'] == 'newproduct' && $arr['sort2']) {//点击新品排序
						$sc = $arr['sort2'];
						$sql.=$sql1;
						$sql .= " order by prod.product_date $sc";
					}
					if ($arr['sort1'] == 'sale' && $arr['sort2']) {//点击销量排序
						$sc = $arr['sort2'];
						$sql.=$sql1;
						$sql .= " order by prod_sale.sale $sc";
						//var_dump($sql);die;
					}
				}//点击人气排序之外的其他排序else结束
				
			}//点击了排序if结束
			else{
					if (array_key_exists('cate1', $arr)) {//点击一级种类
							$cate1 = $arr['cate1'];
							$sql .= " and prod.category_id in
											(select cates1.category_id from t_category cates1 where cates1.category_id=$cate1
											union
											select cates2.category_id
											from t_category cates1, t_category cates2
											where cates1.category_id=cates2.category_p_id
											and cates1.category_id=$cate1 ) ";
					}
					if (array_key_exists('cate2', $arr)) {//点击二级种类
						$cate2 = $arr['cate2'];
						$sql .= " and prod.category_id=$cate2";
					}
					if (array_key_exists('size', $arr)) {//点击尺寸
						$size = $arr['size'];
						$sql .= " and ps.size = $size";
					}
					if (array_key_exists('price1', $arr) && array_key_exists('price2', $arr)) {//点击价格区间
							$first = $arr['price1'];
							$last = $arr['price2'];
							$sql .= " and ps.price between $first and $last";
					}
			}}
		}else{//没有参数说明是第一次进来,按照生产时间倒序排列
			$sql.=$sql1;
			$sql.=" order by prod.product_date desc";
		}
		return $this -> db -> query($sql) -> result();
	}
	// 蛋糕师 蛋糕列表 结束

	
	    //蛋糕详情  开始
    public function search_by_pid($pid){
		$this->db->select('t_user.*,t_product.*');
		$this->db->from('t_product');
		$this->db->join('t_user','t_product.baker_id=t_user.user_id');
		$this->db->where('t_product.product_id',$pid);
		return $this->db->get()->row(); 
	}
	 public function search_sizes_by_pid($pid){
		 $r = $this -> db -> query("select * from t_size where t_size.product_id=$pid order by size asc")->result();
		   return $r;
		}
	 public function search_by_size($size){
	 	return $this->db->get_where('t_size',array('size'=>$size))->row();
	 }
	 public function search_photo_by_pid($pid){
		$query=$this->db->get_where('t_product_picture',array('product_id'=>$pid),4);
			return $query->result();
		 }
		public function search_volume_by_pid($pid){
		 	return $this->db->query("select sum(amount) as amounts from t_order_item item where item.product_id=$pid")->row();
		 }
		public function search_by_bid($bid){
       //如何select产品的名字和id 用逗号隔开还是空格
			$this->db->select('product.*,picture.*');
			$this->db->from('t_product product');
			$this->db->join('t_product_picture picture','product.product_id=picture.product_id');
			$this->db->limit(4);
			$this->db->where('product.baker_id',$bid);
			$this->db->where('picture.is_cover',1);
			return $this->db->get()->result();
		}
		public function search_video_by_bid($bid){
			$query=$this->db->get_where('t_video',array('user_id'=>$bid));
			return $query->result();
		}
		public function search_comment_by_pid($pid){
			return $this->db->query("select count(good_comment) as total from t_product_comment comment where product_id=$pid")->row();
		}
		public function get_pic_count($pid){
			return $this->db->query("select count(pic.comment_id) as pic from t_product_comment com,t_product_comment_picture pic where com.product_id=$pid and com.comment_id=pic.comment_id")->row();
		}
		public function get_good_count($pid){
			return $this->db->query("select count(good_comment) as good from t_product_comment comment where product_id=$pid and good_comment=1")->row();
		}
		public function get_middle_count($pid){
			return $this->db->query("select count(good_comment) as middle from t_product_comment comment where product_id=$pid and good_comment=0")->row();
		}
		public function get_bad_count($pid){
			return $this->db->query("select count(good_comment) as bad from t_product_comment comment where product_id=$pid and good_comment=-1")->row();
		}
		public function get_all_comment($pid){
			$this->db->select('comment.*,user.nickname');
			$this->db->from('t_product_comment comment');
			$this->db->join('t_user user','user.user_id=comment.user_id');
			//$this->db->join('t_product_comment_picture picture','picture.comment_id=comment.comment_id');
			$this->db->where('comment.product_id',$pid);
			return $this->db->get()->result();
		}
		public function get_pic_comment($pid){
			$this->db->select('comment.*,user.nickname,picture.*');
			$this->db->from('t_product_comment comment');
			$this->db->join('t_user user','user.user_id=comment.user_id');
			$this->db->join('t_product_comment_picture picture','picture.comment_id=comment.comment_id');
			$this->db->where('comment.product_id',$pid);
			return $this->db->get()->result();
		}
		public function get_picture_by_cid($cid){
			$query=$this->db->get_where('t_product_comment_picture',array('comment_id'=>$cid));
			return $query->result();
		}
		public function get_comment_by_state($pid,$state){
			$this->db->select('comment.*,user.nickname');
			$this->db->from('t_product_comment comment');
			$this->db->join('t_user user','user.user_id=comment.user_id');
			$this->db->where('comment.product_id',$pid);
			$this->db->where('comment.good_comment',$state);
			return $this->db->get()->result();
		}
	
		
		
    
    
    
    
    
    
    
    
    
    
    //蛋糕详情  结束


    //搜索烘焙师 开始
    public function get_bakers_count(){
        return $this -> db -> count_all('t_baker');
    }
    public function get_bakers_by_page($offset){
		$this -> db -> select('baker.*,us.nickname,us.user_pic_thumb');
		$this -> db -> from('t_baker baker');
		$this -> db -> join('t_user us','baker.baker_id=us.user_id');
		$this -> db -> limit(2,$offset);
		return $this -> db -> get() -> result();


    }
	public function get_product_by_baker($id){
		$rs = $this -> db -> query( "select prod.*,pc.picture_thumb from t_product prod, t_product_picture pc where prod.baker_id=".$id." and prod.product_id=pc.product_id and pc.is_cover=1 limit 4") -> result();
		//var_dump($rs);die;
		return $rs;
	}

	public function get_sales_by_baker($id){
		$rs = $this -> db -> query('select sum(item.amount) as sales from t_product prod, t_order orde, t_order_item item where prod.product_id=item.product_id and orde.order_id=item.order_id and prod.baker_id='.$id) -> result();
		return $rs;
	}

	public function get_pcount_by_baker($id){
		$rs = $this -> db -> query('select count(prod.product_id) as prods from t_product prod where prod.baker_id='.$id) -> result();
		return $rs;
		//var_dump($rs);die;
	}
    //搜索烘焙师 结束
}
