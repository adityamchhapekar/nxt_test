
<!DOCTYPE html>
<html>
<head>
	<title>delhivery boy welcome page..</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href='https://fonts.googleapis.com/css?family=Sofia,Aldrich' rel='stylesheet'>

<style >
html{font-family:Sofia ; }
h3{font-family: Aldrich ;}
	#close_osub_div_div{
		padding: 5px;
		border-bottom: 1px solid rgba(0,0,0,.25);
	}
	#close_osub_div_div #close_btn_o_sub{cursor: pointer; color: red;}
	#close_up_fm{
		height: 35px;
		width: 120px;
		margin: 12px ;
		background: white;
		border: 2px solid red;


	}
	.update_fm_div{display: none;}
</style>
	</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>	
		</button>
		<a href="#" class="navbar-brand">logo</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
	<ul class="nav navbar-nav">
	<li><a href="#" id="">home</a></li>
	<li><a href="#" id="profile_btn">profile</a></li>
	<li><a href="#" id="logout_dboy_btn">Logout</a></li>
	<li><a href="#" id="">home</a></li>
	<li><a href="#" id="">home</a></li>
	<li><a href="#" id="">home</a></li>
	<li><a href="#" id="">home</a></li>
	<li><a href="#" id="">home</a></li>
</ul>	
	</div>
</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12">

			<div class="main-div-page">
				<div class="load-delivery-info">
					<h3>ORDER DETAILS </h3>
					<table class="table table-bordered">
						<tr>
							<th>ord Id</th>
							<th>F Name</th>
							<th>L Name</th>
							<th>addr</th>
							<th>total amt</th>
							<th>pay Mode</th>
							<th>ord status</th>
							<th>Details</th>

						</tr>
						<tbody id="load-data_tbody"></tbody>
					</table>
				</div>


				<!-- close load-delivery-info -->
				<div class="ord_sub_div" style="display: none;">
					<div id="close_osub_div_div">
						<span id="close_btn_o_sub"><i class="fa fa-angle-double-left fa-2x"></i></span>
					</div>
					<h3>ORDER SUB DETAILS </h3>
					<table class="table table-responsive">
						<tr>
							<th>p name</th>
							<th>price</th>
							<th>qty</th>
							<th>size</th>
							<th>color</th>
							<th>Total</th>
						</tr>
						<tbody id="ord_sub_tbody"></tbody>
						<tfoot id="ord_sub_tfoot">
							<tr><th>final Amt</th></tr>
						</tfoot>
					</table>
					<div class="addr_div"></div>
					<div class="change_del_status_div">
						<select class="change_del_status_select"></select>
					</div>
				</div>
				<!--end  -->
				<!-- start update fm -->
				<div class="update_fm_div" >
					<h3>profile Info</h3>
					<h5>you are able To Update password only..</h5>
					<form class="form-row" id="up_fm">
						<div class="form-group">
							<input name="" class="form-control" id="up_fname" disabled="">
							<label>First Name</label>
						</div>
						<div class="form-group">
							<input name="" class="form-control" id="up_lname" disabled="">
							<label>Last Name</label>
						</div>

						<div class="form-group">
							<input name="" class="form-control" id="up_ph_num" disabled="">
							<label>Mob Num</label>
						</div>

						<div class="form-group">
							<input class="form-control" name="up_pass" id="up_pass">
							<label>Password</label>
						</div>
						<div class="form-group">
							<input class="btn btn-success" type="button" id="up_btn" name="up_btn" value="update">
						<button id="close_up_fm">close Tab</button>	
						</div>

					</form>
				</div>
				<!-- end -->
			</div>
		</div>
	</div>
</div>
<!-- library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="del_boy_js.js"></script>
</body>
</html>