<?
   	include("common/author.php");
//   	include("common/mod_upload_img.php");
    
    $sql = "SELECT address FROM project_site WHERE id='{$_GET['pid']}'";
    $sql = mysql_query($sql);  
    
    list($address) = mysql_fetch_row($sql);
        $folder_path = 'project_sites/'.$address.'/Images/';
        $filecount = count(glob("" . $folder_path . "*.jpg"));
        $bgcolor = 'inherit';
        $cols=5;
    
    include("common/header.php");
?>

<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

    <table>
        <tr>
            <td colspan="<?= $filecount; ?>" style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle; text-align: center;">Images for <?= $address; ?></td>            
        </tr>

<?php
//        for($i=1;$i<=$filecount;$i++){
//            if ($i == 1){
?>

        <tr style="background: <?= $bgcolor ?>;">

<?php
//            }
            if ($handle = opendir($folder_path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
?>

            <td style="padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;">
                <a href="image.php?pid=<?= $_GET['pid']; ?>&file=<?= $file; ?>">
                    <img alt="<?php echo "$file\n"; ?>" width="100" src="<?php echo "$folder_path$file\n"; ?>">
                </a>
            </td>

<?php
//                        if ($i == $cols) {
?>



<?php
//                        }
                    }
                }
            }
            closedir($handle);
//        }
?>
        </tr>
    </table>

</div>

<? include("common/footer.php") ?>