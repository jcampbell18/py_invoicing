<?
   	include("common/author.php");
    
    $tablename='terms';

	if ($_POST['submit'] == "update") {
        $sql = "UPDATE $tablename SET name='{$_POST['name']}' WHERE id='{$_GET['id']}'";
        mysql_query($sql);
	    header("Location: terms.php");
	}

    if ($_POST['submit'] == "add") {
// insert query
		$sql = "INSERT INTO $tablename SET name='{$_POST['name']}'";
		mysql_query($sql);
		header("Location: terms.php");
	}
// remove project
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM $tablename WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: terms.php");
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
		<td bgcolor="#FAFAFA" class="content" style="font-weight: bold; text-decoration: underline;">Terms</td>
	</tr>
	<tr>
		<td style="padding: 14px;" class="content">
			<form action="" method="post">
				<table cellpadding="5" cellspacing="0" style="width: 100%; border: 0px;">
                    <tr>
						<td class="content" style="width: 120px;">SKU Name</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="name" value="<?= $name ?>" style="width: 500px;" class="content" />
						 </td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellpadding="0" cellspacing="5" style="border: 0px; width: 100%;">
								<tr>
			                        <td align="center" style="padding-top: 20px; width: 50%;">
											<input type="button" class="inputbutton" value="go back" onclick="window.location='terms.php';" />
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