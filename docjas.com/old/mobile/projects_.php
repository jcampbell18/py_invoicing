<?
   	include("common/author.php");
    include("common/mod_upload_image.php");
    
        
    $tablename='project_site';            
    
        $test = "SELECT address FROM $tablename WHERE id='{$_GET['id']}'";
        $test = mysql_query($test);
        list($o_address) = mysql_fetch_row($test);
    $basepath = 'project_sites/'.$o_address.'/Images';
/*
    if ($_POST['uploading'] == "true"){
        
print($_FILES);
            if( is_uploaded_file($_FILES["mod_upload_userfile"]["tmp_name"]) ){
                
        		$name = safename($_FILES['mod_upload_userfile']['name']) ;
        		$image_options = array(
        			array('name'=>$name,'dir'=>"$basepath/large/", 'width'=>"3264"),
        			array('name'=>$name,'dir'=>"$basepath/med/", 'width'=>"900"),
        			array('name'=>$name,'dir'=>"$basepath/thumb/", 'width'=>"100"),
        		) ;
                        
        		$image_names = relocateImage($_FILES['mod_upload_userfile']['tmp_name'],$image_options) ;
//              header("Location: projects_.php?id=$id&action=update") ;
        		exit() ;
        	}
    }
*/

	if ($_POST['submit'] == "update") {
// need to check to make sure the address matches the folder directory before updating
        $check_dir = "SELECT address FROM $tablename WHERE id='{$_GET['id']}'";
        $check_dir = mysql_query($check_dir);
        list($old_address) = mysql_fetch_row($check_dir);
        
        if ($old_address != $_POST['address']) {
            
// rename folder
// sample          rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
$old_dir = 'project_sites/'.$old_address;
$new_dir = 'project_sites/'.$_POST['address'];
            
            rename($old_dir, $new_dir);
       
       }
	    $sql = "UPDATE $tablename SET address='{$_POST['address']}', city='{$_POST['city']}', state='{$_POST['state']}', zipcode='{$_POST['zipcode']}', code='{$_POST['code']}' WHERE id='{$_GET['id']}'";
        mysql_query($sql);
	    header("Location: projects.php");
	}

    if ($_POST['submit'] == "add") {
// create user folder
		$folder_path = 'project_sites/'.$_POST['address'];
        $folder_pathA = 'project_sites/'.$_POST['address'].'/Images';
//          $folder_pathAa = 'project_sites/'.$_POST['address'].'/Images/large';
//          $folder_pathAb = 'project_sites/'.$_POST['address'].'/Images/med';
//          $folder_pathAc = 'project_sites/'.$_POST['address'].'/Images/thumb';
        $folder_pathB = 'project_sites/'.$_POST['address'].'/Receipts';

		mkdir( "$folder_path" ,  0777);
        mkdir( "$folder_pathA" ,  0777);
//        mkdir( "$folder_pathAa" ,  0777);
//        mkdir( "$folder_pathAb" ,  0777);
//        mkdir( "$folder_pathAc" ,  0777);
        mkdir( "$folder_pathB" ,  0777);
// insert query
		$sql = "INSERT INTO $tablename SET address='{$_POST['address']}', city='{$_POST['city']}', state='{$_POST['state']}', zipcode='{$_POST['zipcode']}', code='{$_POST['code']}'";
		mysql_query($sql);
		header("Location: projects.php");
	}

    if ($_GET['action'] == "delete") {
// get folder name
        $sql = "SELECT address FROM $tablename WHERE id='{$_GET['id']}'";
        $sql = mysql_query($sql);
		list($address) = mysql_fetch_row($sql);
		$folder_path = 'project_sites/'.$address;
        $folder_pathA = 'project_sites/'.$address.'/Images';
//          $folder_pathAa = 'project_sites/'.$address.'/Images/large';
//          $folder_pathAb = 'project_sites/'.$address.'/Images/med';
//          $folder_pathAc = 'project_sites/'.$address.'/Images/thumb';
        $folder_pathB = 'project_sites/'.$address.'/Receipts';
// remove folders
		$dir = opendir($folder_pathB);
   		while($files = readdir($dir)) {
			if (strlen($files) > 4) unlink("$folder_pathB/$files");
        }
   		closedir($dir);
		rmdir( "$folder_pathB");
/*        
        $dir = opendir($folder_pathAa);
   		while($files = readdir($dir)) {
			if (strlen($files) > 4) unlink("$folder_pathA/$files");
        }
   		closedir($dir);
		rmdir( "$folder_pathAa");
        
        $dir = opendir($folder_pathAb);
   		while($files = readdir($dir)) {
			if (strlen($files) > 4) unlink("$folder_pathA/$files");
        }
   		closedir($dir);
		rmdir( "$folder_pathAb");
        
        $dir = opendir($folder_pathAc);
   		while($files = readdir($dir)) {
			if (strlen($files) > 4) unlink("$folder_pathA/$files");
        }
   		closedir($dir);
		rmdir( "$folder_pathAc");
*/        
        $dir = opendir($folder_pathA);
   		while($files = readdir($dir)) {
			if (strlen($files) > 4) unlink("$folder_pathA/$files");
        }
   		closedir($dir);
		rmdir( "$folder_pathA");
        
        $dir = opendir($folder_path);
   		while($files = readdir($dir)) {
			if (strlen($files) > 4) unlink("$folder_path/$files");
        }
   		closedir($dir);
		rmdir( "$folder_path");

// remove project
		$sql = "DELETE FROM $tablename WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: projects.php");
	}

    if ($_GET['action'] != "add") {
        $sql = "SELECT * FROM $tablename WHERE id='{$_GET['id']}'";
		$sql = mysql_query($sql);
		extract(mysql_fetch_assoc($sql));        
	}      

    include("common/header.php");

?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

<table border="0" cellspacing="0" cellpadding="8" style="width: 100%; border: 0px solid #000000;">
	<tr>
		<td bgcolor="#FAFAFA" class="content" style="font-weight: bold; text-decoration: underline;">Project Sites</td>
	</tr>
	<tr>
		<td style="padding: 14px;" class="content">
			<form action="" method="post">
				<table cellpadding="5" cellspacing="0" style="width: 100%; border: 0px;">
                    <tr>
						<td class="content" style="width: 120px;">Address</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="address" value="<?= $address ?>" style="width: 500px;" class="content" />
						 </td>
					</tr>
					<tr>
						<td class="content" style="width: 120px;">City</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="city" value="<?= $city ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="width: 120px;">State</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="state" value="<?= $state ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="width: 120px;">Zipcode</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="zipcode" value="<?= $zipcode ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="width: 120px; padding-bottom: 18px;">Box Code</td>
						<td colspan="2" style="color: #000000; background: inherit; padding-bottom: 18px;">
							<input type="text" name="code" value="<?= $code ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td colspan="3" style="color: #000000; background: inherit;">
                            <?php write_form('post',"Image Uploader is UNAVAILABLE AT THIS TIME",$basepath."/thumb",$basepath."/thumb") ; ?>
                        </td>
					</tr>
                    <tr>
						<td colspan="2">
							<table cellpadding="0" cellspacing="5" style="border: 0px; width: 100%;">
								<tr>
			                        <td align="center" style="padding-top: 20px; width: 50%;">
											<input type="button" class="inputbutton" value="go back" onclick="window.location='projects.php';" />
									</td>
									<td align="center" style="padding-top: 20px; width: 50%;">
											<input type="submit" name="submit" class="inputbutton" value="<?php if ($_GET['action'] != 'add') echo("update"); else echo("add"); ?>" class="inputbutton" />
									</td>
								</tr>
							</table>
			</form>
						</td>
					</tr>
				</table>
		</td>
	</tr>
</table>
</form>

</div>



<? include("common/footer.php") ?>