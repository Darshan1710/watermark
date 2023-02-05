$(document).ready(function(){
	
	/* year pages validation start*/
	
	
	/*polulate sub category list*/
	$("#cat_type").live( "change", function() {
		var catid=$("#cat_type").val();
		
		
		var str="catid="+catid;
			//alert(str);
		$.ajax
			({
				type:'POST',
				url:"ajax/ajax_populate_cat.php",
				data:str,
				success:function(xyz)
				{
					//alert(xyz);
					$("#subcatdiv").html(xyz);
					//location.reload();
				}
			}); 
	});
	
	$("#subcat_type").live( "change", function() {
	
	
		var subcatid=$("#subcat_type").val();
		
		
		var str="subcatid="+subcatid;
			//alert(str);
		$.ajax
			({
				type:'POST',
				url:"ajax/ajax_populate_cat.php",
				data:str,
				success:function(xyz)
				{
					//alert(xyz);
					$("#yeardiv").html(xyz);
					//location.reload();
				}
			}); 
	});
	
	$("#submit").click(function()
	{
	
		var product=$("#product");
		var photo=$("#photo");
		 if(product.val()=="")
		{
			alert("Please Enter Product Name");
			return false;
		}
		else if(photo.val()=="")
		{
			alert("Please Select Photo for this Product ");
			return false;
		}
		 else
		{
				
			return true;
		}	
	});
	
	
	/* category pages validation Endt*/
	

	
	
});