

$(document).ready(function(){
	console.log("seller_js.js is ready...to do work");
	//counter var..
	let size_count =1;
	let color_count = 1;
// func for display msg...
function msg(status,msgData){
	if (status == true) {
		$(".succ").html(msgData).slideDown();
		$(".error").slideUp();
		setTimeout(function(){
			$(".succ").html("").slideUp();
		},2560)
	}
		else if(status == false){
			$(".error").html(msgData).slideDown();
			$(".succ").html("").slideUp();
			stop_loader();

			setTimeout(function(){
			$(".error").html(msgData).slideUp();
			
			},3256);
		}
}
//func for start loader..
function loader(){
	$(".loader_main_div").css("display","flex");
}
// func for stop loader..
function stop_loader(){
setTimeout(function(){
$(".loader_main_div").css("display","none");

},1200)
}
// seller register user..
$("#seller_reg_fm_id").submit(function(reg_pre){
	reg_pre.preventDefault();
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		beforeSend:loader(),
		// dataType:"json",
		data:$(this).serialize(),
		success:function(reg_data){
			console.log(reg_data);
			stop_loader();
			msg(true , reg_data);
			if(reg_data == "yesfalse"){
				setTimeout(function(){
				msg(true,"register successfull..");

				$(".log_form_div").show();
				$(".seller_reg_form_div").hide();

				},1200)
			}
		}
	});//ajx..
});//reg.

//all dashboard btns..
function analytics1(){
	let action = "analytics";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		dataType:"json",
		data:{action:action},
		success:function(ana_res){
			let opt = ana_res.res;
			$.each(opt,function(ak,av){
				//chart1
			let ctx = $("#mychart1");
			let chart1 = new Chart(ctx,{
				type:"line",
				data:{
					labels:["discount","qty","total"],
					datasets:[{
						data:[av.od,av.oq,av.otot],
						label:"custome overviewe",
						backgroundColor:["rgb(221, 153, 255)","rgb(255, 51, 133)","rgb(255, 179, 128)"],

					}],

				},//data
				options:{
					title:{
						position:"bottom",
						display:true,
						text:"custome title for chart",
						fontSize:26,
						FontColor:"red",
				
					},//title
					tooltips:{
						enabled:true,
						backgoundColor:'hotpink',
						color:'white',

					},//tooltips
					animation:{
						duration:2560,
						ease:'easeInOutBounce',
					},
				},//opts

		});//ch1

			});//each..
		}
	});//ajx..
}
//analytics2
function analytics2(){
	let action = "analytics2";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		data:{action:action},
		dataType:"json",
		success:function(an2){
			respo = an2.res ;
			$.each(respo,function(bk,bv){
				let ctx2 =  $("#mychart2");
				mychart2 = new Chart(ctx2,{
					type:"bar",
					data:{
						labels:["pay pending","total_amt","ord pending","total_amt"],
						datasets:[{
							
							// data:[bv.ps,bv.ptot,bv.os,bv.ostot],
							data:[100,120,150,200],
							label:"custome chart",
							backgroundColor:[  '#3c8dbc',
                        '#f56954',
                        '#f39c12',],
						}],

					},//data
					options:{
						title:{
							position:"bottom",
							display:true,
							text:"custome chart title",
							fontSize:26,
							FontColor:"red",


						},//t
						tooltips:{
							enabled:true,
							backgroundColor:"hotpink",
							color:"white",
						},
						animation:{
							duration:2560,
							ease:"easeInOutBounce",
						},
					},//opt

				})//ctx2
			}) 
		}

	})//ajx..
}
// func for analytics3..
function analytics3(){
	let action = "analytics3";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		data:{action:action},
		dataType:"json",
		success:function(respo3){
			let opt3 = respo3.res;
			$.each(opt3,function(ck,cv){
			let ctx3 = $("#mychart3");
			let mychart3 = new Chart(ctx3,{
				type:"bar",
				data:{
					labels:["pay rec","total_amt","ord delivered","total_amt"],
					datasets:[{
						// data:[cv.p_rec,cv.tot_rec,cv.ord_de,cv.tot_de],
						data:[120,150,200,250],
						label:'custome chart for delivered and received',
						backgroundColor:["rgb(221, 153, 255)","rgb(255, 51, 133)","rgb(255, 179, 128)"],

					}],//dtaset

				},//dta
				options:{
					title:{
						position:'bottom',
						display:true,
						text:'custome title for chart',
						fontSize:26,
						FontColor:'red',
					},
					tooltips:{
						enabled:true,
						backgroundColor:'hotpink',
						color:'white',
					},
					animation:{
						duration:2560,
						ease:'easeInOutBounce',
					},
				},//opt
			})//mych3..
			});
		}
	});//ajx..
}
//func for analytics4.. 
function analytics4(){
	let act_over="analytics4";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		dataType:"json",
		data:{act_over:act_over},
		success:function(ana_res){
			$.each(ana_res,function(dk,dv){
				let ctx4 = $("#mychart4");
				let mychart4 = new Chart(ctx4,{
					type:"bar",
					data:{
						labels:["qty","dis","tot"],
						datasets:[{
							// data:[dv.yqty,dv.ydis,dv.ytot],
							data:[100,120,175,200],
							label:"chart for total in year",
							backgroundColor:["cyan","rgb(255, 179, 128)","hotpink"],
						}],//dts..
					},//dta..
					options:{
						title:{
							position:"bottom",
							text:"title for chart",
							fontSize:26,
							FontColor:"red",
						},
						tooltips:{
							enabled:"true",
							backgroundColor:"hotpink",
							color:"white",
						},//tool
						animation:{
							duration:2560,
							ease:"easeInOutBounce",
						}
					},//opt..
				})//my4
			})
		}
	});//ajx..
}
//overviwe btn..

//func for hide and show perticuler sections of dashboard..
function toggle_sec(className){
	$("."+className).show();
	$("section").not("."+className).hide();
}
//dash board btns action..
$("#dashhome").on("click",function(){
	toggle_sec("order_history_sec");
	ord_load_data();
});
//analytics btn..
$("#analytics_i").on("click",function(){
toggle_sec("analytics_sec");
analytics1();
analytics2();
analytics3();
analytics4();
});
//overview_i data will dis date wise..
$("#overview_i").on("click",function(){
	toggle_sec("overview_sec");
	let act_over = "panel_over" ;
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		data:{act_over:act_over},
		dataType:"json",
		success:function(over_res){
			console.log(over_res)
			$.each(over_res,function(dk,dv){
				//data
				//today
				if(dv.tqty > 0){
					today=`<tr>
					<td>${dv.tqty}</td>
					<td>${dv.t_tot}</td>
					</tr>`;
					$("#today").append(today);
				}else{$("#today").append('<td>Data not found..!</td>');}
				//week..
				if(dv.wqty >0){
					week=`<tr>
					<td>${dv.wqty}</td>
					<td>${dv.wtot}</td>
					</tr>`;
					$("#week").append(week);
					
				}else{$("#week").append('<td>Data not found..!</td>');}
				//month..
				if(dv.mqty>0){
					month+=`<tr>
					<td>${dv.mqty}</td>
					<td>${dv.mdis}</td>
					<td>${dv.mtot}</td>
					</tr>`;
					$("#month").append(month);
				}else{$("#month").append('<td>Data not found..!</td>');}
				//year
				if(dv.yqty>0){
					year+=`<tr>
					<td>${dv.yqty}</td>
					<td>${dv.ydis}</td>
					<td>${dv.ytot}</td>
					</tr>`;
					$('#year').append(year);
				}else{$("#year").append('<td>Data not found..!</td>');}

			})
		}
	});//axj
})

//add dboy btn..
$("#add_delBoy_i").on("click",function(){
toggle_sec("add_delBoy_sec");	
})
//show dboy list..
$("#show_dboy_i").on("click",function(){
	toggle_sec("dboy_list_sec")

	$("#dboy_list_tbody").empty();
	let action = "show_dboy_list";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		dataType:"json",
		data:{action:action},
		success:function(res){
			let respo = res.res ;
			$.each(respo,function(dbk,dbv){
				let list_html = `<tr>
							<td>${dbv.del_id}</td>
							<td>${dbv.b_fname}</td>
							<td>${dbv.b_lname}</td>
							<td>${dbv.b_ph_num}</td>
							<td>${dbv.d_b_status}</td>
						</tr>`;
						$("#dboy_list_tbody").append(list_html);
		
			})
		}
	});//ajx..
});
// dashborad ends..

//func for load dashboard order data..
function ord_load_data(){
	// toggle_sec("order_history_sec")
	$("#ord_load_data").html("")
	let action = "ord_data";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		data:{action:action},
		dataType:"json",
		success:function(ord_dta){
			let ord_res = ord_dta.res;
			let ord_html = "";
			$.each(ord_res ,function(ork,orv){
				 ord_html = `<tr>
				<td>${orv.ord_id}</td>
				<td class="dboy_id">${orv.dboy_id}</td>
				 <td>${orv.ofname}</td>
				 <td>${orv.olname}</td>
				 <td>${orv.total_amt}</td>
				 <td>${orv.pay_mode}</td>
				 <td>${orv.pay_status}</td>
				 <td>${orv.ad_on}</td>
				 <td><button class="btn btn-success ord_info_btn" data_ordId = "${orv.ord_id}" >more</button></td>
				 </tr>`;
				 $("#ord_load_data").append(ord_html);
			})
		}
	});//ajx..
}
 
ord_load_data();
//func for to get dboy id to show info in sub order sec..
function getdboyId(dboyid){
	let action = "getdboyId";
	if(dboyid !==""){
		$.ajax({
			url:"seller_backend.php",
			type:"POST",
			data:{action:action,dboyid:dboyid},
			dataType:"json",
			success:function(respo){
				let res = respo.res;
				let db_html = "";
				$.each(res,function(k,v){
					db_html = `<h3>dboy info </h3>
					<span>f Name : </span><span>${v.b_fname}</span>
					<span>L Name : </span><span>${v.b_lname}</span><br>
					<span>mob num : </span><span>${v.b_ph_num}</span>
					`;
					$(".db_info_div").append(db_html);
				});
			}
		});//ajx..
	}
}

//ord_info_btn show all order info of perticuler product..
$(document).on("click",".ord_info_btn",function(){
	toggle_sec("ord_sub_details-sec");
	 $(".db_info_div ,#ord_sub , #ord_sub_tfoot, .idsec span ,.ord_info_dboy").empty()

	let dboyid = $(".dboy_id").html();
	getdboyId(dboyid);
	show_de_boy(".ord_info_dboy");
	let action = "dataBy_ordid";
	let ord_id = $(this).attr("data_ordId");

	if(ord_id !== ""){
		$.ajax({
			url:"seller_backend.php",
			type:"POST",
			dataType:"json",
			data:{action:action,ord_id:ord_id},
			success:function(ordsub_response){
				let res =  ordsub_response.res ;
				let o_subDta_html ="";
				$(".idsec").append(`<span>${ord_id}</span>`);
				$.each(res,function(osk,osv){
					let img = 
				o_subDta_html=`<tr>
					<td><img src="${osv.prev_img}" alt="${osv.prod_name}" style="height:50px;width:50px;"></td>
					<td>${osv.prod_name}</td>
					<td>${osv.os_pirce}</td>
					<td>${osv.os_qty}</td>
					<td>${osv.os_size}</td>
					<td>${osv.os_color}</td>
					<td class="os_tot">${osv.os_tot_amt}</td>
				</tr>`;	
				$("#ord_sub").append(o_subDta_html);
				}) 
				let f_amt = 0;
				$(".os_tot").each(function(){
					f_amt += parseFloat($(this).html());
				})
				$("#ord_sub_tfoot").append(`<tr><td>${f_amt}</td>></tr>`);

			}
		});//ajx..
	}
});

//func for load login delivery boy..
function show_de_boy(div){
	let action = "show_log_d_boy";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		dataType:"json",
		data:{action:action},
		success:function(dblres){
			let res = dblres.res;
			let logdb_html = "";
			$.each(res,function(k,v){				
				logdb_html= `<option value="${v.b_fname}" data_db_id="${v.del_id}">${v.b_fname} ${ v.b_lname}</option>`;
			console.log(v.d_b_status);
			$(`${div}`).append(logdb_html);
			});			
			
		}
	});
}

//update dboyid in order tbl..
$(".ord_info_dboy").on("change",function(){
	let chid = $(this).children("option:selected").attr("data_db_id");
	let ord_id = $(".idsec span").html();
	if(chid !==""){
		$.ajax({
			url:"seller_backend.php",
			type:"POST",
			// dataType:"json",
			data:{chid:chid , ord_id:ord_id},
			success:function(res){
				alert(res);
			}
		});//ajx..
	}else{alert("some thing is issue..!")}
});
//buyer register user..
$("#reg_form").submit(function(r_pre){
	r_pre.preventDefault();
	$.ajax({
		url:"/e_commerce_project/buyer_folder/buyer_backend.php",
		type:"POST",
		beforeSend:loader(),
		// dataType:"json",
		data:$(this).serialize(),
		success:function(r_data){
			stop_loader();

			msg(r_data.status,r_data.msg);
			if (r_data == "yes") {
				setTimeout(function(){
				msg(true,"register successfull..")
				$(".reg_form_div").hide();
				$(".log_form_div").show();

				},1200)
			}
		}
	})
})
//select login type ie. seller or buyer..
$("#sel_login_type").on("change",function(){
	var acount_type = $(this).children("option:selected").val();
	console.log(acount_type);
	if (acount_type == "I Am Seller") {
	$("#log_seller_sub_btn").show();
	$("#log_buyer_sub_btn").hide();
	}else if(acount_type == "I Am Buyer"){
	$("#log_buyer_sub_btn").show();
	$("#log_seller_sub_btn").hide();
	}else if(acount_type == "Acount Type"){
	$("#log_buyer_sub_btn").slideUp();
	$("#log_seller_sub_btn").slideUp();

	}
})
// login user of seller..
$("#log_seller_sub_btn").on("click",function(log_pre){
	log_pre.preventDefault();
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		beforeSend:loader(),
		dataType:"json",
		data:$("#log_form").serialize(),
		success:function(log_data){
			stop_loader();
			msg(log_data.status,log_data.msg);
			if (log_data.status==true) {
				setTimeout(function(){
					window.location = "seller_home.php";
				},1200);
			
			}else{msg(false,"some thing is wrong please Enter correct info..!");}
		}	
	})
})
//login buyer user..
$("#log_buyer_sub_btn").on("click",function(lpre){
	lpre.preventDefault();
	console.log("log_buyer_sub_btn bnt click......")
	$.ajax({
		url:"/e_commerce_project/buyer_folder/buyer_backend.php",
		type:"POST",
		beforeSend:loader(),
		dataType:"json",
		data:$("#log_form").serialize(),
		success:function(log_data){
			console.log(log_data);
			stop_loader();
			msg(log_data.status,log_data.msg);
			if (log_data.status == true) {
				setTimeout(function(){
		 window.location = "/e_commerce_project/buyer_folder/buyer_home.php";

				},1200)
				}else{msg(false,"some thing is wrong please Enter correct info..!");}
		}
	})
});
//login to delhivery boy..
$("#dlog_sub_btn").on("click",function(dbpre){
	dbpre.preventDefault();
	let dph = $("#dlog_ph_num").val();
	let dbp = $("#dlog_pass").val();
	if(dph =="" || dbp == ""){
		alert("All Feilds Are Required..!");
	}else{
		$.ajax({
			url:"/e_commerce_project/delhivery_boy_folder/del_boy_backend.php",
			type:"POST",
			data:{dph:dph,dbp:dbp},
			dataType:"json",
			success:function(lres){
				msg(lres.status,lres.msg);
				if(lres.status == true){
					msg(lres.status,lres.msg);
					setTimeout(function(){
						window.location = "/e_commerce_project/delhivery_boy_folder/del_boy_home.php" ;
					},1256)
				}else{msg(false,"some thing is wrong please Enter correct info..!");}
				
			}
		});//ajx
	}
})

//func for display menu..
function menu_data(){
	action = "menu";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		dataType:"json",
		data:{action:action},
		success:function(m_data){
			// console.log(m_data);
			let d1 = m_data.res;
			let d2 = m_data.sess;
			if (d2 !== undefined) {
				$(".log_form_div").css("display","none");
				var show_menu = "";
				var sh_menu_pic = "";
			$.each(d1,function(k,v){
				var avt_len = v.avtar;
				avt_len = avt_len.length;
				show_menu+=`<ul>
					<li><a href="seller_home.php" id="menu_home_btn">Home</a></li>
					<li><a href="#" id="menu_profile_edit_btn">Edit Profile</a></li>
					<li><a href="#" id="menu_add_prdouct_btn">Add Product</a></li>
					<li><a href="#" id="menu_my_prdouct_btn">My Products</a></li>
					<li><a href="" id="menu_logout_btn">Logout</a></li>
				</ul>`;
					if (avt_len ==1) {
						sh_menu_pic+=`<div class="menu_btn_avtar">${v.avtar}</div>`;
					$(".login_menu_items").append(show_menu);
					}
					if (avt_len >1) {
					sh_menu_pic+=`<img src = "${v.avtar}" class="menu_btn_avtar
					">`;	
					$(".login_menu_items").append(show_menu);

					}	
					$(".menu_items").append(sh_menu_pic);
			})//
		}
			if(m_data == false) {
				var show_menu_un = "";
			show_menu_un+=`<ul>
				<li>register
			<ul>
				<li><a href="#" id="reg_b_btn">reg as Buyer</a></li>
				<li><a href="#" id="reg_s_btn">reg as seller</a></li>
			</ul>
				</li>
				<li><a href="#" id="log_form_open">Login</a></li>
			</ul>`;
				// console.log(show_menu_un +'afitya')
				$(".menu_items_log_reg").append(show_menu_un);
			}
		}
	})
}
menu_data();
// to add product menu_add_prdouct_btn..

//to  display seller profile info for update it..(menu_profile_edit_btn)..
$(document).on("click","#menu_profile_edit_btn",function(up_pre){
	up_pre.preventDefault();
	$(".dis_up_avt_div").html("");
	toggle_sec("seller_profile_update");
	$(".dash_main_container").hide();//flx
	$(".login_menu_items").slideUp('fast');
	$(".dis_up_avt_div").css("display","flex");
	let action = "display_profile_info"
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		data:{action:action},
		dataType:"json",
		success:function(updata){
			var result = updata.res;
			var pic_html="";
			let show_html = ""; 
			$.each(result,function(res_k,res_v){
				let pic_len = res_v.avtar;
				pic_len = pic_len.length;
				if (pic_len == 1) {
					pic_html = `<button id="show_pic_form">+</button><div class="up_avt">${res_v.avtar}</div>`
				}
					if (pic_len >1) {
						pic_html=`<button id="show_pic_form">+</button><img src="${res_v.avtar}" class="up_avt">`
					}
					$(".dis_up_avt_div").append(pic_html);
						show_html+=`<div class="seller_update_form_div">
						<div class="heading">
							<h3>Profile Info </h3>
						</div>
						<form id="seller_update_fm_id">
							<div>
								<input  class="s_update_inputs" name="s_update_fname" id="s_update_fname" value="${res_v.fname}" required="" >
								<label>First Name</label>
							</div>
							<div>
								<input  class="s_update_inputs" name="s_update_lname" id="s_update_lname" value="${res_v.lname}" required="">
								<label>Last Name</label>
							</div>
							<div>
								<input  class="s_update_inputs" name="s_update_email" id="s_update_email" value="${res_v.email}" required="">
								<label>ex@gmail.com</label>
							</div>
							<div>
								<input  class="s_update_inputs" name="s_update_ph_num" id="s_update_ph_num" value="${res_v.mob}" required="">
								<label>Mobil</label>
							</div>
							<div>
								<input  class="s_update_inputs" name="s_update_pass" id="s_update_pass" value="${res_v.pass}" required="">
								<label>Password</label>
							</div>
							<div>
								<textarea class="s_update_inputs" name="s_update_addr" id="s_update_addr"  required="">${res_v.s_addr}</textarea>
								<label>addres</label>
							</div>
							<div id="seller_update_sub_div">
								<button type="submit" id="seller_update_sub_btn">Update </button>
							</div>
						</form>
					</div>`;
			$(".update_profile_form_div").append(show_html);
			})
		}
	})
})

//show all product uploaded by login seller...
$(document).on("click","#menu_my_prdouct_btn",function(p){
	p.preventDefault();
	toggle_sec("upld_itm_holder_sec_row");
	let action = "my_product";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		data:{action:action},
		dataType:"json",
		success:function(data){
			$(".login_menu_items").slideUp();
			let res = data.res ;
			$.each(res,function(k,vv){
			let disc_limit = vv.prod_discp ;
			disc_limit = disc_limit.slice(0,120);
						load_html=`<div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
				<div class="main_product">
				<div class="data_holder">
					 <div class="pro_prev_img">
					 	<img src="${vv.prev_img}" class="prev_img">
					 </div>
					<div class="pro_other_details">
					<table class="table table-bordered">
					<tr>
						<th>price</th>
						<th>Dicount </th>
						<th> price</th>
					</tr>
						<tr>
							<td>${vv.prod_price} RS </td>
							<td> ${vv.prod_discount} </td>
							<td>${vv.remain_item}</td>
						</tr>
						</table>
					</div>
					<div class="pro_discp">
						<p>${disc_limit}</p>
						<button class="edit_product" data_prod_id="${vv.prod_id}">edit</button>
					</div>
				</div>
			</div>
		</div>`;
			$("#upld_itm_holder_row").append(load_html);

			})
		}
	});
});


//show picked product img for prev..

//display perticuler product info to update it..

$(document).on("click",".edit_product",function(){
toggle_sec("up_item_sec_holder");
	let action = "update_product" ;
	let prod_id = $(this).attr("data_prod_id");
		$.ajax({
			url:"seller_backend.php",
			type:"POST",
			data:{action:action,prod_id:prod_id},
			dataType:"json",
			success:function(data){
				let res = data.res ;
				let ff="";
				$.each(res,function(uk,uv){
					$("#up_size_tot").val(uv.s_tot);
					$("#upcolor_tot").val(uv.c_tot);
					$("#up_img_tot").val(uv.img_tot);

					$("#product_id").val(uv.prod_id);
					$("#pr_img_id").val(uv.pr_img_id);
					$("#up_prod_name").val(uv.prod_name);
					$("#up_prod_discp").val(uv.prod_discp);
					$("#up_prod_price").val(uv.prod_price);
					$("#up_prod_dics").val(uv.prod_discount);
					$("#up_prod_category").val(uv.prod_category);
					$("#up_quantity").val(uv.quantity);

					
					if (uv.i_size !==null || uv.i_color !==null || uv.pr_img !==null){

					 ff =`<input type="hidden" name="pr_img_id[]" class="pr_img_id" value="${uv.pr_img_id}">`;
					$("#up_item_sub_div").append(ff);
					console.log(ff +' ff');
					}


						if (uv.i_size !==null){
			let i_size=`<li><input  name="up_i_size[]" id="up_i_size1" value=${uv.i_size}></li>`;
						$(".up_i_size").append(i_size);
						
						}
						if (uv.i_color !==null) {
			let i_color=`<li><input  name="up_i_color[]" id="up_i_color1" value=${uv.i_color}></li>`;
						$(".up_i_color").append(i_color);

						}
						if (uv.pr_img !== null) {

			let i_img=`<img src="${uv.pr_img}" alt="${uv.prod_name}">
			<input type="file" name="all_img[]" id="all_img">`;

						}

				});
			}
		});//ajx	
});

//edit btn to edit product img
$(document).on("click",".pr_img_btn",function(btn_pre){
	btn_pre.preventDefault();
	$("#all_img").show();
})
//update product details..
// up_item_sub_btn
$("#up_item_form_id").submit(function(p){
	p.preventDefault();
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		beforeSend:loader(),
		data: $("#up_item_form_id").serializeArray(),
		success:function(up_ret){
			stop_loader();
			msg(true,"updated successfully..");
		}

	})
})
//update seller user profile pic..
$(document).on("click","#show_pic_form",function(){
$(".pic_form_div").show(); 
$(".dis_up_avt_div").css("display","none");
})
$("#pic_form_id").submit(function(pic){
pic.preventDefault();
$.ajax({
	url:"seller_backend.php",
	type:"POST",
	data:new FormData(this),
	contentType:false,
	cache:false,
	processData:false,
	success:function(pic_val){
		console.log(pic_val)
		msg(true,"profile pic updated successfully..")
	}
})
})
//now update profile..
$(document).on("click","#seller_update_sub_btn",function(u_pre){
	u_pre.preventDefault();
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		beforeSend:loader(),
		data:$("#seller_update_fm_id").serialize(),
		dataType:"json",
		success:function(u_response){
			stop_loader();
			msg(u_response.status,u_response.msg);
			if (u_response.status ==true) {
				setTimeout(function(){
				$("").hide();
				$("").show();

				})

			}
		}
	})
});//s.u.sbtn
//menu_btn_avtar click..
$(document).on("click",".menu_btn_avtar",function(){
	$(".login_menu_items").slideToggle();
})
//func for toggle between reg/log/dboy..forms..

function toggle_forms(className){
	$("."+className).css("display","flex");
	$("section").not("."+className).hide();
}
//open reg_buyer form..
$(document).on("click","#reg_b_btn",function(pre){
	pre.preventDefault();
	toggle_forms("reg_sec");
});
// open hide reg_seller form..
$(document).on("click","#reg_s_btn",function(rs_pre){
	rs_pre.preventDefault();
	toggle_forms("seller_reg_form_sec");
});
//ad_more_size btn it will add input feilds ..
$("#ad_more_size").on("click",function(spre){

		spre.preventDefault();
		size_count++ ;
		let str = "";
		str+=`<li><input class="item_inputs" name="i_size[]" id="i_size${size_count}"></li>`;
		console.log(str);
		$(".i_size").append(str);
		$("#size_tot").val(size_count);
});
//to open form of product..
$(document).on("click","#menu_add_prdouct_btn",function(propre){
	propre.preventDefault();
	toggle_sec("item_sec_holder");
	$(".login_menu_items").slideUp('fast');
}) 
//submit form of product..
$("#add_item_form_id").submit(function(ipre){
	ipre.preventDefault();
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		beforeSend:loader(),
		dataType:"json",
		data: new FormData(this),
		processData:false,
		contentType:false,
		success:function(item_res){
			console.log(item_res);
			if (item_res.status==true){

				setTimeout(function(){
				stop_loader();
				$("#add_item_form_id").trigger("register");
				msg(item_res.status,"product uploaded successfully..")
				},1256);
			}else{msg(false,"some thing Error..!"); stop_loader()}
		}
	})
});
//insert delhivery boy info to data base..
$("#db_sub_btn").on("click",function(pre){
	pre.preventDefault();
	let dfname = $("#dfname").val();
	if(dfname !==""){
		$.ajax({
			url:"seller_backend.php",
			type:"POST",
			data:$("#d_boy_fm").serialize(),
			// dataType:"json",
			success:function(boy_res){
				msg(true," New Delhivery Boy Addedd...");
				setTimeout(function(){
				$("#d_boy_fm")[0].reset();
				$(".add_delBoy_div").fadeOut();

				},1256);
			}
		})
	}else{alert("All Feilds Are Required..!")}
})
//ad_more_color_btn btn it will add input feilds ..
$("#ad_more_color_btn").on("click",function(cpre){
	cpre.preventDefault();
	color_count++ ;
	let str = "";
	str+=`<li><input class="item_inputs" name="i_color[]" id="i_color${color_count}"></li>`;
	
	$(".i_color").append(str);
	$("#color_tot").val(color_count);
})
$("#all_img").change(function(){
	let img_tot = this.files.length
	console.log(img_tot);
	$("#img_tot").val(img_tot);
})
//open / hide login form..
$(document).on("click","#log_form_open",function(log_btn_pre){
	log_btn_pre.preventDefault();
	toggle_forms("log_form_sec");
})
//open/hide delhivery_boy login form
$("#d_boy_log_btn").on("click",function(pre){
	pre.preventDefault();
	toggle_forms("d_log_fm_sec")
})
// close delhivery boy form..
$("#cls_db_fm").on("click",function(stp){
	stp.preventDefault();
	$("#d_boy_fm")[0].reset();
	$(".add_delBoy_sec").fadeOut();
})
//cls cls_os_ddiv..
$("#cls_os_ddiv").on("click",function(){
	toggle_sec("order_history_sec");
	ord_load_data();
})
//close dboy list div..
$("#close_dboy_list_btn").on("click",function(){
	$(".dboy_list_div").hide();
	$(".order_history_main").show();
})
//close pic form..
$("#cls_pic_form").on("click",function(cl_pre){
	cl_pre.preventDefault();
	$('.dis_avt_div').css("display","flex");
	$(".pic_form_div").toggle();
})
//logout seller ..
$(document).on("click","#menu_logout_btn",function(logout){
	logout.preventDefault();
	let act_log = "logout_seller";
	$.ajax({
		url:"seller_backend.php",
		type:"POST",
		dataType:"json",
		data:{act_log:act_log},
		success:function(data){
			console.log(data);
			msg(data.status,data.msg);
			setTimeout(function(){window.location="seller_log_reg.php"},2156)
		}
	});//ajx..
})
});//READY...1180