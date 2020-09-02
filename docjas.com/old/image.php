<?
   	include("common/author.php");
    
    $file = $_GET['file'];
    
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
            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle; text-align: center;">Image: <?= $file; ?></td>            
        </tr>
        <tr style="background: <?= $bgcolor ?>;">

<?php
            if ($handle = opendir($folder_path)) {
                $file_ = readdir($handle);
?>

            <td style="padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;">
                <img alt="<?php echo "$file\n"; ?>" width="880" src="<?php echo "$folder_path$file\n"; ?>">
            </td>

<?php
            }
            closedir($handle);
//        }
?>
        </tr>
    </table>

</div>

<? include("common/footer.php") ?>