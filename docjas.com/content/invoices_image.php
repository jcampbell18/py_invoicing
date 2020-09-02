<?
    $file = $_GET['file'];
    
/* Break Down the Image File name */
    $img_ = explode(".", $file);
    $img_ = explode("_", $img_[0]);
    $img_num = $img_[2];
    $img_date = explode("-", $img_[0]);
    $img_date = $img_date[1].'/'.$img_date[2].'/'.$img_date[0];
    
    $sql = "SELECT address FROM projectsites WHERE id='{$_GET['pid']}'";
    $sql = mysql_query($sql);      
    list($address) = mysql_fetch_row($sql);

/* Converting Invoice ID to Invoice # */
                if ($_GET['id'] >= 10) {
        		      if ($_GET['id'] <= 99) {
        	       		  $i_inv = '00'.$_GET['id'];		          
        		      } else {
        		          $i_inv = '0'.$_GET['id'];
        		      }
        		} else if ($_GET['id'] <= 9) {
        			$i_inv = '000'.$_GET['id'];
                }
   
    $folder_path = 'projectsites/'.$address.'/Images/INV_'.$i_inv.'/';
?>

                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: inherit; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="background: url('imgs/bar_empty.jpg') no-repeat; color: #423a3a; font-size: 12px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 42px; padding: 0px;">
                                                            <div style="vertical-align: middle; margin: 0px auto; color: #999999; font-size: 12px; font-family: Tahoma, Arial, sans-serif; padding: 15px 0px 0px 42px; width: 900px; height: 30px;">
                                                                <?= $address ?> - Image #<?= $img_num ?> from <?= $img_date ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
<?    
    if ($handle = opendir($folder_path)) {
        $file_ = readdir($handle);
?>
                                                        <td style="background: #f6f6f6; color: inherit; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 10px 10px 10px 10px;">
                                                            <img alt="<?= "$file\n"; ?>" style="width: 920px; border: 0px; text-decoration: none;" src="<?= "$folder_path$file\n"; ?>">
                                                        </td>
<?
    }
    closedir($handle);
?>                                                                                                                
                                                    </tr>
                                                    <tr>
                                                        <td style="background: inherit; color: inherit; width: 940px; height: 52px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 10px 0px 0px 0px; margin: 0px;">
                                                            <input type="image" src="imgs/button_back_S.jpg" style="width: 160px; height: 42px; margin: 0px auto; padding: 0px; border: 0px; text-decoration: none;" value="go back" onclick="window.location='main.php?page=invoices_images&amp;id=<?= $_GET[id] ?>&amp;pid=<?= $_GET[pid] ?>';">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>