<?
/* AUTHENTICATION */
    include("common/author.php");     
/* Header */ 
    include("common/header.php");
?>
<form id="form-1" action="" method="post">
  <fieldset>
    <legend><?= strtoupper($_SESSION['username_access']); ?></legend>
        <div style="width: 250px; padding: 0px 0px 10px 0px;">
            <a href="content.php?page=invoices" style="border: 0px; text-decoration: none;"><img src="../imgs/subnav/invoices.jpg" style="width: 115px; height: 97px;"></a>&nbsp;
            <a href="mileage.php" style="border: 0px; text-decoration: none;"><img src="../imgs/subnav/mileage.jpg" style="width: 115px; height: 97px;">
        </div>
        <div style="width: 250px; padding: 0px 0px 10px 0px;">
            <a href="projectsites.php" style="border: 0px; text-decoration: none;"><img src="../imgs/subnav/projectsites.jpg" style="width: 115px; height: 97px;"></a>&nbsp;
            <a href="bids.php" style="border: 0px; text-decoration: none;"><img src="../imgs/subnav/bids.jpg" style="width: 115px; height: 97px;"></a>
        </div>
        <div style="width: 250px; padding: 0px 0px 10px 0px;">
            <a href="sku.php" style="border: 0px; text-decoration: none;"><img src="../imgs/subnav/sku.jpg" style="width: 115px; height: 97px;"></a>&nbsp;
            <a href="clients.php" style="border: 0px; text-decoration: none;"><img src="../imgs/subnav/clients.jpg" style="width: 115px; height: 97px;"></a>
        </div>
  </fieldset>
</form>
<?
/* Footer */ 
    include("common/footer.php");
?>
</html>