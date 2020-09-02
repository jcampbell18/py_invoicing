<?
    $sql = "SELECT address FROM projectsites WHERE id='{$_GET['pid']}'";
    $sql = mysql_query($sql);
    list($address) = mysql_fetch_row($sql);
?>

                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: inherit; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td colspan="8" style="background: url('imgs/bar_empty.jpg') no-repeat; color: #423a3a; font-size: 12px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 42px; padding: 0px;">
                                                            <div style="vertical-align: middle; margin: 0px auto; color: #999999; font-size: 12px; font-family: Tahoma, Arial, sans-serif; padding: 15px 0px 0px 42px; width: 900px; height: 30px;"><?= $address ?></div>
                                                        </td>
                                                    </tr>
                                        
<?
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
    $filecount = count(glob("" . $folder_path . "*.jpg")); 
    $columns = 8;
    $colspan = $columns - ($filecount - ($columns * (floor($filecount/$columns)))) +1;   // formula to determine col_span
    $i = 0;
    $c = 0;
    
    if ($handle = opendir($folder_path)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $i++;
                $c++;
                
                if ($i == 1) { 
                    echo ("<tr>\n"); 
                }
?>            
                                                            
                                                        <td colspan="<? if($c != $filecount) { echo("1"); } else { echo($colspan); } ?>" style="background: #f6f6f6; color: inherit; width: 100px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 10px 5px 10px 5px;">
                                                            <a href="main.php?page=invoices_image&amp;id=<?= $_GET[id] ?>&amp;pid=<?= $_GET[pid] ?>&amp;file=<?= $file ?>" style="border: 0px; text-decoration: none;">        
                                                                <img style="width: 100px; border: 0px; text-decoration: none;" src="<?= "$folder_path$file\n"; ?>" alt="<?= "$file\n"; ?>">
                                                            </a>    
                                                                <br />
<?
// 2010-11-04_12-46-42_445.jpg
    $alt_fileA = explode(".", $file);
// 2010-11-04_12-46-42_445 AND jpg
    $alt_fileB = explode("_", $alt_fileA[0]);
// 2010-11-04 AND 12-46-42 AND 445
    $alt_fileC = explode("-", $alt_fileB[0]);
// 2010-11-04
//    $alt_file_date = explode("-", $alt_file[0]);
    $alt_file = $alt_fileC[1].'/'.$alt_fileC[2].'/'.$alt_fileC[0].' #'.$alt_fileB[2];
    echo($alt_file);
?>
                                                        </td>
<?
                if ($i == 8 || $c == $filecount) {
                    echo ("</tr>\n");
                    $i = 0;
                }             
            }
        }
    }
    closedir($handle);
?>

                                                    <tr>
                                                        <td colspan="8" style="background: inherit; color: inherit; width: 940px; height: 52px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 10px 0px 0px 0px; margin: 0px;">
                                                            <input type="image" src="imgs/button_back_S.jpg" style="width: 160px; height: 42px; margin: 0px auto; padding: 0px; border: 0px; text-decoration: none;" value="go back" onclick="window.location='main.php?page=invoices_&amp;id=<?= $_GET[id] ?>&amp;action=update';">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>