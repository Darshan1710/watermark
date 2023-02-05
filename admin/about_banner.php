<?php 
$page_title="About Us >> Banner Management";
include('include/login_header.php');
$data=$hobj->select("*","tda_aboutimg","1 order by aboutimg_pos");

if(isset($_POST['form_submit']))
{
			$pos=$_REQUEST['pos'];
			$photo=$_FILES['photo'];
			
			if(!empty($photo) && !empty($pos))
			{
				$cont_pos=$hobj->select("count(*)","tda_aboutimg","aboutimg_pos='$pos'");
					
					if(($cont_pos[0][0] == 1))
					{?>
							<script>
							alert("SERVER ERROR:: Image Position Number Should not be duplicate!!!");
							</script>
						<?
						echo '<script>window.location="about_banner.php"</script>';
						exit();
					}
			
				if(($_FILES['photo']['type']=="image/png"))
				{
						if($_FILES['photo']['size']<1048576)
						{
							$photo_name=$photo['name'];
							$bufferpath=$photo['tmp_name'];
							$path='photo/'.time().$photo_name;
							$photoquery=move_uploaded_file($bufferpath,$path);
							if($photoquery)
							{?>
							<script>
								alert("Image Upload Successfully!!!");
							</script>
					<?
								$hobj->insert("tda_aboutimg","aboutimg_pos,aboutimg_path","'$pos','$path'");	
								echo '<script>window.location="about_banner.php"</script>';
							}
							else
							{?>
								<script>
									alert("SERVER ERROR:: Pleaser Try Again!!!");
								</script>
							<?
								echo '<script>window.location="about_banner.php"</script>';
							}
						}
						else
						{?>
								<script>
									alert("SERVER ERROR:: Allowed Only 1MB Image Size.!!!");
								</script>
						<?
								echo '<script>window.location="about_banner.php"</script>';	
						
						
						}
				}
				else
				{?>
								<script>
									alert("Invalid Formate:: Allowed Only PNG Image!!!");
								</script>
				<?				echo '<script>window.location="about_banner.php"</script>';
				}
				
			}
			else
			{?>
								<script>
								alert( "SERVER ERROR:: Invalid Input!!!");
									</script>
			<?					echo '<script>window.location="about_banner.php"</script>';
			}
}
?>
<script>
$(document).ready(function(){
	var pos=$("#pos");
	
	pos.keyup(check_pos)
	pos.blur(check_pos)
	function check_pos()
	{
		var intRegex = /[0-9 -()+]+$/;
		if(pos.val()=="")
		{
			
			alert("Photo Position Should not be empty!!");
			pos.val('');
			pos.addClass("inp-form-error");	
			return false;
		}
		else if(!intRegex.test(pos.val()))
		{
			alert("Only Number allowed!!");
			pos.val('');
			pos.addClass("inp-form-error");	
			return false;
		}
		else
		{
			pos.removeClass("inp-form-error");	
			return true;
		}
	}
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
		<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">Photo Position</th>
				<td>				
					<input type="text" name="pos" id="pos" class="inp-form" size="30"/>
				</td>
			</tr>
			<tr>
					<th>Add Photo:</th>
					<td><input type="file" class="file_1" name="photo" id="photo"/></td>
					<td>sadfdsafsadf</td>
					<td>
					<div class="bubble-left"></div>
					<div class="bubble-right"></div>
					<div class="bubble-inner">PNG Image formate only less than 1MB in Size.</div>
					<div class="bubble-right"></div>
					</td>
			</tr>
			
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
		<input type="submit" value="" name="form_submit" id="submit" class="form-submit" />

		</td>
		</tr>
		</table>
		</form>	
			
			<div class="clear"></div>
			<div id="table-content">
			
				<!--  start product-table ..................................................................................... -->
			<form id="mainform" action="about_banner_delete.php">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Position</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Image</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
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
						echo "<td><input value='$name[0]' name='todelete[]' type='checkbox'/></td>";
						echo "<td>".$name[1]."</td>";
						echo "<td><img src='".$name[2]."' width='50px' height='50px'></td>";
						echo "<td class='options-width'><center><a href='about_banner_delete.php?id=$name[0]' title='Delete' class='icon-2 info-tooltip'></a><a href='about_banner_edit.php?edit_id=$name[0]' title='Edit' class='icon-1 info-tooltip'></a></center></td>";
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