<?php
$page_title="Admin Login";
 include('include/header.php')?>
<script src="js/login.js" type="text/javascript"></script>
 <!--  start login-inner -->
	<div id="login-inner">
	<form method="post" action="">
		<table border="0" cellpadding="0" cellspacing="0">
	  <tr>
			<th>Username</th>
			<td align="center"><input type="text" name="uname" id="uname" class="login-inp" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td align="center"><input type="password" name="upass" id="upass"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
        	<td>&nbsp;</td>
			<td><input type="button" id="submit" name="submit" class="submit-login"  /></td>
		</tr>
		</table>
		</form>
</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	
 </div>
 <!--  end loginbox -->
 
</div>
<!-- End: login-holder -->
</body>
</html>