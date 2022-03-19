<!DOCTYPE html>
<html>
<head>
	<title>seller home page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
					
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href='https://fonts.googleapis.com/css?family=Sofia|Aldrich' rel='stylesheet'>

			<link rel="stylesheet" type="text/css" href="seller_css/seller_css.css">
		<link rel="stylesheet" type="text/css" href="/e_commerce_project/common_css.css">
<style>

		body{
		background: linear-gradient(-30deg,rgb(51,204,255),rgb(129,213,255),rgb(255,204,255),rgb(129,213,255));
			background-attachment: fixed;
}
h3{font-family: "Aldrich" ;}
/*592..*/


/**/

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

<div class="alert alert-success succ"></div>
<div class="alert alert-danger error"></div>
	<!-- menu when user login -->
	<!-- <div class="sh_menu_avtar"></div> -->

 <div class="menu_items"></div>
	<div class="login_menu_items"></div>


	<!-- start seller dashboard.. -->
		<div class="container-fluid">
	<div class="dash_main_container">
	


		<div class="row">
			<div class="col-sm-1 col-md-1">
		<div class="dash_menu_div">
				<ul>
					<li><span id="dashhome"><i class="fa fa-home"></i></span>
					 <div class="tooltips"><p>home page of dashboard</p></div>
					</li>
					<li><span id="analytics_i"><i class="fa fa-bar-chart"></i></span>
<div class="tooltips"><p>Analytics</p></div>
					</li>
					<li><span id="add_delBoy_i"><i class="fa fa-user-plus"></i></span>


<div class="tooltips"><p>Add Delhivery Boy</p></div>
					</li>
					<li><span id="show_dboy_i"><i class="fa fa-users"></i></span>
<div class="tooltips"><p>show my delhivery Boys</p></div>
					</li>
					<li><span id="overview_i"><i class="fa fa-bar-chart"></i></span>
<div class="tooltips"><p>overview</p></div>
					</li>
					<li><span><i class="fa fa-bar-chart"></i></span>
<div class="tooltips"><p>home page of dashboard</p></div>
					</li>

				</ul>

		</div>
	</div>
	<div class="col-sm-11 col-md-11">
		<section class="order_history_sec">
		<div class="order_history_main" >
			<h3>order details..	</h3>
			<table class="table table-responsive" id="ord_tbl">
				<tr>
					<th>Ord Id</th>
					<th>dboy Id</th>
					<th>F Name</th>
					<th>L Name</th>
					<th>Total</th>
					<th>pay MOde</th>
					<th>pay status</th>
					<th>Date</th>
					<th>Details</th>
				</tr>
			<tbody id="ord_load_data"></tbody>		
			</table>

		</div>
	</section>
		<!-- order_history_main end -->
		<section class="ord_sub_details-sec">
		<div class="ord_sub_details-div">
			<div class="close_sec">
				<span id="cls_os_ddiv"><i class="fa fa-angle-double-left fa-2x"></i></span>
			</div>
			<div class="idsec">
				<b>order id</b>
			</div>
			<table class="table table-responsive" id="ord_sub_details-tbl">
				<tr>
					<th>prev img</th>
					<th>prdct Name</th>
					<th>price</th>
					<th>qty</th>
					<th>size</th>
					<th>color</th>
					<th>total</th>

				</tr>
				<tbody id="ord_sub"></tbody>
				<tfoot id="ord_sub_tfoot">
					<tr><th>Final Amt</th></tr>
				</tfoot>
			</table>
			<div id="sel_d_boy_btn_div">

				<div class="db_info_div"></div>
				<p class="text-muted">select Delivery boy to deliver a product</p>
				<select class="ord_info_dboy">
					<option>plz select</option>
				</select>
			</div>
			<div id="sel_d_boy_div"></div>

		</div>
	</section>
	<!-- ord_sub_details end -->
<!-- start show dboy list.. -->
<section class="dboy_list_sec">
<div class="dboy_list_div" >

	<h3>delivery boy list</h3>
	<div class="close_dboy_list_div">
		<span id="close_dboy_list_btn"><i class="fa fa-angle-double-left fa-2x"></i></span>

	</div>
	<table class="table table-bordered">
		<tr>
			<th>dboy Id</th>
			<th>Fist Name</th>
			<th>Last Name</th>
			<th>Mob Num</th>
			<th>status</th>

		</tr>
		<tbody id="dboy_list_tbody"></tbody>
	</table>
</div>
</section>
<!-- ends show dboy list.. -->
	<!-- form for add delhivery boy.. -->
	<section class="add_delBoy_sec">
	<div class="add_delBoy_div">
		<h3>Add Delhivery Boy</h3>
		<form class="form-row" id="d_boy_fm">
			<div class="form-group">
				<input  class="form-control" name="dfname" id="dfname" required>
				<label>Fisrt Name *</label>
			</div>
			<div class="form-group">
				<input  class="form-control" name="dlname" id="dlname" required>
				<label>Last Name *</label>
			</div>
			<div class="form-group">
				<input  class="form-control" name="dphnum" id="dphnum" required>
				<label>Mob Num *</label>
			</div>
			<div class="form-group">
				<input  class="form-control" name="dpass" id="dpass" required="">
				<label>PassWord *</label>
			</div>
			<div class="db_sub_div"> 
				<button  type="submit" id="db_sub_btn">Submit</button>
				<button  id="cls_db_fm">close</button>
			</div>

		</form>
	</div>
</section>
<!-- ends form for add delhivery boy.. -->

<!-- start analytics.. -->
<section class="analytics_sec">
	<div class="analytics_main_div">
		<h3>Analytics</h3>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
			<h5 class="text-muted">chart1</h5>
				<div id="chart_for_tot_item_sold">
			<canvas id="mychart1"></canvas>
		</div>
			</div>
			<!-- end chart1 -->
			<div class="col-sm-6 col-md-6">
			<h5 class="text-muted">chart2</h5>
				<div id="chart_for_tot_item_sold">
			<canvas id="mychart2"></canvas>
		</div>
			</div>
			<!-- end chart2 -->
			<div class="col-sm-6 col-md-6">
				<h5 class="text-muted">chart3</h5>
				<div id="chart_for_tot_item_sold3">
					<canvas id="mychart3"></canvas>
				</div>
			</div>
<!-- end chart3 -->
<div class="col-sm-6 col-md-6">
	<h5 class="text-muted">chart4</h5>
	<div id="chart_for_tot_item_sold">
		<canvas id="mychart4"></canvas>
	</div>

</div>
<!-- end chart4 -->
		</div>		
	</div>
</section>
<!-- ends analytics.. -->
<section class="overview_sec">
	<h5>overAll information date wise..</h5>
	<div class="row">
		
		<div class="col-sm-7 col-md-7">
			
	<div class="panel panel-default">
		<div class="panel-heading" style="background: rgb(217, 179, 255);color: white;">
			<h5>Today's Data</h5>
		</div>
		<div class="panel panel-body">
 			<table class="table table-bordered">

				<tr>
					<th>qty</th>
					<th>Total</th>
				</tr>
				<tbody id="today"></tbody>
 			</table>
		</div>
	</div>
</div>
	<!--ends today panel   -->
		<div class="col-sm-5 col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading"style="background: rgb(217, 179, 255)	;color: white;"><h5>Month Data</h5></div>
		<div class="panel-body">
			<table class="table table-responsive">
				<tr>
					<th>qty</th>
					<th>discount</th>
					<th>Total</th>

				</tr>
				<tbody id="month"></tbody>
			</table>
		</div>
	</div>
</div>
<!-- ends month panel -->
	<div class="col-sm-7 col-md-7">
	<div class="panel panel-default">
		<div class="panel-heading"style="background:rgb(217, 179, 255);color: white;"><h5>week data</h5></div>

		<div class="panel-body">
			<table class="table table-responsive">
				<tr>
					<th>qty</th>
					<th>Total</th>
				</tr>
				<tbody id="week"></tbody>
			</table>
		</div>
	</div>
</div>

	<!-- ends week panel -->


<div class="col-sm-5 col-md-5">
<div class="panel panel-default">
	<div class="panel-heading"style="background:rgb(217, 179, 255);color: white;"><h5>year data</h5></div>
	<div class="panel-body">
		<table class="table table-responsive">
			<tr>
				<th>qty</th>
				<th>Discount</th>
				<th>Total</th>
			</tr>
			<tbody id="year"></tbody>
		</table>
	</div>
</div>
</div>
</div>
<!-- ends year panel -->
</section>


	</div>
	</div>
	</div>

	<!-- ends seller dashboard.. -->

	
</div>


<div class="container">
	
	<!-- form for add product... -->
	<div class="row" id="item_row">
		<section class="item_sec_holder">	
	<div class="item_div_holder">
	<div class="add_item_fm_div">
		<div class="heading">
			<h3 id="ah">Add Item</h3>
		</div>

		<form enctype="multipart/formdata" id="add_item_form_id">
		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="prod_name" id="prod_name">
			<label>Prdoduct Name</label>
		</div>	
		<div class="col-sm-6 col-md-6">

			<textarea class="item_inputs"  name="prod_discp" id="prod_discp"></textarea>
			<label>About product</label>
		</div>
		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="prod_price" id="prod_price">
			<label>Price</label>
		</div>

		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="prod_dics" id="prod_dics">
			<label>Discount</label>
		</div>

		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="prod_category" id="prod_category" placeholder="ex : mobile , shoes">
			<label>category</label>
		</div>
		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="quantity" id="quantity">
			<label>quantity</label>
		</div>
	
 			<ul class="i_size">
				<button id="ad_more_size">+</button>
			<span>size</span>

			<li><input class="item_inputs" name="i_size[]" id="i_size1"></li>

		</ul>
					<ul class="i_color">
				<button id="ad_more_color_btn">+</button>
			<span>colors</span>

			<li><input class="item_inputs" name="i_color[]" id="i_color1"></li>

		</ul>

 		<div class="col-sm-6 col-md-6">
			<input type="file" name="prev_img" id="prev_img">
			<label>only one </label>

		</div>
		<div class="col-sm-6 col-md-6">
			<input type="file" name="all_img[]" id="all_img" multiple="">

			<label>All images</label>
		</div>


				<div class="col-sm-12 col-md-12" id="item_sub_div">
				

					<input type="hidden" name="size_tot" id="size_tot" value="1">
					<input type="hidden" name="color_tot" id="color_tot" value="1">
					<input type="hidden" name="img_tot" id="img_tot" value="">
 

				<button type="submit" id="item_sub_btn">Upload</button>
			</div>

		</form>
	</div>
</div>
</section>

<!--ends form for add product... -->
		</div>
	</div>

<!-- start -->
<div class="row" id="up_item_row">
	<section class="up_item_sec_holder">
	<div class="up_item_div_holder">
	<div class="up_add_item_fm_div">
		<div class="heading">
			<h3>UPDATE PRODUCT </h3>
		</div>

		<form enctype="multipart/formdata" id="up_item_form_id">
		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="up_prod_name" id="up_prod_name">
			<label>Prdoduct Name</label>
		</div>	
		<div class="col-sm-6 col-md-6">
			<textarea class="item_inputs"  name="up_prod_discp" id="up_prod_discp"></textarea>
			<label>About product</label>
		</div>
		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="up_prod_price" id="up_prod_price">
			<label>Price</label>
		</div>

		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="up_prod_dics" id="up_prod_dics">
			<label>Discount</label>
		</div>

		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="up_prod_category" id="up_prod_category">
			<label>category</label>
		</div>
		<div class="col-sm-6 col-md-6">
			<input class="item_inputs" name="up_quantity" id="up_quantity">
			<label>quantity</label>
		</div>
	
  			<ul class="up_i_size">
			<span>size</span>


		</ul>
					<ul class="up_i_color">
			<span>colors</span>


		</ul>



		<div id="up_prev_img_div" class="col-sm-6 col-md-6">

		</div>
				<div id="show_pick_img" class="col-sm-6 col-md-6"></div>
 

				<div class="col-sm-12 col-md-12" id="up_item_sub_div">
					<input type="hidden" name="product_id" id="product_id" value="">
					<input type="hidden" name="pr_img_id" id="pr_img_id" value="">
					
					<input type="hidden" name="up_size_tot" id="up_size_tot" value="">
					<input type="hidden" name="upcolor_tot" id="upcolor_tot" value="">
					<input type="hidden" name="up_img_tot" id="up_img_tot" value="">


				<button type="submit" id="up_item_sub_btn">Update Product</button>
			</div>

		</form>
	</div>
</div>
</section>
</div>


<!--end  form for update product  data..  -->
<section class="seller_profile_update">
	<div class="row" id="update_profile_r">
		<!-- <section class="seller_profile_update"> -->
		<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="pic_form_div">
					<a href="#" id="cls_pic_form"><i class="fa fa-angle-double-left"  style="font-size: 2rem; z-index: 120">X</i></a>
					<form enctype="multipart/formdata" id="pic_form_id">
						<input type="file" name="edit_pic" id="edit_pic"><br></br>
						<button type="submit" id="pic_up_btn">update pic</button>
					</form>
				</div>


				<div class="dis_up_avt_div">
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8">
				<div class="update_profile_form_div">
					
				</div>
			</div>
				
			<!-- </section> -->

		</div>
	</div>
</section>
	<!-- show uploaded items  -->
	<section class="upld_itm_holder_sec_row">
	<div class="row" id="upld_itm_holder_row"></div>	
	</section>
	
	<!-- show uploaded items  -->

</div>


<!-- library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="seller_js/seller-js.js"></script>

</body>
</html>