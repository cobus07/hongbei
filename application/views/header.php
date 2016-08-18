	<div class="header">
		<div class="hde">
			<img src="assets/img/logod.png" alt="">
			<div class="listd">
				<span class="listd-2"><a href="product/zhuye">主 页</a></span>
				<span class="listd-3"><a href="javascript:;">我的烘焙</a></span>
				<span class="listd-7"><a href="javascript:;">购物车</a></span>
				<span class="listd-5"></span>
				<span class="listd-1"><a href="javascript:;">蛋糕师中心</a></span>
				<span class="listd-6"><a href="personal/service_center">联系客服</a></span>
				<span class="listd-5"></span>
				<?php
				//var_dump($username);die;
				$user = $this->session->userdata('user');
				if($user){
					echo "<span class='listd-9'><a href='javascript:;'>".$user->username." 已登录</a></span>";
					echo "<span class='listd-10'><a href='product/login_out'>/ 退出登录</a></span>";
				}else{
					echo '<span class="listd-8"><a href="user/zhuce_message">注&nbsp;册</a></span>
								<span class="listd-4"><a href="user/login">/ 登&nbsp;录</a></span>';
				}

				?>

			</div>
		</div>
	</div>
