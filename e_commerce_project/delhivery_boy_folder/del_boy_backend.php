
<?php
session_start();
class dataBase{
private	$server = "localhost" ;
private	$db_name = "e_com";
private	$user = "root";
private	$pass = "";
private	$db_con ;
protected function connect(){
		$this->db_con = new PDO("mysql:host=".$this->server.";dbname=".$this->db_name
			,$this->user,$this->pass);
		return $this->db_con;
	}
}
//func for fetch data of delhivery boy...
//func for login d boy..
class db_query extends dataBase {

	//func for load data..
	function load_data(){
		if (isset($_POST['act'])) {
			if($_POST['act'] == "load_data"){
				$sql = "SELECT * FROM ord_details WHERE dboy_id= '".$_SESSION['del_id']	."' ";
			}
			elseif($_POST['act'] == "show_ord_id_dta"){
				$ord_id = $_POST['ord_id'];
				$sql = "SELECT * FROM products p RIGHT JOIN ord_sub_details os
				ON
				p.prod_id = os.pr_os_fk
				WHERE os.pr_os_fk = '".$ord_id."'
				"; 
			}
			elseif($_POST['act'] == "show_pro_info"){
				$sql = "SELECT * FROM delhivery_tab WHERE del_id = '".$_SESSION['del_id']."' ";
			}
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			if($stmt){
				$fetch = $stmt->fetchAll();
				echo json_encode($fetch);
			}
		

		}
	}

function d_boy_log(){
	if (isset($_POST['dbp'])) {
		$sql = "SELECT * FROM delhivery_tab WHERE b_ph_num=:db_num AND b_pass=:db_pass";
		$stmt = $this->connect()->prepare($sql);
		$db_num = $_POST['dph'];
		$db_pass = $_POST['dbp'];
		$stmt->execute(array(":db_num"=>$db_num,"db_pass"=>$db_pass));
		$ftech_res = $stmt->fetch(PDO::FETCH_ASSOC);
		if($db_num == $ftech_res['b_ph_num'] AND $db_pass == $ftech_res['b_pass']){
			$_SESSION['del_id'] = $ftech_res['del_id'];
			$status_udpate = "UPDATE delhivery_tab SET d_b_status= 'present' " ;
			$stm = $this->connect()->prepare($status_udpate);
			$stm->execute();
			if($stmt){echo json_encode(array("status"=>true,"msg"=>"LOGIN Success Full..."));}
		} 
	}
}
//func for update delivery status..
function delivery_st(){
	if(isset($_POST['deliver_st'])){
	if($_POST['deliver_st_id'] !==""){
		$ord_st = $_POST['deliver_st'];
		$deliver_st_id = $_POST['deliver_st_id'];
		$sql = "UPDATE ord_details SET ord_st ='".$ord_st."' , pay_status='received' WHERE ord_id = '".$deliver_st_id."' ";
		$deliver_stmt = $this->connect()->prepare($sql);
		if($deliver_stmt->execute()){
			echo json_encode(array("st"=>"st_change"));
		}
	}
}

}
//func for update dboy pass..
function profile_up(){
	if (isset($_POST['up_pass'])) {
		if($_POST['up_pass'] !== ""){

			$up_pass = $_POST['up_pass'];
			$up_sql = "UPDATE delhivery_tab SET b_pass = '".$up_pass."' WHERE del_id = '".$_SESSION['del_id']."' ";
			$up_stmt = $this->connect()->prepare($up_sql);
			$up_stmt->execute();
		}
	}
}
//func for logout dboy..
function logout(){
	if(isset($_POST['logout'])){
		if($_POST['logout'] == "logout"){
			$sql = "UPDATE delhivery_tab SET d_b_status='Absent' WHERE del_id='".$_SESSION['del_id']."'";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			session_destroy();

		}
	}
}
}//db_query cls
$obj = new db_query();
$obj->load_data();
$obj->d_boy_log();
$obj->delivery_st();
$obj->profile_up();
$obj->logout();
?>