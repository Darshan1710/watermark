// JavaScript Document

function validate1()
	{
		
		var name = document.careerForm.name.value;
		var cperson = document.careerForm.cperson.value;
		var mobile = document.careerForm.mobile.value;
		var email = document.careerForm.email.value;
		var webaddress = document.careerForm.webaddress.value;
		var stall = document.careerForm.stall.value;
		var exibition = document.careerForm.exibition.value;
		var edate = document.careerForm.edate.value;
		var ssize = document.careerForm.ssize.value;
		var sideopen = document.careerForm.sideopen.value;
		var hallno = document.careerForm.hallno.value;
		var stallno = document.careerForm.stallno.value;
				
		//var image 
		if(name =="")
		{
			alert('Please enter Name!');
			document.careerForm.name.focus();
			return false;
		}
		if(cperson =="")
		{
			alert('Please enter contact person!');
			document.careerForm.cperson.focus();
			return false;
		}
		if(mobile =="")
		{
			alert('Please enter mobile number!');
			document.careerForm.mobile.focus();
			return false;
		}
		
		if(isNaN(mobile))
		{
			alert('Please enter Only Number!');
			document.careerForm.mobile.focus();
			return false;
		}
		if(email =="")
		{
			alert('Please enter E-mail Address!');
			document.careerForm.email.focus();
			return false;
		}
		 if(!email.match(/[a-zA-Z\.\@\d\_]/)) 
		{
           alert('Invalid e-mail address.'); 
			document.careerForm.email.focus();   
		   return false;
        }
		
		if (!emailCheck (email) )
		{
			return false;
		}	
		if(webaddress =="")
		{
			alert('Please enter web address!');
			document.careerForm.webaddress.focus();
			return false;
		}
		if(stall =="")
		{
			alert('Please enter stall!');
			document.careerForm.stall.focus();
			return false;
		}
		if(exibition =="")
		{
			alert('Please enter exibition!');
			document.careerForm.exibition.focus();
			return false;
		}if(edate =="")
		{
			alert('Please enter Exibition Date!');
			document.careerForm.edate.focus();
			return false;
		}
		if(ssize =="")
		{
			alert('Please enter stall size!');
			document.careerForm.ssize.focus();
			return false;
		}
		if(sideopen =="")
		{
			alert('Please enter no. fo sides open!');
			document.careerForm.sideopen.focus();
			return false;
		}
		
		if(hallno =="")
		{
			alert('Please enter hall no!');
			document.careerForm.hallno.focus();
			return false;
		}
		if(stallno =="")
		{
			alert('Please enter stall no!');
			document.careerForm.stallno.focus();
			return false;
		}
		
		
			
		return true;
		
	}
	
	
	


	
	




function emailCheck (emailStr) {
	var emailPat=/^(.+)@(.+)$/
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
	var validChars="\[^\\s" + specialChars + "\]"
	var quotedUser="(\"[^\"]*\")"
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	var atom=validChars + '+'
	var word="(" + atom + "|" + quotedUser + ")"
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) {
		alert("Email address seems incorrect (check @ and .'s)")
		return false
	}
	var user=matchArray[1]
	var domain=matchArray[2]
	if (user.match(userPat)==null) {
		alert("The username doesn't seem to be valid.")
		return false
	}
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
		// this is an IP address
		  for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				alert("Destination IP address is invalid!")
			return false
			}
		}
		return true
	}
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("The domain name doesn't seem to be valid.")
		return false
	}
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
		domArr[domArr.length-1].length>4) {
	   alert("The address must end in a valid domain, or two letter country.")
	   return false
	}
	if (len<2) {
	   var errStr="This address is missing a hostname!"
	   alert(errStr)
	   return false
	}
	return true;
	}
