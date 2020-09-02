        <tr>
            <td style="background-color: #e8e8e8; color: #7e7878; width: 1020px; padding: 0px; margin: 0px;">
                <div style="padding: 0px 0px 0px 0px; margin: 0px auto;">
                    <table style="width: 1020px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                        <tr>
                        
<?
    $page = $_GET['page'];
    $contents_ = array(
        "main", 
        "dashboard", 
        "user", 
        "settings", 
        "projectsites", 
        "projectsites_", 
        "invoices", 
        "invoices_", 
        "invoices_images", 
        "invoices_image", 
        "invoices_receipts", 
        "invoices_receipt", 
        "bids", 
        "bids_", 
        "clients", 
        "clients_", 
        "sku", 
        "sku_", 
        "mileage", 
        "mileage_", 
        "terms", 
        "terms_"
    );
    $subcontents_ = array(
        "content",
        "expenses",
        "expenses_",
        "expense_category",
        "expense_category_",
        "expense_details",
        "expenses_multi",
        "expenses_multi_",
        "changelog",
        "vehicles",
        "vehicles_",
        "vendors",
        "vendors_",
        "reports",
        "reports_"
    );
    if (!in_array($page,$subcontents_)) {
        if (!in_array($page,$contents_)) $page = "dashboard";
        include("content/".$page.".php");
    } else {
        if ($page == "content") {
            $page = "changelog";
            include("content/content/".$page.".php");
        } else {
            include("content/content/".$page.".php");
        }
    }
?>

                        </tr>
                    </table>
                </div>
            </td>
        </tr>