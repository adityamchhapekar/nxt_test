<?php
session_start();
class dataBase{
	private	$server = "localhost";
	private	$db_name = "e_com";
	private	$pass = "";
	private$user = "root";
	private$db_con; 
		protected function connect(){
$this->db_con = new PDO("mysql:host=".$this->server.";dbname=".$this->db_name,$this->user,$this->pass);

	return $this->db_con;
		}
	}
class query extends dataBase {

//func for fetch/select data from db...
	function fetch_data(){
		if (isset( $_SESSION['seller_id'])) {
			
			if (isset($_POST['action'])) {

				if ($_POST['action'] == "menu") {
					$sql = "SELECT * FROM seller_user WHERE s_us_id = '".$_SESSION['seller_id']."' ";
					// echo true;
				}
				elseif($_POST['action'] == "display_profile_info"){
					$sql = "SELECT * FROM seller_user WHERE s_us_id= '".$_SESSION['seller_id']."' ";
				}
				elseif ($_POST['action'] == "my_product") {
					$sql = "SELECT  * FROM products WHERE prod_fk_id = '".$_SESSION['seller_id']."' " ;
				}
				elseif($_POST['action'] == "update_product"){
					$prod_id = $_POST['prod_id'];
					$sql = "SELECT * FROM products pd LEFT JOIN product_imgs pis
						ON 
						pd.prod_id = pis.pr_img_fk 
						WHERE prod_id = '".$prod_id."'
					";
				}
				elseif($_POST['action'] == "ord_data"){
				$sql = "SELECT * FROM ord_details WHERE ord_sel_fk = '".$_SESSION['seller_id']."' ORDER BY ord_id DESC";
				}
				elseif($_POST['action'] == "dataBy_ordid"){
					$ord_id = $_POST['ord_id'];
					$sql = "SELECT * FROM products od RIGHT JOIN ord_sub_details osd
						ON
					od.prod_id = osd.pr_os_fk 		
					WHERE 
					osd.os_fk = ".$ord_id."
					"; 
				}
				elseif($_POST['action'] == "show_log_d_boy"){
					$sql = "SELECT * FROM delhivery_tab WHERE sel_id=".$_SESSION['seller_id']." 
					AND d_b_status='present' ";
				}
				elseif($_POST['action'] == "getdboyId"){
					$dboy_id = $_POST['dboyid'];
					$sql = "SELECT * FROM delhivery_tab WHERE del_id= ".$dboy_id." ";
				}
				elseif($_POST['action'] == "show_dboy_list"){
					$sql = "SELECT * FROM delhivery_tab WHERE sel_id = '".$_SESSION['seller_id']."' ";
				}
				//analytics query..
				elseif($_POST['action'] == "analytics"){
					$sql = "SELECT SUM(os_discount) AS od,SUM(os_qty)AS oq, SUM(os_tot_amt)AS otot FROM ord_details ord RIGHT JOIN ord_sub_details ords
					ON
					ord.ord_id = ords.os_fk
					WHERE ord.ord_sel_fk = '".$_SESSION['seller_id']."' ";
				}
				//analytics2 query..

				elseif($_POST['action'] == "analytics2"){
					$sql = "SELECT(
SELECT COUNT(pay_status)FROM ord_details
    WHERE ord_sel_fk ='".$_SESSION['seller_id']."' AND pay_status = 'pending'
    )AS ps,
    
(SELECT SUM(total_amt) FROM ord_details
    WHERE ord_sel_fk=1 AND ord_st='pending'
    )as ostot,  
        
(SELECT SUM(total_amt) FROM ord_details
    WHERE ord_sel_fk='".$_SESSION['seller_id']."' AND pay_status='pending'
    )as ptot,
(SELECT COUNT(ord_st) FROM ord_details
    WHERE ord_sel_fk=1 AND ord_st='pending'
    )as os";
			}

			elseif($_POST['action'] == "analytics3"){
				$sql = "SELECT(
	SELECT COUNT(pay_status)FROM ord_details WHERE ord_sel_fk= '".$_SESSION['seller_id']."' AND pay_status='received'

)AS p_rec,
	(SELECT SUM(total_amt)FROM ord_details WHERE ord_sel_fk= '".$_SESSION['seller_id']."' AND pay_status='received'
    )AS tot_rec,
    (SELECT SUM(total_amt)FROM ord_details WHERE ord_sel_fk= '".$_SESSION['seller_id']."' AND ord_st='delivered'
    )AS tot_de,
    (SELECT COUNT(ord_st)FROM ord_details WHERE ord_sel_fk= '".$_SESSION['seller_id']."' AND ord_st = 'delivered'
    )AS ord_de";
			}
			
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();

			$result=$stmt->fetchAll();
			echo json_encode(array("res"=>$result,"sess"=>$_SESSION['seller_id']));
			}
		}//sess
					else{ echo json_encode(false);}

	}//func fetch


//func for overview..
	function overviwe(){
		if (isset($_POST['act_over'])) {
			if($_POST['act_over'] == "panel_over" || $_POST['act_over'] == "analytics4"){
						$sql="
				SELECT
(SELECT SUM(os_qty)FROM ord_details x JOIN ord_sub_details y ON x.ord_id = y.os_fk WHERE ord_sel_fk ='".$_SESSION['seller_id']."' AND  Date(x.ad_on)=CURDATE())AS tqty,

(SELECT SUM(os_tot_amt)FROM ord_details xx JOIN ord_sub_details yy ON xx.ord_id=yy.os_fk WHERE
ord_sel_fk='".$_SESSION['seller_id']."' AND Date(xx.ad_on)=CURDATE())AS t_tot,

(SELECT SUM(os_qty)FROM ord_details wx JOIN ord_sub_details wy ON wx.ord_id=wy.os_fk WHERE
 wx.ord_sel_fk='".$_SESSION['seller_id']."' AND
YEARWEEK(wx.ad_on,1)=YEARWEEK(CURDATE()-INTERVAL 1 WEEK ,1)
)AS wqty,
(SELECT SUM(os_tot_amt)FROM ord_details wx JOIN ord_sub_details wy ON wx.ord_id=wy.os_fk WHERE
 wx.ord_sel_fk='".$_SESSION['seller_id']."' AND
YEARWEEK(wx.ad_on,1)=YEARWEEK(CURDATE()-INTERVAL 1 WEEK ,1)
)AS wtot,

(SELECT SUM(os_discount) FROM ord_details mx JOIN ord_sub_details my ON mx.ord_id=my.os_fk 
WHERE mx.ord_sel_fk='".$_SESSION['seller_id']."' AND YEAR(mx.ad_on)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH)AND MONTH(mx.ad_on)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))AS mdis,

(SELECT SUM(os_qty) FROM ord_details mx JOIN ord_sub_details my ON mx.ord_id=my.os_fk 
WHERE mx.ord_sel_fk='".$_SESSION['seller_id']."' AND YEAR(mx.ad_on)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH)AND MONTH(mx.ad_on)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))AS mqty,

(SELECT SUM(os_tot_amt) FROM ord_details mx JOIN ord_sub_details my ON mx.ord_id=my.os_fk 
WHERE mx.ord_sel_fk='".$_SESSION['seller_id']."' AND YEAR(mx.ad_on)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH)AND MONTH(mx.ad_on)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))AS mtot,

(SELECT SUM(os_qty)FROM ord_details yx JOIN ord_sub_details yy ON yx.ord_id=yy.os_fk
WHERE yx.ord_sel_fk='".$_SESSION['seller_id']."' AND YEAR(yx.ad_on) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))
)AS yqty,
(SELECT SUM(os_discount)FROM ord_details yx JOIN ord_sub_details yy ON yx.ord_id=yy.os_fk
WHERE yx.ord_sel_fk='".$_SESSION['seller_id']."' AND YEAR(yx.ad_on) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))
)AS ydis,
(SELECT SUM(os_tot_amt)FROM ord_details yx JOIN ord_sub_details yy ON yx.ord_id=yy.os_fk
WHERE yx.ord_sel_fk='".$_SESSION['seller_id']."' AND YEAR(yx.ad_on) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))
)AS ytot";

	$over_stmt = $this->connect()->prepare($sql);
	$over_stmt->execute();
	$result = $over_stmt->fetchAll();
	if($result > 0){echo json_encode($result);}
			}
		}
	}
// func insert delhivery boy info in db..
	function d_boy_add(){
		if (isset($_POST['dfname'])) {
			if($_POST['dfname'] !==""){
			$sql = "INSERT INTO delhivery_tab(sel_id,b_fname,b_lname,b_ph_num,b_pass)VALUES
				(:sel_id,:b_fname,:b_lname,:b_ph_num,:b_pass)";
				$stm = $this->connect()->prepare($sql);
				$stm->bindparam(":sel_id",$sel_id);
				$stm->bindparam(":b_fname",$b_fname);
				$stm->bindparam(":b_lname",$b_lname);
				$stm->bindparam(":b_ph_num",$b_ph_num);
				$stm->bindparam(":b_pass",$b_pass);
				
				$sel_id = $_SESSION['seller_id'];
				$b_fname = $_POST['dfname'];
				$b_lname = $_POST['dlname'];
				$b_ph_num = $_POST['dphnum'];
				$b_pass = $_POST['dpass'];
				$stm->execute();
				
			}
		}
	}
//func for update dboy id in order tbl after sel by seller ..
	function updatedboy_id(){
		if(isset($_POST['chid'])){
			if($_POST['chid'] !== ""){
				$dboy_id = $_POST['chid'];
				$ord_id = $_POST['ord_id'];
				$sql = "UPDATE ord_details SET dboy_id =:dboy_id WHERE ord_id =:ord_id ";
				$smt = $this->connect()->prepare($sql);
				$smt->execute(array(":dboy_id"=>$dboy_id,":ord_id"=>$ord_id));
				if($smt){echo "dboy apointed..";}
			}
		}
	}

	//func for update seller profile..
	function update_profile(){
		if (isset($_POST['s_update_fname'])) {
			$u_sql = "UPDATE seller_user SET fname=:up_fname,lname=:up_lname,email=:up_email,mob=:up_mob,pass=:up_pass,s_addr=:up_addr WHERE s_us_id='".$_SESSION['seller_id']."' ";
			$u_stmt = $this->connect()->prepare($u_sql);
			$u_stmt->bindparam(":up_fname",$up_fname);
			$u_stmt->bindparam(":up_lname",$up_lname);
			$u_stmt->bindparam(":up_email",$up_email);
			$u_stmt->bindparam(":up_mob",$up_mob);
			$u_stmt->bindparam(":up_pass",$up_pass);
			$u_stmt->bindparam(":up_addr",$up_addr);
			$up_fname=$_POST['s_update_fname'];
			$up_lname =$_POST['s_update_lname'];
			$up_email=$_POST['s_update_email'];
			$up_mob=$_POST['s_update_ph_num'];
			$up_pass=$_POST['s_update_pass'];
			$up_addr = $_POST['s_update_addr'];
			$u_stmt->execute();

			if ($u_stmt) {
				echo json_encode(array("status"=>true,"msg"=>"profile update successfull.."));
			}
		}
	}

//func for insert product data..
	function ins_item(){
		if (isset($_POST['prod_name'])) {
		$user = "root";
		$pass = "";
		$sec_db = new PDO('mysql:host=localhost;dbname=e_com', $user, $pass);

$sql= "INSERT INTO products(prod_id,prod_fk_id,prod_name,prod_discp,prod_price,prod_discount,prod_category,quantity,remain_item,prev_img,s_tot,c_tot,img_tot)VALUES(null,:a,:b,:c,:d,:e,:f,:g,:h,:folder,:size_tot,:color_tot,:img_tot)";

			$p_stmt = $sec_db->prepare($sql);
			$p_stmt->bindparam(":a",$prod_fk_id);
			$p_stmt->bindparam(":b",$prod_name);
			$p_stmt->bindparam(":c",$prod_discp);
			$p_stmt->bindparam(":d",$prod_price);

			$p_stmt->bindparam(":e",$prod_dics);
			$p_stmt->bindparam(":f",$prod_category);
			$p_stmt->bindparam(":g",$quantity);
			$p_stmt->bindparam(":h",$remain_item);
			$p_stmt->bindparam(":folder",$folder);
			$p_stmt->bindparam(":size_tot",$size_tot);
			$p_stmt->bindparam(":color_tot",$color_tot);
			$p_stmt->bindparam(":img_tot",$img_tot);

			$prod_fk_id = $_SESSION["seller_id"];
			$prod_name = $_POST["prod_name"];
			$prod_discp = $_POST["prod_discp"];
			$prod_price = $_POST["prod_price"];
			$prod_dics = $_POST["prod_dics"];
			$prod_category = $_POST["prod_category"];
			$quantity = $_POST["quantity"];
			$remain_item = $_POST["quantity"];

			$size_tot = $_POST["size_tot"];
			$color_tot = $_POST["color_tot"];
			$img_tot = $_POST["img_tot"];

			$tmp_name = $_FILES['prev_img']['tmp_name'];
			$rand_name = rand(100,1000).$_FILES['prev_img']['name'];
			$folder = "seller_img/".$rand_name;
			$move_file = move_uploaded_file($tmp_name,$folder);
			$p_stmt->execute();
			
			//with the help of this id we will ins remainig data in other db tbl..
				$last_ins_id = $sec_db->lastInsertId();

			$size_sql ="INSERT INTO product_imgs(pr_img_fk,i_size) VALUES
			(:img_fk,:i_size)";


			$color_sql ="INSERT INTO product_imgs(pr_img_fk,i_color) VALUES
			(:img_fk,:i_color)";


			$img_sql ="INSERT INTO product_imgs(pr_img_fk,pr_img) VALUES
			(:img_fk,:all_folder)";		

	$size_tot =$_POST["size_tot"];
	$color_tot = $_POST["color_tot"];
	$img_tot = $_POST["img_tot"];

	for($i=0; $i < $size_tot ; $i++){
		$data=array(
			":img_fk"=>$last_ins_id,
			":i_size"=>$_POST['i_size'][$i]
		);

	$all_stmt = $sec_db->prepare($size_sql);
	$all_stmt->execute($data);
	}//frlp

	for($j=0 ; $j < $color_tot ; $j++){
		$data2=array(
			":img_fk"=>$last_ins_id,
			":i_color"=>$_POST['i_color'][$j]
		);
	$all_stmt = $sec_db->prepare($color_sql);
	$all_stmt->execute($data2);
	}//frlp

	for($k=0;$k<$img_tot;$k++){
		$all_tmp = $_FILES['all_img']['tmp_name'][$k];
		$all_rand_name = rand(100,1000).$_FILES['all_img']['name'][$k];
		$all_folder = "seller_img/".$all_rand_name;
		$all_move = move_uploaded_file($all_tmp, $all_folder);
		$data3=array(
			":img_fk"=>$last_ins_id,

			":all_folder"=>$all_folder
		);
		$all_stmt = $sec_db->prepare($img_sql);
		$all_stmt->execute($data3);
	}//frlop.	

		if ($data) {
			echo json_encode(array("status"=>true));
		}
	}
}//func ins_item..

//func for update product details..
	function update_prod(){
		if (isset($_POST['up_prod_name'])) {



$up_sql = "UPDATE products SET prod_fk_id=:a, prod_name=:b,prod_discp=:c,prod_price=:d,prod_discount=:e,prod_category=:f,quantity=:g ,s_tot=:s_tot,c_tot=:c_tot,img_tot=:img_tot WHERE prod_id = '".$_POST['product_id']."' ";
// ,prev_img=:folder
$up_stmt = $this->connect()->prepare($up_sql);
$up_stmt->bindparam(":a",$prod_fk_id);
$up_stmt->bindparam(":b",$prod_name);
$up_stmt->bindparam(":c",$prod_discp);
$up_stmt->bindparam(":d",$prod_price);
$up_stmt->bindparam(":e",$prod_discount);
$up_stmt->bindparam(":f",$prod_category);
$up_stmt->bindparam(":g",$quantity);
$up_stmt->bindparam(":s_tot",$s_tot);
$up_stmt->bindparam(":c_tot",$c_tot);
$up_stmt->bindparam(":img_tot",$img_tot);
$prod_fk_id =$_SESSION['seller_id'];
$prod_name = $_POST['up_prod_name'] ;
$prod_discp = $_POST['up_prod_discp'];
$prod_price=$_POST['up_prod_price'] ;
$prod_discount=$_POST['up_prod_dics'] ;
$prod_category=$_POST['up_prod_category'] ;
$quantity =$_POST['up_quantity'];
$s_tot =$_POST['up_size_tot'];
$c_tot = $_POST['upcolor_tot'];
$img_tot=$_POST['up_img_tot'] ;
$up_stmt->execute();
			$size_sql = "UPDATE product_imgs SET pr_img_fk=:img_fk,i_size=:i_size WHERE 
			pr_img_id=:pr_img_id  AND pr_img_fk =:img_fk AND i_size IS NOT NULL";

			$color_sql ="UPDATE product_imgs SET pr_img_fk=:img_fk, i_color=:i_color  WHERE 
			pr_img_id=:pr_img_id AND pr_img_fk=:img_fk AND i_color IS NOT NULL ";

 $s_tot =$_POST['up_size_tot'];
  $c_tot = $_POST['upcolor_tot'];

	for($i=0 ;$i < $s_tot ; $i++){
	$d1 = array(
	":pr_img_id"=>$_POST['pr_img_id'][$i],
	":img_fk"=>$_POST['product_id'],
	":i_size"=>$_POST['up_i_size'][$i]
	);
	$p_st = $this->connect()->prepare($size_sql);
	$p_st->execute($d1);
}
for($j=0 ; $j < $c_tot ; $j++){
$d2 = array(
	":pr_img_id"=>$_POST['pr_img_id'][$j],

	":img_fk"=>$_POST['product_id'],
	":i_color"=>$_POST['up_i_color'][$j]
	);
$p_st =$this->connect()->prepare($color_sql);
$p_st->execute($d2);
	}
 }
}

//func for update seller pic..
function update_pic(){
	if (isset($_FILES['edit_pic'])) {
		$tmp_name = $_FILES['edit_pic']['tmp_name'];
		$rand_name = rand(100,1200).$_FILES['edit_pic']['name'];
		$folder = "seller_img/".$rand_name;
		$move_file = move_uploaded_file($tmp_name, $folder);
		if ($move_file) {
			$sql = "UPDATE seller_user SET avtar='".$folder."' WHERE s_us_id='".$_SESSION['seller_id']."' " ;

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			if ($stmt) {
				echo "yes";
			}
		}
	}
}
//func for register seller..
 function seller_reg(){
 	if (isset($_POST["s_fname"])) {
 		$sql = "INSERT INTO seller_user(fname,lname,email,mob,pass,s_addr,avtar)VALUES(:fname,:lname,:email,:mob,:pass,:s_addr,:avtar)";
 	$stmt = $this->connect()->prepare($sql);
	$stmt->bindparam(":fname",$fname);
	$stmt->bindparam(":lname",$lname);
	$stmt->bindparam(":email",$email);
	$stmt->bindparam(":mob",$mob);
	$stmt->bindparam(":pass",$pass);
	$stmt->bindparam(":s_addr",$s_addr);
	$stmt->bindparam(":avtar",$avtar);
	$fname = $_POST['s_fname'];
	$lname = $_POST['s_lname'];
	$email = $_POST['s_email'];
	$mob = $_POST['s_ph_num'];
	$pass = $_POST['s_pass'];
	$s_addr = $_POST['s_addr'];
	$avtar = substr($fname, 0,1);
	$avtar = strtoupper($avtar);
	$stmt->execute();
 		if ($stmt) {
 			echo "yes";
 			// echo json_encode(array("status"=>true , "msg"=>"register successfull"));
 		}
 	}
 }

//func for login seller user..
 function login(){
 	if (isset($_POST['l_email'])) {
 		$l_sql = "SELECT * FROM seller_user WHERE email=:l_email AND pass=:l_pass";
 		$l_stmt = $this->connect()->prepare($l_sql);
 		$l_email = $_POST['l_email'];
 		$l_pass = $_POST['l_pass'];
 		$l_stmt->execute(array(":l_email"=>$l_email , ":l_pass"=>$l_pass));
 		$res = $l_stmt->fetch(PDO::FETCH_ASSOC);
 		if ($l_email == $res['email'] AND $l_pass == $res['pass']) {
 		 $_SESSION['seller_id'] = $res['s_us_id'];
 		echo json_encode(array("status"=>true,"msg"=>"login successfull.."));

 		}
 	}
 }
 //func for log out seller ..
 function logout(){
if(isset($_POST['act_log'])){
	if($_POST['act_log'] == "logout_seller"){
		session_destroy();
		echo json_encode(array("status"=>true,"msg"=>"logout successfully.."));
	}
}

 }//func logut..
}//cls query

$obj = new query();
$obj->seller_reg();
$obj->login();
$obj->logout();
$obj->fetch_data();
$obj->update_profile();
$obj->update_pic();
$obj->ins_item();
$obj->d_boy_add();
$obj->updatedboy_id();
$obj->overviwe();
$obj->update_prod();
//528..
//CREATE TABLE `e_com`.`seller_user` ( `s_us_id` INT NOT NULL AUTO_INCREMENT , `fname` VARCHAR(200) NOT NULL , `lname` VARCHAR(200) NOT NULL , `email` VARCHAR(200) NOT NULL , `mob` BIGINT(200) NOT NULL , `avtar` VARCHAR(120) NOT NULL , PRIMARY KEY (`s_us_id`)) ENGINE = InnoDB;
// ALTER TABLE `seller_user` ADD `pass` VARCHAR(200) NOT NULL AFTER `mob`;

?>