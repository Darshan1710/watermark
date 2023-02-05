<?php $page_title="Team >> Edit Team";include('include/login_header.php');?><!--  start page-heading -->		<div id="page-heading">		<h1><?php echo $page_title ?></h1></div>	<!-- end page-heading --><table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table"><tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<?php
			
				if(isset($_REQUEST['name']))				{					
															if(($_FILES['photo']['name']==''))					{						$imgid=$_REQUEST['imgid'];						$name=$_REQUEST['name'];						$desi=$_REQUEST['desi'];						$status=$_REQUEST['status'];												//print_r($_POST);				$updtaequery=$hobj->update("wm_team","wm_teammember","'$name'","wm_teamid='$imgid'");				$updtaequery=$hobj->update("wm_team","wm_desi","'$desi'","wm_teamid='$imgid'");				$updtaequery=$hobj->update("wm_team","wm_status","'$status'","wm_teamid='$imgid'");										if($updtaequery)						{							?>							<script>								alert("Team Update Successfully!!!");							</script>							<?php								echo '<script>window.location="listofteam.php"</script>';												}						
					}					else					{						//$img_path=$data[0][2];						$imgid=$_REQUEST['imgid'];						$photo_temp=$_FILES['photo']['tmp_name'];						$photo=$_FILES['photo']['name'];						if(!empty($photo))						{							$info   = getimagesize($_FILES['photo']['tmp_name']);							$mime   = $info['mime'];															$photo_name=$_FILES['photo']['name'];								$bufferpath=$photo_temp;								$path='photo/'.time().$photo;										$photoquery=move_uploaded_file($bufferpath,$path);									//unlink($img_path);									if($photoquery)									{									$updtaequery=$hobj->update("wm_team","wm_phto","'$path'","wm_teamid='$imgid'");								$imgid=$_REQUEST['imgid'];						$name=$_REQUEST['name'];						$desi=$_REQUEST['desi'];						$status=$_REQUEST['status'];												//print_r($_POST);				$updtaequery=$hobj->update("wm_team","wm_teammember","'$name'","wm_teamid='$imgid'");				$updtaequery=$hobj->update("wm_team","wm_desi","'$desi'","wm_teamid='$imgid'");				$updtaequery=$hobj->update("wm_team","wm_status","'$status'","wm_teamid='$imgid'");									if($updtaequery)									{									?>									<script>										alert("Team Photo Update Successfully!!!");
									</script>									<?php										echo '<script>window.location="listofteam.php"</script>';									}									else									{									?>									<script>										alert("SERVER ERROR:: Pleaser Try Again!!!");									</script>									<?php										echo '<script>window.location="listofteam.php"</script>';									}									}									else									{									?>									<script>										alert("SERVER ERROR:: Pleaser Try Again!!!");										</script>											<?php
									echo '<script>window.location="listofteam.php"</script>';
									}
						
						}
					
					}	
				}
				else
				{
				?>
										<script>
											alert("SERVER ERROR:: Invalid Request!!!");
										</script>
										<?php
										echo '<script>window.location="listofteam.php"</script>';
					
				}
					
		?>		
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