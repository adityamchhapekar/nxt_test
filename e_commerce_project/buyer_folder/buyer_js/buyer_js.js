$(document).ready(function(){
// Publishable key:pk_test_51JdrlISAXP3sWL5RSswVQzgeZO1Hlh273z3d8K3yInEHjfQlrHgH2L0XY9kwVk2pKy7c0ne5xw7RinjTIcX1BpUR00QWVjsLea
//Secret key: sk_test_51JdrlISAXP3sWL5RYs7V2VXTSSsLBJfNJ8EU18VxUaSP4fvv1iNUZ1vY8oejAr9s2xUFU8HVkO4rxhan7l8oPQDq00NIH98zag
	$(window).scroll(function(){
var h= $(window).scrollTop() + $(window).height() ;
	// alert(h)
	if(h >656){

		$(".menu_header").css("background","rgb(218, 179, 255)")

	}else{
		$(".menu_header").css("background","")

	}
})
console.log('buyer js file is ready to do work...');
//func for succ error msg...
function msg(status,msg){
	if (status == true){
			$(".succ").html(msg).slideDown();
			$(".error").slideUp();
			setTimeout(function(){
			$(".succ").slideUp();
		},2156);
	}//if
		else if(status  == false){
			$(".error").html(msg).slideDown();
			$(".succ").slideUp();
			setTimeout(function(){
				$(".error").slideUp();
			},2156);			
		}//elseif
}
//func for start loader..
function start_loader(){
	$(".loader_main_div").show();
	// $(".loader_main_div").css("display","flex");
}
//func for stop loader..
function stop_loader(){
	$(".loader_main_div").css("display","none");
}
//func for toggle sec i.e hide/show..
function toggle_sec(className){
	$("."+className).show();
	$("section").not("."+className).hide();
}
//show search input..
$("#search_icon").on("click",function(spre){
	spre.preventDefault();
	if($(window).width() <= "720"){
	$("#main_search").css({"width":"175" ,"opacity":"1"});

	}else{
	$("#main_search").css({"width":"250" ,"opacity":"1"});

	}
$(".search_div").css("background","aquamarine");
$("#s_close").show();
$(this).hide();

})
$("#s_close").click(function(pre){
	pre.preventDefault();
	$("#main_search").css({"width":0,"opacity":0}).val("");
	$(".search_div").css("background","");
	$(this).toggle();
	$("#search_icon").toggle();
})
//func for load products..
function load_product(cust_action,inputData=""){

	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{cust_action:cust_action,inputData:inputData},
		dataType:"json",
		success:function(load_data){
			let res = load_data.res;
			// console.log(res);
			let load_html = "";
			$.each(res,function(lk,lv){
				let folder =`/e_commerce_project/seller_folder/${lv.prev_img}` ;
				// console.log(folder);
				//it will set lim on dicrption..
			let disc_limit = lv.prod_discp ; 
				disc_limit = disc_limit.slice(0,120);
				// console.log(disc_limit + 'lim..')
			//<!-- display products.. -->

			load_html=`<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="main_product">
				<div class="data_holder">

					 <div class="pro_prev_img">
					 	<img src="${folder}" class="prev_img">
					 </div>
					<div class="pro_other_details">
					<table class="table table-bordered">
					<tr>
						<th>price</th>
						<th>Dicount </th>
						<th> avl items</th>

					</tr>
						<tr>
							<td>${lv.prod_price} RS </td>
							<td> ${lv.prod_discount} </td>
							<td>${lv.remain_item}</td>


						</tr>
						</table>

					</div>


					<div class="pro_discp">
						<p>${disc_limit}</p>
						<button class="read_more" data_prod_id="${lv.prod_id}">Read More</button>

					</div>
				</div>
			</div>
		</div>`;
			// console.log(load_html);
			$("#row_products").append(load_html);

			});
		

		}
	});//ajx..

}
load_product("load_product");
//it search data trhough selected category..
function load_category(){
	let cust_action = "load_category" ;
	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{cust_action:cust_action},
		dataType:"json",
		success:function(data){
			let res = data.res;
			let show = "";
			$.each(res,function(cgk,cgv){
				let category =`<option class="sel_cate">${cgv.prod_category}</option>`;
				$("#category").prepend(category);
			})
		}
	})

}//func 
load_category();
$("#category").on("change",function(){
	$("#row_products").html("");
	toggle_sec("row_products_sec");
	let cust_action = "act_category" ;
	let inputData = $(this).children("option:selected").val();
	load_product(cust_action,inputData);
});
// it will show data acording to search..
$("#main_search").on("keyup",function(){
	$("#row_products").html("");
	toggle_sec("row_products_sec");
	let inputData = $(this).val();
	let cust_action = "main_search_val" ;
	if(this !== ""){
		load_product(cust_action,inputData);
	}
})
//read_more this btn will display all product rel info..
$(document).on("click",".read_more",function(){
	$("#row_products").html("");//flx..
toggle_sec("actual_prod_row_sec");
	let cust_action = "product_tot_info";
	let prod_id = $(this).attr("data_prod_id");
	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{cust_action:cust_action,prod_id:prod_id},
		dataType:"json",
		success:function(tot_data){
			let res = tot_data.res;
			let p_html="";
			let counter = 0;
			$.each(res,function(tk,tv){
				
				

				let folder = `/e_commerce_project/seller_folder/${tv.prev_img}`;
				let all_folder = `/e_commerce_project/seller_folder/${tv.pr_img}`;
				// console.log(all_folder);
				$("#prod_discp").html(tv.prod_discp);
				$(".prev_img").attr("src",folder);
				$(".to_cart_btn").attr("data_pro_cart_id",tv.prod_id);
					$("#tv_prod_name").html(`product ${tv.prod_name}`);
					$(".nxt_rs_div").html(`<span id="pr">${tv.prod_price}</span> Rs <span id="discount">${tv.prod_discount}</span><span>   OFF</span>`);
					$("#remain_item").html(`${tv.remain_item} / ${tv.quantity}`);
					
					if (tv.i_size !==null) {
					$(".sizes").append(`<li><input type="radio" name="size_radio" class="size_radio" value="${tv.i_size}"></li><li>${tv.i_size}</li>`);
					}
					if (tv.i_color !== null) {
						$(".colors").append(`<li><input type="radio" name="color_radio" class="color_radio" value="${tv.i_color}"></li>${tv.i_color}`)
					}

					if (tv.pr_img !==null) {
						counter++
all_imgs=`<span style="--i: ${counter} ;"><img src="${all_folder}" alt=""></span>`;
				console.log(all_imgs);
				$(".prod_all_imgs").append(all_imgs);


					}

				$(".to_cart_btn").attr("data_pro_cart_id",tv.prod_id);
				$('.to_cart_btn').attr("crt_sel_fk",tv.prod_fk_id);
				$(".purches_btn").attr("data_pro_purches_id",tv.prod_id);

			// p_html=`<button class="purches_btn" data_pro_purches_id="${tv.prod_id}">Buy Now</button>`;
				// console.log(p_html);
				// $(".nxt_main_data_holder").append(p_html);
			})  
			// $(".nxt_main_data_holder").append(p_html)
		}
	});
});//read_more btn

//func for menu...


 function menu_func(){
	let cust_action = "menu";


	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{cust_action:cust_action},
		dataType:"json",
		success:function(mdata){

			let sess_id = mdata.sess_id;
			let res = mdata.res ;
			let login_menu_data = "";
			let none_lg_data = "";
			let sh_pic = "";
			// console.log(res);
			if (sess_id !=="") {
				$.each(res,function(mk,mv){
					let len = mv.cust_avtar;
					len = len.length;
				if (len == 1) {
					sh_pic+=`<div class="cust_avtar">${mv.cust_avtar}</div>`;
				}
			
				if (len >1) {
					sh_pic+=`<img src="${mv.cust_avtar}" class="cust_avtar">`;
				}
					$(".menu_header").append(sh_pic);
					login_menu_data+=`<ul>
					<li><a href="buyer_home.php" id="menu_hm_btn">Home</a></li>
					<li><a href="#" id="menu_pro_btn">Profile</a></li>
					<li><a href="#" id="menu_cart_btn">cart</a></li>
					<li><a href="#" id="menu_lgout_btn">Logout</a></li>
					</ul>`;
				$(".menu_item").append(login_menu_data);
			})

		}
			if(mdata.status == false){
				none_lg_data+='<a href="/e_commerce_project/seller_folder/seller_log_reg.php" id="non_log_btn" target="_blank">Login</a>';
				$('.menu_header').append(none_lg_data);
			}
		}
	});//m-ajx.. 
}
 menu_func();
//show cart data...
$(document).on("click","#menu_cart_btn",function(p){
	$("#cart_body").empty();
	$('.grand').empty();
	p.preventDefault();
	$(".menu_item").slideToggle();
	toggle_sec('show_cart_row_sec');
	let cust_action = "sh_cart" ;
	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{cust_action:cust_action},
		dataType:"json",
		success:function(cart_res){
			let res = cart_res.res ;

			let cart_html = "";
			let checkout_btn = "";
			let grand_tot = 0;
			let count = 0;
			$.each(res,function(ck,cv){
				$("#checkOutBtn").attr("dataPrId",cv.cr_pr_fk);
				$("#checkOutBtn").attr("dataUsId",cv.cr_us_fk);
				let disc_limit = cv.prod_discp;
				disc_limit = disc_limit.slice(0,120);
				
				
				// let folder = `/e_commerce_project/seller_folder/${tv.prev_img}`;

				let folder = `/e_commerce_project/seller_folder/${cv.prev_img}`;
				// cart_html=`<div class="col-xs-12 col-sm-6 col-sm-4 col-lg-4 ">
				// 	<div class="main_product">
				// 	<div class="cart_data_holder">
				// 		<div class="c_pro_prev_img">
				// 			<img src="${folder}" class="prev_img">
				// 		</div>
				// 		<div class="cart_other_details">
				// 		<table class="table table-bordered">
				// 		<tr>
				// 			<th>price</th>
				// 			<th>discount</th>
				// 			<th>avl items</th>

				// 		</tr>
				// 		<tr>
				// 			<td>${cv.prod_price}</td>
				// 			<td>${cv.prod_discount}</td>
				// 			<td>${cv.remain_item}</td>

				// 		</tr>
				// 		</table>
				// 		</div>
				// 		<div class="cart_prod_discp">
				// 		<p>${disc_limit}</p>
				// 		</div>
				// 		<div class="rem_buy_btn_div">
				// 		<button id="rem_cart" data_rem_us_id="${cv.cr_us_fk}" data_rem_pr_id="${cv.cr_pr_fk}">Remove</button>
				// 		<button id="buy_cart" data_buy_us_id="${cv.cr_us_fk}" data_buy_pr_id="${cv.cr_pr_fk}">buy Now</button>
				// 		</div>
				// 	</div>
				// 	</div>
				// </div>`;
				cart_html=`<tr>
				<td>
					<img src="${folder}" class="img-rounded" height="100px" width="100px"><br>
				</td>
				<td>
					<label><b>Size : ${cv.p_size}</b></label><br>
					<label><b> color : ${cv.p_color}</b></label>
					</td>
					<td class="crt_disc">${cv.discount}</td>
				<td class="c_pr">${cv.p_price}</td>

				<td class="sib"><select class="cart_qty_sel" data_pr_id="${cv.prod_id}">
				<option class="cart_qty">${cv.qty}</option>
				<option class="cart_qty">1</option>
				<option class="cart_qty">2</option>
				<option class="cart_qty">3</option>
				</select></td>

				<td class="crt_tot_amt">${cv.total_amt}</td>
				<td><a href="#" class="row_rem" data_rem_pr_id="${cv.cr_pr_fk}" data_rem_us_id="${cv.cr_us_fk}">X rem</a></td>
			</tr>

			`;
				// console.log(cart_html);
				//show check out btn..

				
				$("#cart_body").append(cart_html);
				
			 grand_tot += parseFloat(cv.total_amt)
			$(".grand").text(`${grand_tot} grand Total`);
							
			});//each


		}
	});//ajx.. 
})

// func for ins update cart info..
function cart(pc_id ,crt_sel_fk,price,size="",color="",qty="",tot , discount){
// console.log(pc_id + ' prod_id')
console.log(`(${pc_id} ,${price},${size} ="",${color} ="",${qty} ="",${tot} , ${discount} =" disc"`)
	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{pc_id:pc_id,crt_sel_fk:crt_sel_fk,price:price,size:size,color:color,qty:qty,tot:tot,discount:discount},
		// dataType:"json",
		beforeSend:start_loader(),
		success:function(ret_val){
			console.log(ret_val)
			stop_loader();

		}
	});
}
//click evnt to_cart_btn" data_prod_id
$(document).on("click",".to_cart_btn",function(){
	let price = $("#pr").text();
	let prod_id = $(this).attr("data_pro_cart_id");
	let crt_sel_fk = $(this).attr("crt_sel_fk");
	let size = $("input[name='size_radio']:checked").val();
	let color = $("input[name='color_radio']:checked").val();
	let qty =$(".qty_sel").children("option:selected").val() ;
	let disc = $("#discount").text() ;
	disc = parseFloat(disc) * parseFloat(qty);
	tot = parseFloat(price) * parseFloat(qty);
	f_toto = parseFloat(tot) - parseFloat(disc);

	cart(prod_id,crt_sel_fk,price,size,color,qty , f_toto , disc);
$(".pop_crt").fadeIn();
});
//
$(document).on("change",".cart_qty_sel",function(){
	let pr_id= $(this).attr("data_pr_id"); 
	let cart_qty =$(this).children("option:selected").val();
	let p= $(this).parent();
	let disc = $(p).prev();
	let f_disc = $(disc).prev().text();
	console.log(`f_disc ${f_disc}`)

	let price=$(p).prev().text();
	
	let tot_disc = parseFloat(f_disc) * parseFloat(cart_qty);
	let tot = parseFloat(price)  * parseFloat(cart_qty) - parseFloat(tot_disc);
	let nxt = $(p).next().text(tot);

  var grandTotal = 0;
    $(".crt_tot_amt").each(function() {
        grandTotal += parseFloat($(this).html()); 
    });

    // update the grand-total cell to the new total
    $(".grand").text(`$  ${grandTotal} grand Total`);

cart(pr_id,price,'','',cart_qty , tot ,tot_disc);
})
//remove product from cart.. 
$(document).on("click",".row_rem",function(re){
	re.preventDefault();
	let pr_id = $(this).attr("data_rem_pr_id") ;
	let  us_id = $(this).attr("data_rem_us_id") ;
	console.log(pr_id +' -- '+ us_id);
	$(this).closest("tr").remove();
	var tx =$(this).parent();
	txx = $(tx).prev().text();
	console.log(txx + ' tx ')
	let parent = $(this).parentsUntil("#show_cart_row");
let g_amt = 0;
	g_amt +=parseFloat($(".grand").html()) - parseFloat(txx);
	console.log(g_amt + ' g_amt' )

if(parseFloat($(".grand").html()) <= 0){$(".grand").html(`$ 00`);}else{
$(".grand").html(` ${g_amt} $ grand Total`);}
	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		data:{pr_id:pr_id,us_id:us_id},
		success:function(rem_cart){
		parent.fadeOut();

		}
	})
})
//checkOutBtn ..
$("#checkOutBtn").on("click",function(){
	let cust_action = "crt_data_to_checkout";
let  usId = $(this).attr("dataUsId");
let prId = $(this).attr("dataPrId");
	if(usId !==""){
		$.ajax({
			url:"buyer_backend.php",
			type:"POST",
			dataType:"json",
			data:{cust_action:cust_action ,usId:usId , prId:prId},
			success:function(response){
				$(".menu_header").css("display","none");//flx..
				toggle_sec("check_data_holder_sec");
				let res = response.res;
				let ord_html = "";
				let count = 0;
				let f_tot = 0;
				$.each(res,function(keys,vals){
					count++;
					
					
					let chk_tot = parseFloat(vals.p_price) * parseInt(vals.qty);
					$("#chk_tot_fm").val(count);
					let chk_fold = `/e_commerce_project/seller_folder/${vals.prev_img}`;
					$("#chk_fname").val(vals.fname);
					$("#chk_lname").val(vals.lname);
					$("#chk_email").val(vals.email);
					$("#chk_addr").val(vals.cust_addr);
					$("#sel_fk").val(vals.crt_sel_fk);
					ord_html=`<div class="ord_hold"><div id="chk_img">
						<img class="img-rounded" src="${chk_fold}" height="60px" width="60px">
					</div> 
					<ul class="chk_ul">
					<li class="chk_size"><b>size </b>${vals.p_size}</li>
					<li class="chk_color"><b>color </b>${vals.p_color}</li>
					<li class="chk_price"><b>price </b>${vals.p_price}</li>
					<li class="chk_qty"><b>qty </b>${vals.qty}</li>
					<li name="chk_tot" class="chk_tot_pr"> ${chk_tot}</li>
					</ul> </div>`;
					$(".ord_details").append(ord_html);
					// $("#check_fm").append(`<input type='hidden' name='item_number' value="${vals.cr_pr_fk}">`)

				})	
				$(".chk_tot_pr").each(function(){
						f_tot+=parseFloat($(this).html());
						// console.log(f_tot);
					});
					$("#stripe_amt").val(f_tot);
					// $("#stripe_prod_name");
					


				let chkinp=`<input type="hidden" id="chk_ftot" name="chk_ftot" value="${f_tot}" readonly>`;
				$(".form-row").append(chkinp);
				$(".ord_details").append(`<div class="f_tot_div"><h3>Final Amount </h3>${f_tot} </div>`)
				
			
			}
		})
	}
});

	// let pay_mode_stripe= $("input[name='pay_mode']:checked").val();

	// if(pay_mode_stripe == "stripe"){alert(pay_mode_stripe); toggle_sec('pay_card_stripe_sec')}
$("#sub_stripe").on("click",function(ev){
	// let cod= $("input[name='pay_mode']:checked").val();
stripepay(ev);
 toggle_sec('pay_card_stripe_sec')

	// if(cod == "stripe"){stripepay(ev); toggle_sec('pay_card_stripe_sec')}

})
	$(".pay_mode").change(function(){
	var  new_chk = $(this).children("option:selected").val();
if(new_chk == "stripe"){
	$(".pay_card_stripe_sec").show()
	if($(window).width()<1000){
	alert("auto") ; $(".check_data_holder").css("height","auto");			

}else{
	alert("60rem") ; $(".check_data_holder").css("height","60rem");}

}
if(new_chk == "cod"){
	$(".pay_card_stripe_sec").hide()

}
});

$("#ord_sub").on("click",function(event){
	
var  un_chk = $('.pay_mode').children("option:selected").val();
	if(un_chk == "cod"){
$.ajax({
	url:"buyer_backend.php",
	type:"POST",
	dataType:"json",
	data:$("#check_fm").serializeArray(),
	beforeSend:start_loader(),
	success:function(res){
		stop_loader();
		if(res.status == true){msg(res.status,res.msg)}
		else{msg(false,"some thing is wrong please try again...!")}
		
	}
});//ajx
}//if cod
if(un_chk == "stripe"){
	stripepay(event);
	start_loader();
}


	// let chk_price=$("#chk_fname").val();
	// console.log(chk_price + ' chk_fname...')
})
function validateform(){
	var valid = true;
	var card_num = $("#card_num").val();
	var card_email = $("#card_email").val();
	var exp_yr = $("#exp_year").val();
	var exp_month = $("#exp_month").val();

	// let month = $("#month").val();
	if(card_num == ""){valid = false ;}
	
	else if(card_email == ""){valid = false ;}
	
	else if(exp_yr== ""){valid = false ;}


	// else if(month.trim() == ""){valid = false ;}
if(valid == false){alert('all Fields are')}
	// if(valid == false){$(".error").html("All Fields Are Required..!").slideDown()}
	return valid ;
}
//set your  publishable key..
 Stripe.setPublishableKey("pk_test_51JdrlISAXP3sWL5RSswVQzgeZO1Hlh273z3d8K3yInEHjfQlrHgH2L0XY9kwVk2pKy7c0ne5xw7RinjTIcX1BpUR00QWVjsLea");

//callback to handle response from stripe..
function stripeResponseHandler(status,response){
	if(response.error){
		// console.log(response.error.massage);
		$(".error").html(response.error.massage).slideDown();
	}
	else{
		//get token id
		var token_id = response['id'];
		// alert(token_id);
		//appending token id into form
		$("#check_fm").append(`<input type="hidden" name="token_id" id="token_id" value="${token_id}">`);
		
		$.ajax({
			url:"buyer_backend.php",
			type:"POST",
			data:$("#check_fm").serializeArray(),
			success:function(opt){msg(true,"your order placed successfull...")}
		})
		 stop_loader();
	}
}//sRH func..

//func stripepay
function stripepay(e){
e.preventDefault();
var valid = validateform();
	if(valid == true){
		Stripe.createToken({
			number:$("#card_num").val(),
			cvc: $("#stripe_cvc").val(), 
			exp_month:$("#exp_month").val(),
			exp_year:$("#exp_year").val()
		}, stripeResponseHandler);//s.crete
		return false ;
	}

}


//remove cart info ...

//func for display cust profile info..
 $(document).on("click","#menu_pro_btn",function(p_pre){
 	p_pre.preventDefault();
 		toggle_sec("main_card_sec");
 	// console.log("btn click")
 	$(".menu_item").slideUp()
 		cust_action = "pro_info";
 		$.ajax({
 			url:"buyer_backend.php",
 			type:"POST",
 			data:{cust_action:cust_action},
 			dataType:"json",
 			success:function(pro_data){
 			
 				// $(".avt_div").css("display","flex");
 				// $(".card_profile").css("display","flex");

 				let res = pro_data.res;
				let img = "";
 				let card_content = "";
 			$.each(res,function(prok,prov){
 				let len = prov.cust_avtar ;
 				len = len.length;
				if (len == 1) {
				img+=`<div class="round" id="r_c_img">${prov.cust_avtar}</div>`;

				}
			
				if (len >1) {
					img+=`<img src="${prov.cust_avtar}" class="round" id="r_c_img">`;
				}
		
					$('.avt_div').append(img);
				// console.log(img +'sh_pic...........')
 					card_content+=`

 							<div class="pro_data">
					<div class="pro_info">
						<p><i class="fa fa-user"></i> : ${prov.fname} ${prov.lname}</p>
						<p><i class="fa fa-envelope"></i> : ${prov.email}</p>
						<p><i class="fa fa-mobile"></i> : ${prov.ph_num}</p>
						<button id="edit_my_profile">edit</button>
					</div>
			</div>

 				</div>`;

			// console.log(card_content)
			$(".card_profile").append(card_content);



 			})
 			
 			}
 		})

 });//m_p_btn

//edit_my_profile update user profile info..
 $(document).on("click","#edit_my_profile",function(){
 		toggle_sec('update_form_sec')
 	$(".pro_data").html("");

 	let cust_action = "update_profile";
 	$.ajax({
 		url:"buyer_backend.php",
 		type:"POST",
 		data:{cust_action:cust_action},
 		dataType:"json",
 		success:function(data){
 			let append_data="";
 			let res = data.res;
 			$.each(res,function(dk,dv){
 				append_data=`
					<span id="up_form_cls"><i class="fa fa-angle-double-left fa-2x"></i></span>

 				<form id="update_cust_pro">
							<div>
							<input class="up_inputs"  name="u_fname" id="fname" required="" value="${dv.fname}">
								<label>first Name</label>
							</div>
							<div>
							  <input class="up_inputs" name="u_lname" id="lname" required="" value="${dv.lname}">
								<label>Last Name</label>
							</div>
							<div>
							  <input class="up_inputs" name="u_email" id="email"
							  required="" value="${dv.email}">
								<label>EMAIL</label>
							</div>
							<div>
							<input class="up_inputs" name="u_ph_num" id="ph_num" required="" value="${dv.ph_num}">
								<label>MOBILE NUM</label>
							</div>

							<div>
								<input class="up_inputs" type="text" name="u_pass" id="pass" 
								required="" value="${dv.pass}">
								<label>PASSWORD</label>
							</div>
							<div id="reg_sub_div">
								<button type="submit" id="up_cust_sub_btn">UPDATE PROFILE</button>
							</div>

 				</form>`;
 				$(".update_form_div").append(append_data);
 			})
 		}

 	});//ajx
 });//edit_my_profile btn..

//insert updated data of cust in db..
 $(document).submit("#update_cust_pro",function(upre){
 	upre.preventDefault();
 	$.ajax({
 		url:"buyer_backend.php",
 		type:"POST",
 		beforeSend:start_loader(),
 		dataType:"json",
 		data: $("#update_cust_pro").serialize(),
 		success:function(udata){
 			stop_loader();
 			msg(udata.status,udata.msg);
 		}

 	});//ajx..
 })
 $(document).on("click",".cust_avtar",function(){
// $(".menu_item").css("display","flex");
$(".menu_item").toggle();

 })


 //all closing ..
 //cls_nxt_main it will close nxt main_data_holder..
 $("#cls_nxt_main").on("click",function(){
 	toggle_sec("row_products_sec");
	load_product("load_product");
 })
  //all closing sections are here..
 $("#cart_close").click(function(cls){
 	cls.preventDefault();
 	$("#show_cart_row").hide();
	$("#row_products").css("display","flex");
 })
 $("#s_prod_close").click(function(cls){
 	cls.preventDefault();
 	$("#row_products").css("display","flex");
 	$("#nxt_row").hide();
 	$(".sizes , .colors").empty();
	$(".prod_all_imgs").css("display","none").html("");

 })

 $("#cls_pro_card").on("click",function(){
 	toggle_sec('row_products_sec');

 	// $(".card_profile").css("display","none")
 	$(".pro_data").html("");
 })

 //close update form..
//logout cust/user..
$(document).on("click","#menu_lgout_btn",function(lgout){
	lgout.preventDefault();
	let logout= "logout" ;
	$.ajax({
		url:"buyer_backend.php",
		type:"POST",
		beforeSend:start_loader(),

		data:{logout:logout},
		success:function(logout){
			console.log("logout...user")
			stop_loader();
			msg(true,"Logout successFull..");
			setTimeout(function(){
			window.location = "/e_commerce_project/seller_folder/seller_log_reg.php";

			},1256)
		}
	});//aja
})

 $(document).on("click","#up_form_cls",function(){
 	toggle_sec('row_products_sec');
 	$(".update_form_div").hide().html("");
 })

//cls_crt_pop..
$("#cls_crt_pop").click(function(){
	$(".pop_crt").hide();
})
//cls chkput form .. i.e check_data_holder
$("#cls_chkout_fm").click(function(){
	toggle_sec("row_products_sec")
	$(".menu_header").show();
	$(".ord_details").empty();

})
})//ready...850