<?php 
$page_title="Media >> Text Management";
include('include/login_header.php');
$data=$hobj->select("*","wm_media","1");
//print_r($data);
if(isset($_POST['submit']))
{
	if(empty($_REQUEST['editor1']))
			{
			?>
						<script>
							alert("Please Enter Media Content");
						</script>
			<?php
			}
			else
			{
					
					$media_text=$_REQUEST['editor1'];
					
					$id=$_REQUEST['tdaid'];
							
					$updatedata=$hobj->update("wm_media","wm_mediatext","'$media_text'","wm_mediaid='$id'");
								
				if($updatedata)
					{?>
							<script>
							alert("Media Page Text Content Update Successfully.");
							</script>
					<?php
						echo '<script>window.location="media.php"</script>';
					}
					else
					{?>
								<script>
										alert("SERVER ERROR:: Pleaser Try Again!!!");
									</script>
						<?php
							echo '<script>window.location="media.php"</script>';
								//end message-red
					}
			}
}
?>
<!--  start page-heading -->
		<div id="page-heading">
		<h1><?php echo $page_title ?></h1>
	</div>
	<!-- end page-heading -->
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
			
		
			<!--  start table-content  -->
		<form method="post" name="home_page" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				
				<td>				
					<input type="hidden" name="tdaid" id="tdaid" class="inp-form" size="30" value="<?php if(isset($data[0][0])){ echo $data[0][0];} ?>"/>
				</td>
			</tr>
		
			<tr>
				<th valign="top">Media Content:</th>
				<td>				
					<textarea name="editor1" id="abt_text"><?php if(isset($data[0][1])){ echo $data[0][1];} ?></textarea>
				</td>
			</tr>
			
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
		<input type="submit" name="submit" value="" id="submit" class="form-submit" />
		</td>
		</tr>
		</table>
		</form>	
				
			<div class="clear"></div>
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
<?php include('include/footer.php');?>    