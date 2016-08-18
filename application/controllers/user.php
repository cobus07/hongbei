<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class User extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this ->load ->model('user_model');
            $this->load->library('pagination');
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
    //蛋糕师注册 开始
    public function login()
    {
        $this->load->view('login');
    }
    public function change_pwd1()
    {
        $this->load->view('change_pwd1');
    }
    public function change_pwd2()
    {
        $this->load->view('change_pwd2');
    }
    public function change_pwd3()
    {
        $this->load->view('change_pwd3');
    }
    public function do_change_pwd()
    {
        $psd1=$this->input->post('psd1'); 
        $psd2=$this->input->post('psd2');     
            if($psd1 == $psd2){
                
                echo "success";
                //$this->load->view('zhuce_success');
            }
            else{
                $this->load->view('zhuce_message');
            }
    }
    public function do_login()
    {
        $firstname=$this->input->post('firstname');
        $lastname=$this->input->post('lastname');
        $this->load->model('user_model');
        //echo"haha";
        $row=$this->user_model->get_by_firstname_lastname($firstname,$lastname);
    }
    public function zhuce_uname()
    {
        $this->load->view('zhuce_uname');
    }

    public function zhuce_message()
    {
        $this->load->view('zhuce_message');
    }
    public function upload(){
            $this->load->view('upload');
    }
        public function do_upload() {
            $files = array();
            $success = 0;    //用户统计有多少张图片上传成功了   
            foreach ($_FILES as $item) {
                $index = count($files);
                $files[$index]['srcName'] = $item['name'];    //上传图片的原名字
                $files[$index]['error'] = $item['error'];    //和该文件上传相关的错误代码
                $files[$index]['size'] = $item['size'];        //已上传文件的大小，单位为字节
                $files[$index]['type'] = $item['type'];        //文件的 MIME 类型，需要浏览器提供该信息的支持，例如"image/gif"
                $files[$index]['success'] = false;            //这个用于标志该图片是否上传成功
                $files[$index]['path'] = '';                //存图片路径
                // 接收过程有没有错误
                if($item['error'] != 0) continue;
                //判断图片能不能上传
                if(!is_uploaded_file($item['tmp_name'])) {
                    $files[$index]['error'] = 8000;
                    continue;
                }
                //扩展名
                $extension = '';
                if(strcmp($item['type'], 'image/jpg') == 0) {
                    $extension = '.jpg';
                }
                else if(strcmp($item['type'], 'image/png') == 0) {
                    $extension = '.png';
                }
                else if(strcmp($item['type'], 'image/gif') == 0) {
                    $extension = '.gif';
                }
                else {
                    //如果type不是以上三者，我们就从图片原名称里面去截取判断去取得(处于严谨性)    
                    $substr = strrchr($item['name'], '.');
                    if(FALSE == $substr) {
                        $files[$index]['error'] = 8002;
                        continue;
                    }
    
                    //取得元名字的扩展名后，再通过扩展名去给type赋上对应的值
                    if(strcasecmp($substr, '.jpg') == 0 || strcasecmp($substr, '.jpeg') == 0 || strcasecmp($substr, '.jfif') == 0 || strcasecmp($substr, '.jpe') == 0 ) {
                        $files[$index]['type'] = 'image/jpg';
                    }
                    else if(strcasecmp($substr, '.png') == 0) {
                        $files[$index]['type'] = 'image/png';
                    }
                    else if(strcasecmp($substr, '.gif') == 0) {
                        $files[$index]['type'] = 'image/gif';
                    }
                    else {
                        $files[$index]['error'] = 8003;
                        continue;
                    }
                    $extension = $substr;
                }
    
                //对临时文件名加密，用于后面生成复杂的新文件名
                $md5 = md5_file($item['tmp_name']);
                //取得图片的大小
                $imageInfo = getimagesize($item['tmp_name']);
                $rawImageWidth = $imageInfo[0];
                $rawImageHeight = $imageInfo[1];
    
                //设置图片上传路径，放在upload文件夹，以年月日生成文件夹分类存储，
                //rtrim(base_url(), '/')其实就是网站的根目录，大家自己处理
                $path = rtrim(base_url(), '/') . '/upload/' . date('Ymd') . '/';
                //确保目录可写
                ensure_writable_dir($path);
                //文件名
                $name = "$md5.0x{$rawImageWidth}x{$rawImageHeight}{$extension}";
                //加入图片文件没变化到，也就是存在，就不必重复上传了，不存在则上传
                $ret = file_exists($path . $name) ? true : move_uploaded_file($item['tmp_name'], $serverPath . $name);
                if($ret === false) {
                    $files[$index]['error'] = 8004;
                    continue;
                }
                else {
                    $files[$index]['path'] = $path . $name;        //存图片路径
                    $files[$index]['success'] = true;            //图片上传成功标志
                    $files[$index]['width'] = $rawImageWidth;    //图片宽度
                    $files[$index]['height'] = $rawImageHeight;    //图片高度
                    $success ++;    //成功+1
                }
            }
    
            //将图片已json形式返回给js处理页面  ，这里大家可以改成自己的json返回处理代码
            echo json_encode(array(
                'total' => count($files),
                'success' => $success,
                'files' => $files,
            ));
        }
    public function do_zhuce_message()
    {
        $username=$this->input->post('username');
        $this -> session -> set_userdata('uname',$username);
        $psd1=$this->input->post('psd1');     
        $this->load->model('user_model');
        $result=$this->user_model->save($username,$psd1);
            if($result){
                
                echo "success";
                //$this->load->view('zhuce_success');
            }
            else{
                $this->load->view('zhuce_message');
            }
    }
    
    public function zhuce_success()
    {
        $this->load->view('zhuce_success');
    }
    public function text()
    {
        $this->load->view('text');
    }
    public function do_bakercheck (){
         $name=$this->input->post('realname');
         $num=$this->input->post('num');
         $uname=$this -> session ->userdata('uname');
         $this->load->model('user_model');
         $result=$this->user_model->bakercheck($name,$num,$uname);
         if($result){
                       $this->load->view('login');
            }else{
               $this->load->view('zhuce_success');
                 }
        }
    public function check_username(){
        $username = $this -> input -> post('username');
        //var_dump($username);die;
        if($username == '请输入昵称'){
            echo 'bigbang';
        }
        $this->load->model('user_model');
        $result = $this -> user_model -> che_username($username);
        if($result){
            echo 'success';
        }else{
            echo 'false';
        }
    }
    public function check_login(){
        $this->load->model('user_model');
        $username = $this -> input -> post('username');
        $password = $this -> input -> post('password');
        $result = $this -> user_model -> get_by_firstname_lastname($username,$password);
        if($result){
            $this->session->set_userdata('user',$result);

            echo 'success';
        }else{
            echo 'false';
        }
        
        


    }
    


    //蛋糕师注册 结束
    
    
    
    //蛋糕师修改资料 开始
    public function edit_baker(){
        $query = $this -> user_model -> get_user();
        //var_dump($query);die;
        $data = array(
            "query" => $query
        );

        $this->load->view('edit_baker1',$data);

    }
	public function show_baker(){
        $query = $this -> user_model -> get_user();
        //var_dump($query);die;
        $data = array(
            "query" => $query
        );

        $this->load->view('show_baker',$data);

    }

    public function edit(){
        $user = $this -> user_model -> get_by_userid(1);
        $this -> session -> set_userdata('user', $user);
        $this->load->view('edit_baker1');
    }



    public function baker(){
    $user = $this -> user_model -> get_by_userid(1);
    $this -> session -> set_userdata('user', $user);
    $this->load->view('baker');
    }

    public function do_hongbei(){
        $name=$this->input->post('name');
        $youxiang=$this->input->post('youxiang');
        $tel=$this->input->post('tel');
        $person=$this->input->post('person');
        $x=$this->input->post('x');
        $birthday=$this->input->post('birthday');
        $per_sign=$this->input->post('per_sign');
        $rec_addr=$this->input->post('rec_addr');
        $is_city=$this->input->post('is_city');
        $city=$this->input->post('city');
        $this->user_model->update_user($name,$youxiang,$tel,$person,$x,$birthday,$per_sign,$rec_addr,$is_city,$city);
        // if($user){
        // $this->session->set_userdata("hongpei_user",$row);
        // $this->load->view('index');
        // }
        // else{
        // $this->load->view('hongpei');
        $query = $this -> user_model -> get_user();
        $data = array(
            "query" => $query
        );
        $this->load->view('edit_baker1',$data);

    }

    public function upload_product(){

        $name=$this->input->post('name');
        $youxiang=$this->input->post('youxiang');
        $tel=$this->input->post('tel');
        $person=$this->input->post('person');
        $x=$this->input->post('x');
        $birthday=$this->input->post('birthday');
        $per_sign=$this->input->post('per_sign');
        $rec_addr=$this->input->post('rec_addr');
        $is_city=$this->input->post('is_city');
        $city=$this->input->post('city');
        $this->user_model->update_user($name,$youxiang,$tel,$person,$x,$birthday,$per_sign,$rec_addr,$is_city,$city);

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload("product_picture")) {
            echo '上传图片失败，可能是图片过大，不要上传超过10M的图片！';
        } else {
            $upload_data = $this->upload->data();

            if ($upload_data['file_size']) {

                $this->load->library("image_lib");

                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['thumb_marker'] = '';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['master_dim'] = 'width';
                $config['width'] = 500;
                $config['height'] = 300;

                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
                $data['user_pic'] = $upload_data['file_name'];

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $upload_data['full_path'];
                $config2['thumb_marker'] = '_thumb';
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config['master_dim'] = 'width';
                $config2['width'] = 140;
                $config2['height'] = 140;

                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                $thumb_image_name = $upload_data["raw_name"] . "_thumb" . $upload_data["file_ext"];
                $data['product_picture'] = $thumb_image_name;
            }
            $data = array(
                'user_pic_thumb' =>$thumb_image_name
            );
            $result = $this ->user_model -> upload_product($data);

            $query = $this -> user_model -> get_user();
            $data = array(
                "query" => $query
            );
            $this->load->view('show_baker',$data);

            // if($result){
            // redirect('welcome/index');
            // }

        }}

		public function cha_sign(){
			$per_sign = $this -> input -> post('per_sign');
			//var_dump($per_sign);die;
			$result = $this -> user_model -> do_cha_sign($per_sign);
			if($result){
				echo 'success';
			}else{
				echo 'false';
			}
		}
		
		public function cha_addr(){
			$rec_addr = $this -> input -> post('rec_addr');
			//var_dump($per_sign);die;
			$result = $this -> user_model -> do_cha_addr($rec_addr);
			if($result){
				echo 'success';
			}else{
				echo 'false';
			}
		}
			
        //蛋糕师修改资料 开始


}