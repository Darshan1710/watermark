<?php $page_title="Client >> Edit Client";include('include/login_header.php');?><!--  start page-heading -->		<div id="page-heading">		<h1><?php echo $page_title ?></h1></div>	<!-- end page-heading --><table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table"><tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<?php						$imgid=$_REQUEST['imgid'];						$photo_temp=$_FILES['photo']['tmp_name'];						$photo=$_FILES['photo']['name'];						if(!empty($photo))						{							$info   = getimagesize($_FILES['photo']['tmp_name']);							$mime   = $info['mime'];															$photo_name=$_FILES['photo']['name'];								$bufferpath=$photo_temp;								$path='client/'.time().$photo;										$photoquery=move_uploaded_file($bufferpath,$path);									//unlink($img_path);									if($photoquery)									{									$updtaequery=$hobj->update("wm_client","wm_imgpath","'$path'","wm_clientid='$imgid'");																	if($updtaequery)									{									?>									<script>										alert("Client Photo Update Successfully!!!");
									</script>									<?php										echo '<script>window.location="listofclient.php"</script>';									}									else									{									?>									<script>										alert("SERVER ERROR:: Pleaser Try Again!!!");									</script>									<?php										echo '<script>window.location="listofclient.php"</script>';									}									}									else									{									?>									<script>										alert("SERVER ERROR:: Pleaser Try Again!!!");										</script>											<?php
									echo '<script>window.location="listofclient.php"</script>';
									}
						
						}						?>		
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