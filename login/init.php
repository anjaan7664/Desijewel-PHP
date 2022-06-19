<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ;
	
function is_admin($username){
	global $verify;
	if($verify >= 3){
		return true ;
	}else{
		return false ;
	}
};
function is_cc($username){
	global $verify;
	if($verify == 2){
		return true ;
	}else{
		return false ;
	}
};
function user_exists($username){
    global $db_login_pdo;
    $stmt = $db_login_pdo->prepare('SELECT COUNT(1) FROM `members` WHERE `username` = ?');
    $stmt->bindParam(1, $username);
    $stmt->execute();
    return (bool) $stmt->fetchColumn();
    };
    
function email_exists($username_email){
    global $db_login_pdo;
    $stmt = $db_login_pdo->prepare('SELECT COUNT(1) FROM `members` WHERE `email` = ?');
    $stmt->bindParam(1, $username_email);
    $stmt->execute();
    return (bool) $stmt->fetchColumn();
    };
	
function is_admin_check($username){
	global $db_login_pdo;
    $stmt = $db_login_pdo->prepare('SELECT verified FROM `members` WHERE `username` = ?');
    $stmt->bindParam(1, $username);
    $stmt->execute();
    return $stmt->fetchColumn();
}
function is_admin_check_email($username){
	global $db_login_pdo;
    $stmt = $db_login_pdo->prepare('SELECT verified FROM `email` WHERE `username` = ?');
    $stmt->bindParam(1, $username);
    $stmt->execute();
    return $stmt->fetchColumn();
}


 if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
    $session_user_pass = mysqli_real_escape_string($db_login,$_COOKIE["password"]);
    $session_user_id  = mysqli_real_escape_string($db_login,$_COOKIE["username"]);
	$sql = "SELECT * FROM members WHERE (username ='$session_user_id') AND (password ='$session_user_pass')";
    $query = mysqli_query($db_login, $sql);
   while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $username   = $row['username'];
        $email  = $row['email'];
        $f_name = $row['f_name'];
        $s_name = $row['s_name'];
        $table_user  = $row['user_table'];
		$user_dir = $row['storage'];
        $sn     = $row['sn'];
        $number = $row['number'];
        $u_desc = $row['u_desc'];
		$address= $row['address'];
		$profile= $row['profile'];
		$verify = $row['verified'];
		$sn     = $row['sn'];
		$shop   = $row['shop'];
      }  }
	  else{
       
	  }
?>