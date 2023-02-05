<?php 
$page_title="Sub Category Management >> New Sub Category";
include('include/login_header.php');
$data=$hobj->select("wm_subname,wm_name,wm_substatus","wm_cat,wm_subcat","wm_catid_sub=wm_catid order by wm_subname asc");
/* on form submit*/
if(isset($_POST['submit']))
{	
	
	//print_r($_POST);
	//print_r($_FILES);
	if(!empty($_POST['subcat_name'])) 
	{
		$cat_type=$_POST['cat_type'];
		$subcat_name=$_POST['subcat_name'];
		$status=$_POST['status'];
		$insert_query=$hobj->insert("wm_subcat","wm_catid_sub,wm_subname,wm_substatus","'$cat_type','$subcat_name','$status'");
		
		if($insert_query)
		{?>
				<script>alert('SubCategory Added Successfully')</script>
		<?php 
				echo '<script>window.location="subcategory.php"</script>';
		}
		else
		{
			echo '<script>alert("SERVER ERROR:: Please Try Again")</script>';
			echo '<script>window.location="subcategory.php"</script>';
		}
	}
	else
		{
			echo '<script>alert("Please Enter All Data")</script>';
			echo '<script>window.location="subcategory.php"</script>';
		}
}
?>
<script src="js/common.js"></script>
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
		<form method="post" name="home_page" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype='multipart/form-data'>
		<div class="inner-table" style="width:80%">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form" >
			<tr><th valign="top">&nbsp;</th>
				<td id="s_error"></td>
			</tr>
			<tr>
				<th valign="top">Category:</th>
				<td>
						
					<?php $hobj->dropdown("wm_catid,wm_name","wm_cat","wm_status='Enable'","cat_type","styledselect_form_5");?>&nbsp;<span id="s_cname"></span>
				</td>
			</tr>
			<tr>
				<th valign="top">Sub-Category:</th>
				<td>
				
					<?php $hobj->text("text","subcat_name","inp-form","Enter SubCategory Name","","");?>&nbsp;<span id="s_sname"></span>
				</td>
			</tr>
			
			<tr>
				<th valign="top">Status:</th>
				<td>				
					<select name="status" id="status" class="styledselect_form_5">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
					</select>
				</td>
			</tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<span id="btnsubmit">
			<input type="submit" value="" id="subcatsubmit" name="submit" class="form-submit" />
			</span>
		</td>
		</tr>
		</table>
		</div>
		</form>	
				
			<!-- end page-heading -->
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
			<!--  start table-content  -->
			<div class="clear"></div>
			<div class="clear"></div>
		<div id="table-content">
			<!--  start product-table ..................................................................................... -->
			<form id="mainform" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Sub-Category</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Category</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
					<!--<th class="table-header-options line-left"><a href="">Options</a></th>-->
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
						echo"<tr class='showdata'>";
						echo "<td><input value='$name[0]' name='todelete[]' type='checkbox' /></td>";
						echo "<td><b>".$name[0]."</b></td>";
						echo "<td><b>".$name[1]."</b></td>";
							echo "<td><b>".$name[2]."</b></td>";
						//echo "<td><center><a id='$name[0]' title='Delete' class='icon-2 info-tooltip'></a></center><a  href='restaurants_edit.php?id=$name[0]' title='Edit' class='icon-1 info-tooltip'></a></td>";
						echo "</tr>";
						}
					}	
					?>
				
				</tr>
				</table>
				<input type="submit" name="delete" id="delete" value="Delete" style="display:block; float:left; padding:4px; background-color:#333333; color:#FFFFFF; font-size:14px;"/>
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