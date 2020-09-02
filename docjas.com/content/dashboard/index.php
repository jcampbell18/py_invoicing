<? 

    if ($_SESSION['username_access'] == 'admin') {
/* Unpaid Invoices */ 
        include("content/dashboard/stats_monthly.php");
/* Stats */ 
        include("content/dashboard/stats.php");
?>
                            </tr>              
                            <tr>
<?
    }

/* Recent Invoices */ 
    include("content/dashboard/outstanding_invoices.php");
?>