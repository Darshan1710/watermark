<?php
require_once("/class/helper.php");
class tda extends helper{

	function cat_edit($a,$catname,$catstatus)
	{
		
		//
		echo "Category Id".$a;
		$update=$this->update("tda_cat","cat_name","'$catname'","tda_cat='$a'");
		$update=$this->update("tda_cat","cat_status","'$catstatus'","tda_cat='$a'");
		if($update)
		{
			echo"data updated";
		}
		else
		{
			echo "Not updated";
		}
	}
	function create_new_product($cat,$proname,$mrp,$stock,$photo,$des,$status)
	{	
		//check category already exists.
			$count=$hobj->select("count(*)","tda_product","p_name='$proname' and p_cid='$cat'");
			//print_r($count);
			if($count[0][0]==0)
			{
				$photo_name=$photo['name'];
				$tmp_path=$photo['tmp_name'];
				$path="../products/".date('Y-m-d H-i-s').$photo_name;
				move_uploaded_file($tmp_path,$path);
				
				$action= $proname." Product Inserted in Category no". $cat;
				$insertquery=$hobj->insert("tda_product","p_cid,p_name,p_mrp,p_des,p_status,p_photo,p_stock","'$cat','$proname','$mrp','$des','$status','$path','$stock'");
				$insertquery=$hobj->insert("user_log","log_uname,log_IP,log_action","'$name','$serverip','$action'");
				if($insertquery)
				{?>
					<script>
						alert("Category Insert Successfully!!!");
					</script>
				<?	
					echo"<script>window.location='product.php';</script>";
				}
				else
				{
				?>
					<script>
						alert("SERVER ERROR:: Please Try Again!!!");
					</script>
				
				<?	
					echo"<script>window.location='product.php';</script>";
				}
			}
			else
			{
				?>
				<script>
					alert("Product Already Exist!!!");
				</script>
				<?	
			}
	}
	function category_update($table,$field,$value,$condition)
	{
	
	$update="update $table set $field=$value where $condition";
	$excuteUpquery=$this->conn->query($update) or die($this->conn->error);
	return $excuteUpquery;
	}	
}

$tobj=new tda();
?>