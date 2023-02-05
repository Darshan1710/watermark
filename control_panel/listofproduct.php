<?php 
$page_title="Portfolio >> View Product";
include('include/login_header.php');
$data=$hobj->select("*","wm_product","1");
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
			<form id="mainform" action="portfolio_delete.php">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>					<th class="table-header-repeat line-left minwidth-1"><a href="">Category</a></th>						<th class="table-header-repeat line-left minwidth-1"><a href="">Sub Category</a></th>					<th class="table-header-repeat line-left minwidth-1"><a href="">Year</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Product</a></th>					<th class="table-header-repeat line-left minwidth-1"><a href="">Image</a></th>					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
					<?php 
					if($data=="no")
					{
						echo "Data Not Found";
					}
					else
					{
						foreach($data as $name)
						{						
							if($name[1] !='0')
							{							
								$cat_name=$hobj->select("wm_name","wm_cat,wm_product","wm_catid='$name[1]'");
								$cat_name=$cat_name[0][0];
							}						
							else						
							{							
								$cat_name='';						
							}						
							if($name[2] !='0')						
							{							
								$subcat_name=$hobj->select("wm_subname","wm_subcat,wm_product","wm_subcatid='$name[2]'");
								//print_r($subcat_name);
								$subcat_name=$subcat_name[0][0];
							}						
							else						
							{							
								$subcat_name='';
							}						
							if($name[3] !='0')						
							{							
								$year=$hobj->select("wm_year","wm_year,wm_product","wm_yearid='$name[3]'");							
								//print_r($subcat_name);							
								$year=$year[0][0];						
							}						
							else						
							{							
								$year='';						
							}												
							echo"<tr class='showdata'>";						
							echo "<td><input value='$name[0]' name='todelete[]' type='checkbox'/></td>";						
							echo "<td>".$cat_name."</td>";						
							echo "<td>".$subcat_name."</td>";						
							echo "<td>".$year."</td>";						
							echo "<td>".$name[4]."</td>";						
							echo "<td><img src='".$name[5]."' width='50px' height='50px'></td>";						
							echo "<td class='options-width'><center><a href='portfolio_delete.php?id=$name[0]' title='Delete' class='icon-2 info-tooltip'></a><a href='portfolio_edit.php?edit_id=$name[0]' title='Edit' class='icon-1 info-tooltip'></a></center></td>";						
							echo "</tr>";						
						}
					}	
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