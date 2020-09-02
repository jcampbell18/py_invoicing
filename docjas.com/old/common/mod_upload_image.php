<?

	//for renaming or deleteing, set mod_upload_allow_* options before including this file
	$mod_upload_allow_delete = true ;
	
	if( $mod_upload_allow_delete ){
		// If deleting file, unlink it
		if ($_POST["deleting"]) {
			$f = $_POST["path"] . "/" . $_POST["imagename"];
			if (file_exists($f)) unlink($f);
		}
	}//if
	if( $mod_upload_allow_rename ){
		// rename file
		$rt = $_POST['mod_upload_rename_to'] ;
		$p = $_POST["mod_upload_path"] ;
		$f = $_POST["mod_upload_filename"] ;
		
		if( $_POST["mod_upload_rename"] && $rt ){
			$pf = "$p/$f" ;
			if( file_exists($f) ){
				//keep extension
				preg_match('/^(.*)\.([^.]+)$/' , $f , $parts ) ;
				list( ,$fname,$fext) = $parts ;

				rename( $pf , $p .'/'. safename($rt).'.'.$fext ) ;
				//rename( $f , $_POST['mod_upload_path'] .'/'. safename($_POST['mod_upload_rename_to']) ) ;
			}//if
		}
	}//if
	
	
	function safename( $str ){
		return strtolower(str_replace( array('%20','&','`',' ','/','\\',"'",'-'), '_', $str )) ;
	}
	
	// rename the file, replacing bad characters with "_" ,
	// and adding a unique timestamp right before the extension
	function timename( $str ){
		preg_match('/\.[^.]+$/',$str,$matches) ;
		$ext= safename($matches[0]) ;
		$start = safename( substr( $str, 0, strlen($str)-strlen($ext) ) ) ;
		return $start .'-'. time() . $ext ;
	}
	

	function relocateImage( $src_path , $options_array ){
		
		if( is_file($src_path) ){

			//make the name safe
			foreach( $options_array as $key=>$options ){

				extract($options) ;

				//make the file name safe
				$name = $name ? $name : safename($new_name) ;
				$dir = rtrim($dir,'/') ; //just in case
				//make folder if it doesn't exist
				if(!is_dir($dir) ){
					mkdir($dir,0775) ;
				}

				$new_path = "$dir/$name" ;

				list($old_w,$old_h) = getimagesize($src_path) ;

				//never size an image up
				if( ($width and $old_w<$width) or ($height and $old_h<$height) ){
					copy($src_path,$new_path) ;
				}
				else if( $width or $height )
					resizeImage($src_path,$new_path,$width,$height) ;
				else
					copy($src_path,$new_path) ;

				//do watermark if requested
				if( $wm_source ){
					watermark( $new_path,$wm_source ) ;
				}//if

				$return_names[$key] = $name ;
			}//foreach

		}//if

		return $return_names ;

	}//function

	function resizeImage($srcfile,$dstfile,$newwidth,$newheight) {
		//obtain file extension
		$arr = explode('.',$srcfile) ;
		$ext = strtolower($arr[count($arr)-1]) ;
		
		if( !$newheight ) $newheight = 'proportional' ;
		if( !$newwidth  ) $newwidth  = 'proportional' ;
		if( !$newheight and !$newwidth ){
			copy($srcfile,$dstfile) ;
			return ;
		}//if
		
		list($oldwidth,$oldheight) = getimagesize($srcfile) ;
		//if one of the dimensions is the string 'proportional', resize it to be
		//proportional to the other dimension
		if( $newheight == 'proportional' )
			$newheight = $oldheight * $newwidth/$oldwidth ;
		else if( $newwidth == 'proportional' )
			$newwidth = $oldwidth * $newheight/$oldheight ;
		
		// Get photo from temp file
		if( $ext=='png' )
			@$src = ImageCreateFromPng($srcfile);
		else
			@$src = ImageCreateFromJpeg($srcfile);
		@$src_width = ImageSX($src);
		@$src_height = ImageSY($src);
		
		if (($src_width/$src_height) > ($newwidth/$newheight)) $ratio = $src_width/$newwidth;
		else $ratio = $src_height/$newheight;
		
		$final_width = $src_width/$ratio;
		$final_height = $src_height/$ratio;
		
		$x = ($newwidth - $final_width)/2;
		$y = ($newheight - $final_height)/2;
		
		// Create resized photo
		@$dst = ImageCreateTrueColor($newwidth,$newheight);
		@$color = ImageColorAllocate($dst,255,255,255);
		@ImageFill($dst,0,0,$color);

		if( $ext=='png' ){
			//need to set these options for png transparency to be preserved
			imageAlphaBlending($dst,false) ;
			imageSaveAlpha($dst,true) ;
		}//if

		@ImageCopyResampled($dst,$src,$x,$y,0,0,$final_width,$final_height,$src_width,$src_height);

		if( $ext=='png' )
			@ImagePng($dst,$dstfile,90);
		else
			@ImageJpeg($dst,$dstfile,90);

		@ImageDestroy($dst);
		@ImageDestroy($src);
	}
	
	//watermark an image the easy way!
	//thanks to this cool guy: http://php.net/manual/en/function.imagecopymerge.php#48169
	//note: transparency doesn't work.
	//to use translucent watermark, save it as a png with alpha channel (png24)

	function waterMark($fileInHD, $wmFile, $transparency = 50, $jpegQuality = 90, $margin = 0) {
		
		$jpegImg = imageCreateFromJPEG($fileInHD) ;
		$wmFileTmp = $wmFile.'_temp.png' ;//the name for the resized watermark
		//resize watermark to have same width as source image
		resizeImage( $wmFile , $wmFileTmp , imageSX($jpegImg) , 'proportional' ) ;
		$wmImg  = imageCreateFromPNG($wmFileTmp) ; //read in the new, resized watermark

		// set up watermark position - 5 pixels from the bottom-right corner
		$wmX = imageSX($jpegImg)-imageSX($wmImg) - $margin ;
		$wmY = imageSY($jpegImg)-imageSY($wmImg) - $margin ;
		
		// Water mark process
		imageCopy($jpegImg, $wmImg, $wmX, $wmY, 0, 0, imageSX($wmImg), imageSY($wmImg)) ;
		
		// Overwriting image
		ImageJPEG($jpegImg, $fileInHD, $jpegQuality) ;
		
	}//waterMark

	
	
function write_uplbox($name,$path,$cur,$preview=false,$thumbpath=''){
	$path = rtrim($path,'/') ;
	$thumbpath = rtrim($thumbpath,'/') ;
	if($preview and $thumbpath){
		?>
		<script type="text/javascript">
		function image_preview(imagename) {
			if (imagename)
				document.images["preview"].src="<?= $thumbpath ?>/" + imagename;
			else
				document.images["preview"].src="images/pixel.gif";
		}
		</script>

		<table>
			<tr>
				<td class="content">current:</td>
				<td class="content">replace with:</td>
			</tr>
			<tr>
				<td>
					<img src="<?= $cur ? "$thumbpath/$cur" : 'images/pixel.gif' ?>" width="100" />
				</td>
				<td width="100">
					<img src="images/pixel.gif" id="preview" width="100" />
				</td>
			</tr>
		</table><br/>

		<?
	}//if
	?>

 <select name="<?=$name; ?>" class="selectbox" <?= $preview ? 'onchange="image_preview(this[this.selectedIndex].value);"' : '' ?> >
  <option value=""></option>
<?

  $dir = opendir($path);
  $items = array();
  while($filename = readdir($dir)) if (is_file($path."/".$filename)) array_push($items,$filename);
  closedir($dir);
  asort($items);
  foreach($items as $filename) {
   if ($filename == $cur) $s = " selected"; else $s = "";
   echo("  <option value=\"$filename\"$s>$filename</option>\n");
  }

?>
 </select>
<?

}//write_uplbox

function write_form($action,$note,$path,$thumbpath) {
	$path = rtrim($path,'/') ;
	?>
		<script type="text/javascript">
		function image_preview(imagename) {
			if (imagename)
				document.images["preview"].src="<?= $thumbpath ?>/" + imagename;
			else
				document.images["preview"].src="images/quickpreview.gif";
		}
		</script>

		<table style="border:1px solid grey; border-collapse:collapse; border-spacing:0px; background-color:#393840;">
			<tr>
				<td valign="top">
					<table border="0" cellspacing="0" cellpadding="3" style="width: 100%; height: 100%;">
						<form method="POST" enctype="multipart/form-data">
							<tr bgcolor="#FAFAFA">
								<td colspan="3" class="content" style="font-weight: bold;padding-top: 6px; padding-bottom: 10px;">
									<?= $note ?>
								</td>
							</tr>
							<tr bgcolor="#EAEAEA">
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;">
									<input type="hidden" name="uploading" value="true"><b>Upload Image:</b>
								</td>
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;">
									<input type="file" name="mod_upload_userfile" class="inputbox">
								</td>
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;">
									&nbsp;&nbsp;<input type="submit" value="upload" class="inputbutton" style="width: 55px;">
								</td>
							</tr>
						</form>
						<form method="POST" enctype="multipart/form-data">
							<tr bgcolor="#EAEAEA">
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;">
									<input type="hidden" name="deleting" value="true">
									<input type="hidden" name="path" value="<?= $path ?>">
									<b>Delete Image:</b>
								</td>
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;" valign="middle">
									<select name="imagename" class="selectbox" onchange="image_preview(this[this.selectedIndex].value);">
										<option value=''></option>
										<?
										$dir = opendir($path) ;
										while($imagename = readdir($dir))
											{
												if( is_file("$path/$imagename") ) echo("<option value=\"$imagename\">$imagename</option>\n") ;
											}
										closedir($dir) ;
										?>
									</select>
								</td>
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;">&nbsp;&nbsp;<input type="submit" value="delete" class="inputbutton" style="width: 55px;"></td>
							</tr>
							<tr bgcolor="#EAEAEA">
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;"><b>Quick Preview:</b></td>
								<td class="content" style="padding-top: 6px; padding-bottom: 10px;" colspan="2" valign="middle">
									<select name="preview" class="selectbox" onchange="image_preview(this[this.selectedIndex].value);">
										<option value=""></option>
										<?
											$dir = opendir($path);
											while($imagename = readdir($dir))
												{
													if( is_file("$path/$imagename") ) echo("<option value=\"$imagename\">$imagename</option>\n");
												}
											closedir($dir);
										?>
									</select>
								</td>
							</tr>
						</form>
					</table>
				</td>
				<td style="width:100px; text-align:center; vertical-align:middle;" ><img src="imgs/quickpreview.gif" border="0" width="100" alt="" name="preview"></td>
			</tr>
		</table>
<? } ?>
