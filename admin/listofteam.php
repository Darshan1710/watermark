<?php 
$page_title="Team >> View Team";
include('include/login_header.php');
$data=$hobj->select("*","wm_team","1");
?>
<script>
$(document).ready(function(){
	var photo=$("#photo");
	photo.keyup(check_photo);
	photo.blur(check_photo);
	function check_photo()
	{
		if(photo.val()=="")
		{
			alert("Please Select Photo!!");
			photo.addClass("inp-form-error");	
			return false;
		}
		else
		{
			photo.removeClass("inp-form-error");	
			return true;
		}
	}
	
});
</script>
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
		
			
			<div class="clear"></div>
		<div id="table-content">
			
				<!--  start product-table ..................................................................................... -->
			<form id="mainform" action="team_delete.php">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
				</tr>
				
					<?php 
					if($data=="no")
					{
						echo "Data Not Found";
					}
					else
					{
					foreach($data as $name)
					?>
				</tr>
				</tr>
				</table>
				<input type="submit" name="delete_btn" value="Delete" style="display:block; float:left; padding:4px; background-color:#333333; color:#FFFFFF; font-size:14px;"/>
			</form>
				<!--  end product-table................................... --> 
		</div>
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