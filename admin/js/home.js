

$(document).ready(function(){
	var wel_title= $("#wel_title");
	var wel_text=$("#wel_text");
	var ch_head=$("#ch_head");
	var ch_text=$("#ch_text");
	var pr_head=$("#pr_head");
	var pr_text=$("#pr_text");
	var sch_text=$("#sch_text");
	
	wel_title.keyup(check_wel_title);
	wel_title.blur(check_wel_title);
	function check_wel_title()
	{
		
		if(wel_title.val()=="")
		{
			wel_title.addClass("inp-form-error");
			return false;
		}
		else
		{
			wel_title.removeClass("inp-form-error");
			return true;
		}
	}
	
	ch_head.keyup(check_ch_head);
	ch_head.blur(check_ch_head);
	function check_ch_head()
	{
		
		if(ch_head.val()=="")
		{
			ch_head.addClass("inp-form-error");
			return false;
		}
		else
		{
			ch_head.removeClass("inp-form-error");
			return true;
		}
	}
	pr_head.keyup(check_pr_head);
	pr_head.blur(check_pr_head);
	function check_pr_head()
	{
		if(pr_head.val()=="")
		{
			pr_head.addClass("inp-form-error");
			return false;
		}
		else
		{
			pr_head.removeClass("inp-form-error");
			return true;
		}
	}
	
	
	
	$("#submit").click(function()
	{
		 if(check_wel_title() && check_ch_head() && check_pr_head())
		 {
			return true;
		 }
		 else
		{
				$.msgBox({
							title: "Ooops",
							content: "All fields mandatory!!!",
							type: "error",
							buttons: [{ value: "Ok" }],
							afterShow: function (result) { }
						});
			return false;
		}	
	});

});
