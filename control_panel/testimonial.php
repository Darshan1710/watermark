<?php 
$page_title="Testimonial >> Text Management";
include('include/login_header.php');
$data=$hobj->select("*","wm_testimonial","1");
//print_r($data);
if(isset($_POST['submit']))
{
	if(empty($_REQUEST['editor1']))
			{
			?>
						<script>
							alert("Please Enter Testimonial Content");
						</script>
			<?php
			}
			else
			{
					
					$test_text=$_REQUEST['editor1'];
					$client_text=$_REQUEST['editor2'];
					
					
					$id=$_REQUEST['tdaid'];
							
					//$updatedata=$hobj->update("wm_testimonial","wm_testtext","'$test_text'","wm_testid='$id'");
					$insertquery=$hobj->insert("wm_testimonial","wm_testtext,wm_client","'$test_text','$client_text'");			
				//$insertquery=$hobj->insert("tda_hometxt","home_wel_title,home_wel_text,home_ch_head,home_ch_text,home_pr_head,home_pr_text,home_sch_text","'$wel_title','$wel_text','$ch_head','$ch_text','$pr_head','$pr_text','$sch_text'");
					if($insertquery)
					{?>
							<script>
							alert("Testimonial Page Text Content Added Successfully.");
							</script>
					<?php
						echo '<script>window.location="testimonial.php"</script>';
					}
					else
					{?>
								<script>
										alert("SERVER ERROR:: Pleaser Try Again!!!");
									</script>
						<?php
							echo '<script>window.location="testimonial.php"</script>';
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
				<th valign="top">Testimonial Content:</th>
				<td>				
					<textarea name="editor1" id="abt_text"></textarea>
				</td>
			</tr>
			<tr>
				<th valign="top">Client:</th>
				<td>				
					<textarea name="editor2" id="client_text"></textarea>
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