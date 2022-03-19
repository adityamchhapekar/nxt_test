
<!DOCTYPE html>
<html>
<head>
	<title>seller login register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="seller_css/seller_css.css">
			<link rel="stylesheet" type="text/css" href="/e_commerce_project/common_css.css">
<style type="text/css">
			body{
		background: linear-gradient(-30deg,rgb(51,204,255),rgb(129,213,255),rgb(255,204,255),rgb(129,213,255));
			background-attachment: fixed;
			min-height: 100vh;
			display: flex;
			justify-content: center;
}
</style>

</head>
<body>

<div class="menu_items_log_reg">
	<a href="" id="d_boy_log_btn">Delhivery Boy</a>
</div>

				<!-- loader -->
	<div class="loader_main_div">
		<div class="loader_sub_div">
			<b></b>
			<div class="outer_loader">

				<div class="inner_loader"><span>loading..</span></div>
			</div>
		</div>
	</div>

	<!-- alert msg div.. -->
<div class="alert alert-success succ"></div>
<div class="alert alert-danger error"></div>
<div class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<!--start login form for delhivery boy.. -->
			<section class="d_log_fm_sec">
				<div class="d_log_fm_div">
					<h3>LOGIN FORM</h3>
					<form class="form-row">
						<div class="form-group">
							<input class="form-control" name="dlog_ph_num" id="dlog_ph_num">
							<label>Mob Num</label>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" 
							name="dlog_pass" id="dlog_pass">
							<label>PassWord</label>
						</div>
						<div class="dlog_sub_div">
							<button id="dlog_sub_btn">Login</button>
						</div>
					</form>
				</div>
			</section>
			<!--ends login form for delhivery boy.. -->
			<section class="reg_sec">
			 <!--buyer reg form...  -->
					<div class="reg_form_div">
				<div class="heading">
					<h3>REGISTER FORM</h3>
				</div>

						<form id="reg_form">
							<div>
							<input class="reg_inputs"  name="fname" id="fname" required="">
								<label>first Name</label>
							</div>
							<div>
							  <input class="reg_inputs" name="lname" id="lname" required="">
								<label>Last Name</label>
							</div>
							<div>
							  <input class="reg_inputs" name="email" id="email"
							  required="">
								<label>EMAIL</label>
							</div>
							<div>
							<input class="reg_inputs" name="ph_num" id="ph_num" required="">
								<label>MOBILE NUM</label>
							</div>

							<div>
								<input class="reg_inputs" type="text" name="pass" id="pass" 
								required="">
								<label>PASSWORD</label>
							</div>
							<div id="reg_sub_div">
								<button type="submit" id="reg_sub_btn">register</button>
							</div>


						</form>
					</div>	
				</section>
				<section class="seller_reg_form_sec">
					<!-- seller reg form.. -->
					<div class="seller_reg_form_div">
						<div class="heading">
							<h3>seller Account </h3>
						</div>
						<form id="seller_reg_fm_id">
							<div>
								<input  class="s_reg_inputs" name="s_fname" id="s_fname" required="">
								<label>First Name</label>
							</div>
							<div>
								<input  class="s_reg_inputs" name="s_lname" id="s_lname" required="">
								<label>Last Name</label>
							</div>
							<div>
								<input  class="s_reg_inputs" name="s_email" id="s_email" required="">
								<label>ex@gmail.com</label>
							</div>
							<div>
								<input  class="s_reg_inputs" name="s_ph_num" id="s_ph_num" required="">
								<label>Mobil</label>
							</div>
							<div>
								<input  class="s_reg_inputs" name="s_pass" id="s_pass" required="">
								<label>Password</label>
							</div>
							<div>
								<textarea class="s_reg_inputs" name="s_addr" id="s_addr" required=""></textarea>
								<label>addres</label>
							</div>
							<div id="seller_reg_sub_div">
								

								<button type="submit" id="seller_reg_sub_btn">Register</button>
							</div>


						</form>

					</div>
				</section>
					<section class="log_form_sec">
					<!-- login seller -->
					<div class="log_form_div">
						<div class="heading">
							<h3>LOGIN FORM</h3>
						</div>
						<form id="log_form">
							<div>
								<select class="log_inputs" id="sel_login_type" required="">
									<option>Acount Type</option>
									<option id="s_opt">I Am Seller</option>
									<option id="b_opt">I Am Buyer</option>

								</select>
							</div>
							<div>
								<input class="log_inputs" type="email" name="l_email" required="">
								<label>ex@gmail.com</label>
							</div>
							<div>
								<input class="log_inputs" type="password" name="l_pass" required="">
								<label>PASSWORD</label>
							</div>
							<div id="log_sub_div">
								<a href="" target="_blanck"  id="log_seller_sub_btn">LOGIN</a>

								<a  href="" target="_blanck" id="log_buyer_sub_btn">LOGIN</a>
							</div>
						</form>
					</div>
			</section>

		</div>
	</div>
</div>
<!-- library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="seller_js/seller-js.js"></script>
</body>
</html>