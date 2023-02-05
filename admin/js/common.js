$(document).ready(function(){
	
	/* category pages validation start*/
	
	$("#submit").click(function()
	{
	
		var catname=$("#cat_name");
		 if(catname.val()=="")
		{
			alert("Please Enter Category");
			return false;
		}
		 else
		{
				
			return true;
		}	
	});
	
	
	/* category pages validation Endt*/
	/* subcategory pages validation start*/
	$("#subcatsubmit").click(function()
	{
		
		var subcat_name=$("#subcat_name");
		 if(subcat_name.val()=="")
		{
			alert("Please Enter SubCategory");
			return false;
		}
		 else
		{
			
			return true;
		}	
	});
	/* subcategory pages validation End*/

	
	
});