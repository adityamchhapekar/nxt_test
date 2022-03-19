<!DOCTYPE html>
<html>
<head>
	<title>buyer home page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia,Aldrich' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="buyer_css/buyer_css.css">
	<link rel="stylesheet" type="text/css" href="/e_commerce_project/common_css.css">

<style>
body{
height: 100vh;width: 100vw;
background: linear-gradient(-30deg,rgb(51,204,255),rgb(129,213,255),rgb(255,204,255),rgb(129,213,255));
background-attachment: fixed;
}

@media screen AND (max-width: 1000px){
	.check_data_holder{height: auto; width: auto; margin: 6rem;}
	.ord_details{height: auto; width: auto; margin: 6rem;}

}
</style>
</head>
<body>
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


	<!-- pop-up when user add product to cart.. -->
	<div class="pop_crt">
		<div class="heading"><h4>product added successfully To Cart..</h4></div>
		<button id="cls_crt_pop">close</button>
	</div>
<!-- CREATE TABLE `e_com`.`cart` ( `cr_id` INT NOT NULL AUTO_INCREMENT , `cr_pr_fk` INT NOT NULL , `cr_us_fk` INT NOT NULL , `add_on` TIMESTAMP NOT NULL , PRIMARY KEY (`cr_id`), INDEX (`cr_pr_fk`), INDEX (`cr_us_fk`)) ENGINE = InnoDB;

ALTER TABLE `cart` DROP FOREIGN KEY `cart_ibfk_2`; ALTER TABLE `cart` ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cr_us_fk`) REFERENCES `e_com`.`customer_user`(`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE; -->


<div class="menu_header">
	
	<div class="search_div">
		<input type="text" name="main_search" id="main_search" placeholder=" | search products">
		<a href="#" id="search_icon"><i class="fa fa-search fa-2x" id="s_icon"></i></a>
		<a href="#" id="s_close" style="font-size: 2rem ; display: none;">X</a>
	</div>

	<select id="category">

		<option class="sel_cate">category</option>
	</select>
</div>
<div class="menu_item"> <i class="caret"></i> </div>
<div class="container-fluid">
	<section class="row_products_sec"> 
		<center>
	<div class="row" id="row_products"></div>
		</center>

	</section>
			<!--start display cart -->
			<section class="show_cart_row_sec"> 
			 <div class="row" id="show_cart_row">
			<table class="table table-responsive" id="cart_tbl">
				<tr>
				<th>products</th>
				<th>Details</th>
				<th>Discount</th>
				<th>price</th>

				<th>qty</th>


				<th>Total</th>
				<th>Remove</th>
			</tr>
			<tbody id="cart_body"></tbody>
			<tfoot id="cart_footer" align="center">

				<tr><td class="grand"> </td></tr>
				<tr id="check_tr">
					<td><button id="checkOutBtn" dataPrId="" dataUsId="">Check Out</button></td>
				</tr>
			</tfoot>
			</table>


				<div class="cart_close_div">
					<a href="#" id="cart_close"><i class="fa fa-angle-double-left"></i>close</a>
				</div>
				<!-- <div class="grand_tot"><p>aditya</p></div> -->

			</div>
		</section>
 			<!--end display cart -->

<!-- 			<!- display products.. -->
		<div class="row">
		<div class="col-sm-12">
			<!-- display product all info when clicked on read more.. -->
			<section class="actual_prod_row_sec">
			<div class="row" id="actual_prod_row">
				

				<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="prod_all_imgs"></div>
					
				</div>

				<div class="col-xs-12 col-sm-9 col-md-9" id="nxt_row">
					<div class="nxt_main_data_holder">
						<p><h3 id="tv_prod_name"></h3></p>
				<div class="nxt_pro_prev_img">
					
					<img src=""  class="float-right prev_img"height="100px" width="100px">
					</div>
					<div class="actual_prod">
						<p class="nxt_rs_div"> </p>
						<ul class="sizes">
							<span>sizes</span>
							</ul>

							<br><br>
						<ul class="colors">
							<label>colors</label>
							</ul>
							<br><br>
							<span>remain <b id="remain_item"></b></span>
								<br><br>
							<div class="qty_div">
								<label>qty </label>
								<select class="qty_sel">
									<option class="qty_opt" value="1">1</option>
									<option class="qty_opt" value="2">2</option>
									<option class="qty_opt" value="3">3</option>

								</select>

							</div>
						<p id="prod_discp"></p>
						<span id="cls_nxt_main"> <i class="fa fa-angle-double-left fa-2x"> </i></span>
						<b class="cls_info">close</b>
						

						<button class="to_cart_btn" data_pro_cart_id="" crt_sel_fk="">Add To cart</button>
					</div>


					</div>					

				</div>
			</div>
		</section>

			<!-- display profile -->
			<section class="main_card_sec">
			<div class="main_card">
<div class="card_profile">
				<span id="cls_pro_card"><i class="fa fa-angle-double-left fa-2x"></i></span>

				 <div class="avt_div">
						<div class="round" id="r_a"></div>
						<div class="round" id="r_b"></div>

					</div>
				</div>
			</div>
	</section> 
				<section class="update_form_sec">
				<div class="update_form_div">
					<div class="heading">
						<h3>update profile</h3>
					</div>
				</div>
			  </section>

 		<!-- col -->
 		<!-- check out section start -->
 		<section class="check_data_holder_sec"> 
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9">
			
			<div class="check_data_holder">
				<span id="cls_chkout_fm"><i class="fa fa-angle-double-left fa-3x"></i></span>
				<div class="heading">

					<h3>Check Out</h3>
				</div>

				<form id="check_fm">
					<div class="form-row">
					<div class="form-group col-sm-4">
						<input type="hidden" name="sel_fk" id="sel_fk">
						<input   class="form-control item_inputs"  type="text" name="chk_fname" id="chk_fname">
						<label>First name</label>

					</div>
					<div class="form-group col-sm-4 col-md-4">
						<input class="form-control item_inputs" name="chk_lname" id="chk_lname">
						<label>Last Name</label>
					</div>
					<div class="form-group col-sm-4 col-md-4">
						<input class="form-control item_inputs" name="chk_email" id="chk_email" readonly>

						<label>Email</label>
					</div>
					<div class="form-group col-sm-4 col-md-4">
						<textarea class="form-control item_inputs" id="chk_addr" name="chk_addr"></textarea>
					</div>
					<div class="form-group col-sm-12"> 
						<select  class="form-control item_inputs pay_mode" name="pay_mode">
							<option>pay mode</option>
							<option value="stripe"> pay with card</option>
							<option value="cod" >cod</option>
						</select>

					</div>
						
					<!-- </div> -->


<!-- pay with card details.. -->
		<!-- pay with card details.. -->
				<section class="pay_card_stripe_sec" style="display: none;">
		
					<div class="form-group col-sm-4">
						<label>YOUR NAME</label>
						<input type="text" class="form-control item_inputs" name="stripe_fname" id="stripe_fname">
					</div>

					<div class="form-group col-sm-4">
						<label>YOUR EMAIL</label>
						<input type="email" class="form-control item_inputs" name="stripe_email" id="card_email">
					</div>
					<div class="form-group col-sm-4">
						<label>YOUR CARD NUM</label>
						<input type="text" class="form-control item_inputs" name="stripe_crd_num" id="card_num">
					</div>

					<div class="form-group col-sm-4">
						<label>Exp month</label>
						<select id="exp_month" class="form-control item_inputs">
							<option>1</option>
							<option>2</option>

							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>

							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label>exp year</label>
						<select id="exp_year" class="form-control item_inputs">
							<option>2021</option>
							<option>2022</option>

							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
							<option>2027</option>

							<option>2028</option>
							<option>2029</option>
							<option>2030</option>
						</select>

					</div>
					<div class="form-group col-sm-4">
						<label>CVC</label>
						<input type="text" class="form-control item_inputs" name="stripe_cvc" id="stripe_cvc">
				<input type='hidden' name='amount'  id="stripe_amt" >
				 <inpu type='hidden' name='currency' value='inr'> 
				 	<!-- <input type='hidden' name='item_name'  id="stripe_prod_name"> -->
                </div>
		</section>
					
		


					<div class="col-sm-12 col-md-12 ord_sub_div">
						<button type="submit" name="ord_sub" id="ord_sub">Pay Now</button>
					</div>

				</form>
			</div>
		</div>		
<!--  -->
	</div>

	<!-- 					let chkfm=`<input type="hidden" name="chk_size[]" value="${vals.p_size}">
					<input type="hidden" name="chk_color[]" value="${vals.p_color}">
					<input type="hidden" name="chk_price[]" value="${vals.p_price}" disabled>
					<input type="hidden" name="chk_qty[]" value="${vals.qty}" disabled>
					<input name="chk_tot[]" value="${chk_tot}">Total : ${chk_tot}</li>`;
					$(".form-row").append(chkfm);
 -->
		<div class="col-xs-12 col-sm-3 col-md-3">
			<div class="ord_details">
				<h3>Your Cart</h3>
				<input name="chk_tot_fm" id="chk_tot_fm" type="hidden">
				
			</div>				
		</div>

	</div>
</section>
<!-- check section ends -->
	</div>
</div>




	<!-- library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="buyer_js/buyer_js.js"></script>


</body>
</html>