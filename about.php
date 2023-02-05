<?php
include('header.php');
?>
<div class="container1">

            	<div class="leftDiv">

                	<h1>About Us</h1>

                    <h2>Expect the unexpected.</h2>
				</div>
				<div class="rightDiv">
                	<div class="scrollbars">
                	<?php  $text=$hobj->select("wm_abouttext","wm_about","1");
						echo $text[0]['wm_abouttext'];
					?>
					</div>
                </div>
</div>
</div>
<?php include('footer.php');?>	