<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_Model {

    //蛋糕师注册登录  开始
    
    public function save($username, $psd1){
        $query = $this -> db -> query("insert into t_user(username,password) values('$username','$psd1')");
        //return $query;
        // $this->db->insert('t_user',$data);
        if ($query) {
            return TRUE;
        }
            return FALSE;
    }
    public function bakercheck($name, $num, $uname) {
        //$user_id=$this -> db -> query("select user_id from t_user where username='$baker_name'");
        $query = $this -> db -> get_where('t_user', array('username' => $uname));
        foreach ($query -> result() as $row) {
            $user_id = $row -> user_id;
        }
        $query = $this -> db -> query("insert into t_baker(realname,idcard,baker_id ) values('$name','$num','$user_id')");
        
        if ($query) {
            
            $data = array(
                'is_baker'=> '1'
            );
            $this -> db ->where('username',$uname);
            $this -> db ->update('t_user',$data);
            return TRUE;
        }
            return FALSE;
    }
    public function che_username($username) {
        //var_dump($username);die;
        $nums = $this -> db -> get_where('t_user', array('username' => $username)) -> num_rows();
        //var_dump($nums);die;
        return $nums;
    }
    public function get_by_firstname_lastname($firstname, $lastname) {
        $query = $this -> db -> get_where('t_user', array('username' => $firstname, 'password' => $lastname));
        return $query -> row();
    }
    public function get_user_by_username_password($username,$password){
        $rs = $this -> db -> query("select * from t_user where t_user.username='$username' and t_user.password='$password'") -> row();
        return $rs;
    }
    

    //蛋糕师注册登录  结束

    //蛋糕师修改个人资料 开始
    public function update_user($name, $youxiang, $Tel, $person, $x, $birthday, $per_sign, $rec_addr, $is_city, $city) {
        $this -> db -> where('user_id', 1);
        $query = $this -> db -> update('t_user', array('email' => $youxiang, 'nickname' => $name, 'tel' => $Tel, 'province' => $person, 'sex' => $x, 'birthday' => $birthday, 'per_sign' => $per_sign, 'rec_addr' => $rec_addr, 'is_city' => $is_city));

    }

    public function get_by_userid($user_id) {
        return $this -> db -> get_where('t_user', array('user_id' => $user_id)) -> row();
    }

    public function upload_product($data) {
        $this -> db -> insert('t_user', $data);
        if ($this -> db -> affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function get_user() {
        $query = $this -> db -> get_where('t_user', array('user_id' => 1)) -> result();

        return $query;

    }
	
	public function do_cha_sign($per_sign){
		//var_dump($per_sign);die;
		$data = array(
			'per_sign' => $per_sign
		);
		$this -> db -> where('user_id','1');
		$this -> db -> update('t_user',$data);
		$this -> db -> affected_rows();
	}
	
	public function do_cha_addr($rec_addr){
		//var_dump($per_sign);die;
		$data = array(
			'rec_addr' => $rec_addr
		);
		$this -> db -> where('user_id','1');
		$this -> db -> update('t_user',$data);
		$this -> db -> affected_rows();
	}
	
    //蛋糕师修改个人资料 结束
}
