$(document).ready(function(){
	
	var name=$("#uname");
	var pass=$("#upass");
	
	$('#submit').click(function(){
		
		if(name.val()=="")
		{
			alert("Enter Username!!!");
			return false;
		}	
		else if(pass.val()=="")
		{
			alert("Enter Password!!!");
			return false;
		}
		else
		{
			var str="uname="+name.val()+"&upass="+pass.val();
			$.ajax({
				type:'GET',
				data:str,
				url:'login_action.php',
				success:function(xyz)
				{
					//alert(xyz);
					if(xyz==0)
					{
						alert("Authentication Fail!!!");
					}
					else if(xyz==1)
					{
						window.location.href="category.php";
					}
					
					
				}
			})
			return false
			
			
		}
	});
	
});