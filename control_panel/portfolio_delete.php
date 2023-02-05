<?php 
$page_title="Portfolio >> Delete Product";
include('include/login_header.php');
?>
	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo $page_title ?></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<?php
				if(isset($_REQUEST['id']))
				{
					$id=$_REQUEST['id'];
					$data=$hobj->select("wm_path","wm_product","wm_proid='$id'");
					$deltefile=$data[0][0];
					
					//print_r($data);exit();
					$queryexe=$hobj->delete("wm_product","wm_proid='$id'");
					if($queryexe)
					{
						unlink($deltefile);
						?>
								<script>
								alert( "Photo Delete Sucessfully!!!");
									</script>
							<?php					
								echo '<script>window.location="listofproduct.php"</script>';
					}
					else
					{?>
								<script>
								alert( "SERVER ERROR:: Please Try Again!!!");
								</script>
							<?php					
								echo '<script>window.location="listofproduct.php"</script>';
					}
				}
				else if(isset($_REQUEST['todelete']))
				{
					$delid=$_REQUEST['todelete'];
					
					foreach($delid as $id)
					{
						$data=$hobj->select("wm_path","wm_product","wm_proid='$id'");
						$deltefile=$data[0][0];
					
						$queryexe=$hobj->delete("wm_product","wm_proid='$id'");
						unlink($deltefile);
						
					}
					if($queryexe)
						{						?>
								<script>
								alert( "Photo Delete Sucessfully!!!");
									</script>
								<?php					
								echo '<script>window.location="listofproduct.php"</script>';
								
						}
						else
						{							?>
								<script>
								alert( "SERVER ERROR:: Please Try Again!!!");
								</script>
							<?php					
								echo '<script>window.location="listofproduct.php"</script>';
						}
				}
				else
				{
							?>
								<script>
								alert( "SERVER ERROR:: Please Select Photo!!!");
								</script>
							<?php					
								echo '<script>window.location="listofproduct.php"</script>';
				}
		
	?>		<div class="clear"></div>
		 
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
