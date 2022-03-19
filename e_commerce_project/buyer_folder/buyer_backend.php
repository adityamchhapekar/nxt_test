<?php
session_start();
class dataBase{
private	$server = "localhost";
private	$db_name = "e_com";
private	$user = "root";
private	$pass = "";
private	$db_con; 
protected function connect(){

	$this->db_con = new PDO("mysql:host=".$this->server.";dbname=".$this->db_name,$this->user,$this->pass);
	return $this->db_con;
}

}//db cls...

class query extends dataBase{
function cust_reg(){
	if (isset($_POST['fname'])) {
		$sql = "INSERT INTO customer_user(fname,lname,email,ph_num,pass,cust_avtar)VALUES(:fname,:lname,:email,:pass,:ph_num,:avtar)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(":fname",$fname);
		$stmt->bindparam(":lname",$lname);
		$stmt->bindparam(":email",$email);
		$stmt->bindparam(":ph_num",$ph_num);
		$stmt->bindparam(":pass",$pass);

		$stmt->bindparam(":avtar",$avtar);
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$ph_num = $_POST['ph_num'];
		$pass = $_POST['pass'];

    	$avtar = substr($fname, 0,1) ;
    	$avtar = strtoupper($avtar);
    	$stmt->execute();
    	if ($stmt) {echo "yes";}
	}
}//func cust_reg...

//func for fetch user info...
function fetchData(){
if (isset($_SESSION['cust_sess_id'])) {
	if (isset($_POST['cust_action'])) {
		if ($_POST['cust_action'] == "menu") {
			$sql = "SELECT * FROM customer_user WHERE cust_id='".$_SESSION['cust_sess_id']."' ";
			}
			elseif($_POST['cust_action'] == "pro_info" || $_POST['cust_action'] =="update_profile"){
				$sql="SELECT * FROM customer_user WHERE cust_id = '".$_SESSION['cust_sess_id']."' ";
			}
			elseif($_POST['cust_action'] == "load_product"){
				$sql = "SELECT * FROM products ORDER BY prod_id  DESC";
			}elseif($_POST['cust_action'] == "product_tot_info"){
				$prod_id = $_POST['prod_id'];
				$sql = "SELECT * FROM products prd LEFT JOIN product_imgs pimg
					ON
					prd.prod_id = pimg.pr_img_fk 
					WHERE prd.prod_id = '".$prod_id."'
				";
			}
			elseif($_POST['cust_action'] == "sh_cart"){
				$sql = "SELECT * FROM products LEFT JOIN cart
ON
products.prod_id = cart.cr_pr_fk
WHERE cart.cr_us_fk =1 ";

			}
			elseif($_POST['cust_action'] == "load_category"){
				$sql = "SELECT * FROM products GROUP BY prod_category";
			}
			elseif($_POST['cust_action'] == "act_category"){
				$category = $_POST['inputData'];
				$sql = "SELECT * FROM products WHERE prod_category = '".$category."' " ;
			}
			elseif($_POST['cust_action'] == "main_search_val"){
				$search = $_POST['inputData'];
				$search =trim($search);
				$sql = "SELECT *  FROM products WHERE prod_name LIKE '%".$search."%' OR prod_category LIKE '%".$search."%' " ;
			}
			elseif($_POST['cust_action'] == "crt_data_to_checkout"){
				$usId = $_POST['usId'] ;
				$prId = $_POST['prId'] ;
				$sql = "SELECT * FROM customer_user cu RIGHT JOIN cart ct
					ON
					cu.cust_id = ct.cr_us_fk
					JOIN
					products pr
					ON
					pr.prod_id = ct.cr_pr_fk

					WHERE ct.cr_us_fk = '".$usId."'
				 " ;
			}
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			if ($stmt) {
			$result = $stmt->fetchAll();			
			echo json_encode(array("res"=>$result,"sess_id"=>$_SESSION['cust_sess_id']));						
		}
	}
}//ses
		else{echo json_encode(array("status"=>false));
	}
}//f
//func for ins update cart..

function ins_cart(){
	if (isset($_POST['pc_id'])) {
		if($_POST['pc_id'] !== ""){
		$prod_id = $_POST['pc_id'] ;
		$usid = $_SESSION['cust_sess_id'];
		$crt_sel_fk = $_POST['crt_sel_fk'];
		$size = $_POST['size'];
		$color = $_POST['color'];
		 $qty = $_POST['qty'];
		 $pr = $_POST['price'];
		 $tot = $_POST['tot'];
		 $discount = $_POST['discount'];

		$crt_sql = "SELECT * FROM cart WHERE cr_pr_fk = '".$prod_id."' AND cr_us_fk='".$usid."'";
		$crt_stmt = $this->connect()->prepare($crt_sql);
		$crt_stmt->execute();
		$res = $crt_stmt->fetch(PDO::FETCH_ASSOC);
		$id = $res['cr_pr_fk'];
		$cr_id = $res['cr_id'];
		if($_POST['pc_id'] == $res['cr_pr_fk']	&& $size !=="" || $color !== ""){
			$sql = "UPDATE cart SET cr_pr_fk ='".$prod_id."', cr_us_fk='".$usid."',
			p_size='".$size."', p_color='".$color."',p_price='".$pr."', qty='".$qty."' ,total_amt='".$tot."',discount ='".$discount."' WHERE cr_id='".$cr_id."' ";
$stmt = $this->connect()->prepare($sql);
$stmt->execute();

		}
		if($prod_id == $res['cr_pr_fk'] && $size =="" || $color == ""){
			$sql = "UPDATE cart SET cr_pr_fk='".$prod_id."',cr_us_fk='".$usid."',p_price='".$pr."',qty='".$qty."',total_amt='".$tot."',discount ='".$discount."' WHERE cr_id='".$cr_id."' " ;
			$sm = $this->connect()->prepare($sql);
			$sm->execute();
		}

		if($_POST['pc_id'] !== $res['cr_pr_fk']){
		$sql = "INSERT INTO cart(cr_pr_fk,cr_us_fk,crt_sel_fk,p_size, p_color,p_price ,qty,total_amt,discount)VALUES(:prod_id,:usid,:crt_sel_fk,:size,:color,:pr,:qty,:tot ,:discount) ";
$stmt = $this->connect()->prepare($sql);
$stmt->bindparam(":prod_id",$prod_id);
$stmt->bindparam(":crt_sel_fk",$crt_sel_fk);
$stmt->bindparam(":usid",$usid);
$stmt->bindparam(":size",$size);
$stmt->bindparam(":color",$color);
$stmt->bindparam(":pr",$pr);
$stmt->bindparam(":qty",$qty);
$stmt->bindparam(":tot",$tot);
$stmt->bindparam(":discount",$discount);
$stmt->execute();

	 }

	}	
 }
}
//func for delete/rem product from cart ..

 function del(){
	if (isset($_POST["pr_id"])) {
		$del_sql = "DELETE FROM cart WHERE cr_us_fk=:us_id AND cr_pr_fk=:pr_id ";
	$del_stmt = $this->connect()->prepare($del_sql);
		$pr_id = $_POST['pr_id'];
		$us_id = $_POST['us_id'];
		$del_stmt->execute(array(":pr_id"=> $pr_id , ":us_id"=> $us_id));
		if ($del_stmt) {
		echo "del";
		}

	}
 }


//func for cust login ..
function log(){
	if (isset($_POST['l_email'])) {
		$sql = "SELECT * FROM customer_user WHERE email=:l_email AND pass=:l_pass";
		$stmt = $this->connect()->prepare($sql);
		$l_email = $_POST['l_email'];
		$l_pass = $_POST['l_pass'];
		$stmt->execute(array(":l_email"=>$l_email , ":l_pass"=>$l_pass));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($l_email == $result['email'] AND $l_pass == $result['pass']) {
			$_SESSION['cust_sess_id'] = $result['cust_id'];
			echo json_encode(array("status"=>true,"msg"=>"lOGIN successfull.."));
		}
	}
}//func log..

//func update cust/user profile data..
function pro_update(){
	if (isset($_POST['u_fname'])) {
		$up_sql = "UPDATE customer_user SET fname=:u_fname,lname=:u_lname,email=:u_email,ph_num=:u_ph_num,pass=:u_pass WHERE cust_id = '".$_SESSION['cust_sess_id']."' ";
		$up_stmt = $this->connect()->prepare($up_sql);
		$up_stmt->bindparam(":u_fname",$u_fname);
		$up_stmt->bindparam(":u_lname",$u_lname);
		$up_stmt->bindparam(":u_email",$u_email);
		$up_stmt->bindparam(":u_ph_num",$u_ph_num);
		$up_stmt->bindparam(":u_pass",$u_pass);
		$u_fname = $_POST['u_fname'];
		$u_lname = $_POST['u_lname'];
		$u_email = $_POST['u_email'];
		$u_ph_num = $_POST['u_ph_num'];
		$u_pass = $_POST['u_pass'];
		$up_stmt->execute();
		if ($up_stmt) {
			echo json_encode(array("status"=>true,"msg"=>"Profile Updated successfull..."));
		}
	}
}

//func
//func for check out..
function checkout(){
	if (isset($_POST['chk_fname'])) {

	$mail_sql = "SELECT * FROM ord_details WHERE u_fk ='".$_SESSION['cust_sess_id']."' "; 
	$mail_st = $this->connect()->prepare($mail_sql);
	$mail_st->execute();
	$res = $mail_st->fetch(PDO::FETCH_ASSOC);
	
		$user = "root";
		$pass = "";
		$db_con = new PDO('mysql:host=localhost;dbname=e_com' , $user , $pass);

		$chk_sql = "INSERT INTO ord_details(u_fk,ord_sel_fk,ofname,olname,oemail,oaddr,total_amt,pay_mode,pay_status)VALUES(:u_fk,:ord_sel_fk,:ofname,:olname,:oemail,:oaddr,:ftot,:pay_mode,:pay_st) ";
		$chk_stmt = $db_con->prepare($chk_sql);
		
		$u_fk = $_SESSION['cust_sess_id'];
		$ord_sel_fk = $_POST['sel_fk'];
		$ofname = $_POST['chk_fname'];
		$olname = $_POST['chk_lname'];
		$oemail = $_POST['chk_email'];
		$oaddr = $_POST['chk_addr'];
		$ftot = $_POST['chk_ftot'];
		$pay_mode =$_POST['pay_mode'] ;
		if($pay_mode == "cod"){ $pay_st = "pending" ; }
		if($pay_mode == "stripe"){ $pay_st = "received" ; }
			
		$chk_stmt->bindparam(":u_fk",$u_fk);
		$chk_stmt->bindparam(":ord_sel_fk",$ord_sel_fk);
		$chk_stmt->bindparam(":ofname",$ofname);
		$chk_stmt->bindparam(":olname",$olname);
		$chk_stmt->bindparam(":oemail",$oemail);
		$chk_stmt->bindparam(":oaddr",$oaddr);
		$chk_stmt->bindparam(":ftot",$ftot);
		$chk_stmt->bindparam(":pay_mode",$pay_mode);
		 $chk_stmt->bindparam(":pay_st",$pay_st);	
	
		$chk_stmt->execute();
		if($chk_stmt){
			echo json_encode(array("status"=>true,"msg"=>"your order placed successfull..."));
		}
			
		$lastId = $db_con->lastInsertId();
		if($lastId){
		$sql = "SELECT * FROM cart WHERE cr_us_fk = '".$_SESSION['cust_sess_id']."' ";
		$st = $db_con->prepare($sql);
		$st->execute();	
		
		if($st){
		while ($res= $st->fetch(PDO::FETCH_ASSOC)) {
			$os_fk = $lastId;
			$pr_os_fk = $res['cr_pr_fk'];
			$os_pirce =$res['p_price'];
			$os_qty =$res['qty'];
			$os_size =$res['p_size'];
			$os_color =$res['p_color'];
			$total_amt =$res['total_amt'];
			$os_discount = $res['discount'];
	$ins = "INSERT INTO ord_sub_details(os_fk,pr_os_fk,os_pirce,os_discount,os_qty,os_size,os_color,os_tot_amt)VALUES
	('".$os_fk."','".$pr_os_fk."','".$os_pirce."','".$os_discount."','".$os_qty."','".$os_size."','".$os_color."','".$total_amt."')";
	$in_st = $db_con->prepare($ins);
	$in_st->execute();
		// if($in_st){
		// $empty_crt = "DELETE FROM cart WHERE cr_us_fk= '".$_SESSION['cust_sess_id']."' ";
		// $exe = $db_con->prepare($empty_crt);
		// $exe->execute();

  //    }
	}	
  }//res
}


		// it well execute when user buy with card payment..
		if (!empty($_POST["token_id"])) {			
		 require_once("../pay_integrate/stripe-php-master/init.php");
\Stripe\Stripe::setApiKey('sk_test_51JdrlISAXP3sWL5RYs7V2VXTSSsLBJfNJ8EU18VxUaSP4fvv1iNUZ1vY8oejAr9s2xUFU8HVkO4rxhan7l8oPQDq00NIH98zag');//set your secret key..receved by stripe..
	 
	\Stripe\Stripe::setVerifySslCerts(false);//make it true when you have ssl certificate..
	$token_id = $_POST['token_id'];
	$data =\Stripe\Charge::create(array(
		"amount"=>$_POST['amount'],
		"currency"=>"inr",
		"source"=>$token_id
	));
    
	}	

  }
}

//func for send email when user buy product..
// function send_mail(){
		// for send email when place an order..
// 	$mail_html='<html>
// <head>
// 	<title>product Invoice</title>
// </head>
// <body>
// 	<table>
// 		<tr>
// 			<th>order Id</th>
// 			<th>First Name</th>
// 			<th>Last Name</th>
// 			<th>Address</th>
// 			<th>Total Amount</th>
// 			<th>payment Mode</th>
// 		</tr>
// 		<tr>
// 			<td>'.$res['ord_id'].'</td>
// 			<td>'.$res['ofname'].'</td>
// 			<td>'.$res['olname'].'</td>
// 			<td>'.$res['oaddr'].'</td>
// 			<td>'.$res['total_amt'].' Rs'.'</td>
// 			<td>'.$res['pay_mode'].'</td>
// 		</tr>
// 	</table>

// </body>
// </html>';
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// $subject = "product Invoice .";
// echo $mail_html;


// $to = "adityachhapekar008@gmail.com";
// $send=mail($to, $subject,$mail_html,$headers);
// echo $send;

// }
 //func for logout user/cust..
function logout(){
	if (isset($_POST['logout'])) {
		session_destroy();
	}
}
}//cls query...
$obj = new query();
$obj->cust_reg();
$obj->log();
$obj->fetchData();
$obj->del();
$obj->ins_cart();
$obj->pro_update();
$obj->checkout();
$obj->logout();
//428..
?>


