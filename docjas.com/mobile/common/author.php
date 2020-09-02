<?
	session_start() ;
	
    if ($_SESSION['username_access'] != 'admin') {
        if ($_SESSION['username_access'] != 'client') {
            if ($_SESSION['username_access'] != 'guest') {
                header("Location: main.php") ;
                exit() ; 
            } else {
                include("common/connect.php");
            }
        } else {
            include("common/connect.php");
        }
    } else


// echo($_SESSION['username_access']);

	include("common/connect.php");
?>