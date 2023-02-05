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
	
	
	$("#submit").click(function()
	{
	
		var year=$("#year");
		 if(year.val()=="")
		{
			alert("Please Enter year");
			return false;
		}
		 else
		{
				
			return true;
		}	
	});
	
	
	/* category pages validation Endt*/
	

	
	
});