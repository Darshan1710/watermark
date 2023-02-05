<?php
include('header.php');
?>
<div class="container1">

            	<div class="leftDiv">

                	<h1>Careers </h1>
				</div>

                <div class="rightDiv">

                <div class="scrollbars">

                		<?php  $text=$hobj->select("wm_careertext","wm_career","1");
						echo $text[0]['wm_careertext'];
					?>

                </div>

                </div>

            </div>

        </div>
		<?php include('footer.php');?>