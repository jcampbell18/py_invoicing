<?
	$current_page = basename($_SERVER[PHP_SELF]);
/* AUTHENTICATION */
    include("common/author.php");
/* MYSQL connection */
//    include("common/connect.php");     
/* Header */ 
    include("common/header.php");
/* Logo &amp; Login Area */ 
    include("common/logo_login.php");
/* Nav */ 
    include("common/nav.php");
    
/* SubNav */
    $subnav_ = array(
        "index", 
        "content",
        "changelog",
        "expenses", 
        "expense_categories",
        "users", 
        "settings", 
        "projectsites", 
        "invoices", 
        "bids", 
        "clients", 
        "sku", 
        "mileage", 
        "terms",
        "vendors",
        "vehicles",
        "reports"
    );
//    $subnav_page = explode(".",$current_page);
    
    $subnav_page = explode("_",$_GET['page']);
    $subnav_page = $subnav_page[0];

    if (!in_array($subnav_page,$subnav_)) $subnav_page = "index";
    include("common/subnav/".$subnav_page.".php");
    
/* Body */  
    include("common/body.php");
/* Footer Legal Area*/ 
    include("common/legal.php");
/* Footer */ 
    include("common/footer.php");
?>
        