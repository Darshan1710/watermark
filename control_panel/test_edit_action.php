<?php $page_title="Testimonial >> Edit Testimonial";include('include/login_header.php');?><!--  start page-heading -->		<div id="page-heading">		<h1><?php echo $page_title ?></h1></div>	<!-- end page-heading --><table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table"><tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<?php
			
				if(isset($_REQUEST['editor1']))				{					$imgid=$_REQUEST['imgid'];					$text=$_REQUEST['editor1'];					$client=$_REQUEST['editor2'];					//print_r($_POST);				$updtaequery=$hobj->update("wm_testimonial","wm_testtext","'$text'","wm_testid='$imgid'");				$updtaequery=$hobj->update("wm_testimonial","wm_client","'$client'","wm_testid='$imgid'");												if($updtaequery)				{					?>					<script>						alert("Testimonial Update Successfully!!!");					</script>					<?php						echo '<script>window.location="listoftest.php"</script>';								}				else				{				?>					<script>						alert("SERVER ERROR:: Invalid Request!!!");					</script>				<?php					echo '<script>window.location="listoftest.php"</script>';				}				}				?>	
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