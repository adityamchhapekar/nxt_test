
$(document).ready(function(){
	console.log("del.js is ready to work..");
//func for load data to deliver a dboy...
function load(){
	$("#load-data_tbody").empty();
	let act = "load_data";
	$.ajax({
		url:"del_boy_backend.php",
		type:"POST",
		data:{act:act},
		dataType:"json",
		success:function(loadres){
			console.log(loadres);
			let html = "";
			$.each(loadres,function(k,v){
				html =`<tr>
					<td>${v.ord_id}</td>
					<td>${v.ofname}</td>
					<td>${v.olname}</td>
					<td class="v_addr">${v.oaddr}</td>
					<td>${v.total_amt}</td>
					<td>${v.pay_mode}</td>
					<td class="chk_st">${v.ord_st}</td>
					<td><button id="show_ord_det" class="btn btn-info" data_ord_id="${v.ord_id}"> show </button></td>
				</tr>`;
				$("#load-data_tbody").append(html);
				let cls = $('.chk_st').each(function(){
					let clsdta =$(this).html();
					if(clsdta == "pending"){
						$(this).closest("tr").addClass('danger')
					}else{$(this).closest('tr').addClass('success')}
				})
			});
		}
	});//ajx..
}
load();
//show all product data of perticuler buyer
$(document).on("click","#show_ord_det",function(){
	//make div empty..
	$("#ord_sub_tbody").empty();
	$(".addr_div").empty();
	$("#ord_sub_tfoot").empty();
	$(".change_del_status_select").empty();
	$(".ord_sub_div").show();
	$(".load-delivery-info").hide();
	let act = "show_ord_id_dta";
	let ord_id = $(this).attr("data_ord_id");
	let v_addr = $(".v_addr").html();
	$.ajax({
		url:"del_boy_backend.php",
		type:"POST",
		data:{act:act,ord_id:ord_id},
		dataType:"json",
		success:function(res){
			$.each(res,function(kk,vv){
				htmls = `<tr>					
					<td>${vv.prod_name}</td>
					<td>${vv.os_pirce}</td>
					<td>${vv.os_qty}</td>
					<td>${vv.os_size}</td>
					<td>${vv.os_color}</td>
					<td class="os_tot">${vv.os_tot_amt}</td>
				</tr>`;
				$("#ord_sub_tbody").append(htmls);
			});//each
			$(".addr_div").append(`<address><b>address </b>${v_addr}</address>`);
			let famt =0;
			$(".os_tot").each(function(){
				famt += parseFloat($(this).html());
			});//each
			$("#ord_sub_tfoot").append(`<tr><td>${famt}</td></tr>`);
		let del_status = `<option>change deliver status</option>
		<option class="del_status_opt" data_ord_id_opt ="${ord_id}">pending</option>
		<option class="del_status_opt" data_ord_id_opt ="${ord_id}">deliverd</option>`;	
			$(".change_del_status_select").append(del_status);
		}
	});//ajx..
})
//change delivery status..
$(".change_del_status_select").on("change",function(){
	let deliver_st = $(this).children("option:selected").val();
	let deliver_st_id = $(this).children("option:selected").attr("data_ord_id_opt");
	if(deliver_st !==""){
		$.ajax({
			url:"del_boy_backend.php",
			type:"POST",
			data:{deliver_st:deliver_st,deliver_st_id:deliver_st_id},
			dataType:"json",
			success:function(del_resp){
				if(del_resp.st == "st_change"){
					alert("delivery status change..")
			}
			}
		});//ajx..
	}
});
//show dboy profile info..;
$("#profile_btn").on("click",function(ppre){
	ppre.preventDefault();
	let act = "show_pro_info";
	$(".load-delivery-info").hide();
	$(".update_fm_div").show();
	$.ajax({
		url:"del_boy_backend.php",
		type:"POST",
		data:{act:act},
		dataType:"json",
		success:function(res){
			$.each(res,function(upk,upv){
				$("#up_fname").val(upv.b_fname);
				$("#up_lname").val(upv.b_lname);
				$("#up_ph_num").val(upv.b_ph_num);
				$("#up_pass").val(upv.b_pass);
			})
		}
	})
})
//update dboy profile...password..
$("#up_btn").on("click",function(){
	let up_pass = $("#up_pass").val();
	$.ajax({
		url:"del_boy_backend.php",
		type:"POST",
		data:{up_pass:up_pass},
		success:function(upres){
			alert("password updated..")
		}
	})
})
//close btn to close ord sub div..
$("#close_btn_o_sub").on("click",function(){
	load();
	$(".ord_sub_div").hide();
	$(".load-delivery-info").show();
})
$("#close_up_fm").on("click",function(pre){
	pre.preventDefault();
	$(".update_fm_div").hide();
	$(".load-delivery-info").show();
})
$("#logout_dboy_btn").on("click",function(lpre){
	lpre.preventDefault();
	let logout = "logout";
	$.ajax({
		url:"del_boy_backend.php",
		type:"POST",
		data:{logout:logout},
		success:function(l_res){
			alert("Logout SuccessFull..");
			window.location = "/e_commerce_project/seller_folder/seller_log_reg.php";
		}
	}) 
})
});//ready..