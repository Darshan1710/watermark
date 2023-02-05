<?php $page_title="Portfolio >> Edit Product";include('include/login_header.php');?><!--  start page-heading -->		<div id="page-heading">		<h1><?php echo $page_title ?></h1></div>	<!-- end page-heading --><table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table"><tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<?php
			
				if(isset($_REQUEST['product']))				{					
															if(($_FILES['photo']['name']==''))					{						$imgid=$_REQUEST['imgid'];						$cat_type=$_REQUEST['cat_type'];						$subcat_type=$_REQUEST['subcat_type'];						$year=$_REQUEST['year_type'];						$product=$_REQUEST['product'];						print_r($_POST);				$updtaequery=$hobj->update("wm_product","wm_catid_product","'$cat_type'","wm_proid='$imgid'");				$updtaequery=$hobj->update("wm_product","wm_subcatid_product","'$subcat_type'","wm_proid='$imgid'");				$updtaequery=$hobj->update("wm_product","wm_year_product","'$year'","wm_proid='$imgid'");				$updtaequery=$hobj->update("wm_product","wm_product","'$product'","wm_proid='$imgid'");						if($updtaequery)						{							?>							<script>								alert("Image Banner Update Successfully!!!");							</script>							<?php								echo '<script>window.location="listofproduct.php"</script>';												}						
					}					else					{						//$img_path=$data[0][2];						$imgid=$_REQUEST['imgid'];						$photo_temp=$_FILES['photo']['tmp_name'];						$photo=$_FILES['photo']['name'];						if(!empty($photo))						{							$info   = getimagesize($_FILES['photo']['tmp_name']);							$mime   = $info['mime'];															$photo_name=$_FILES['photo']['name'];								$bufferpath=$photo_temp;								$path='photo/'.time().$photo;										$photoquery=move_uploaded_file($bufferpath,$path);									//unlink($img_path);									if($photoquery)									{									$updtaequery=$hobj->update("wm_product","wm_path","'$path'","wm_proid='$imgid'");								$id=$_REQUEST['imgid'];								$cat_type=$_REQUEST['cat_type'];								$subcat_type=$_REQUEST['subcat_type'];								$year=$_REQUEST['year_type'];								$product=$_REQUEST['product'];					$updtaequery=$hobj->update("wm_product","wm_catid_product","'$cat_type'","wm_proid='$imgid'");					$updtaequery=$hobj->update("wm_product","wm_subcatid_product","'$subcat_type'","wm_proid='$imgid'");					$updtaequery=$hobj->update("wm_product","wm_year_product","'$year'","wm_proid='$imgid'");					$updtaequery=$hobj->update("wm_product","wm_product","'$product'","wm_proid='$imgid'");									if($updtaequery)									{									?>									<script>										alert("Product Photo Update Successfully!!!");
									</script>									<?php										echo '<script>window.location="listofproduct.php"</script>';									}									else									{									?>									<script>										alert("SERVER ERROR:: Pleaser Try Again!!!");									</script>									<?php										echo '<script>window.location="listofproduct.php"</script>';									}									}									else									{									?>									<script>										alert("SERVER ERROR:: Pleaser Try Again!!!");										</script>											<?php
									echo '<script>window.location="listofproduct.php"</script>';
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
										echo '<script>window.location="listofproduct.php"</script>';
					
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