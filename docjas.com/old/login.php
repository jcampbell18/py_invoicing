<?
	include 'common/connect.php' ;
    
//	session_start() ;

	$sql = "SELECT * FROM master_login WHERE login='{$_POST['c_login']}' AND password='{$_POST['c_password']}'" ;
	$sql = mysql_query($sql);

	if( $sql and mysql_num_rows($sql)>0 ){
	   
        extract(mysql_fetch_assoc($sql));
        
        

		$_SESSION['login'] = $_POST['c_login'];

//echo("this is working fine. here is info ".$login." is the login");

		header("Location: invoices.php");
        
	} else {
	   
		header("Location: index.php");
	}
?>
