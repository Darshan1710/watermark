<?phpinclude('header.php');$siteurl="http://localhost/girish";?>
            <div class="container1">
            	<div class="leftDiv">
                	<h1>Testimonials</h1>				</div>
                <div class="rightDiv">
                    <div class="scrollbars">					<?php  						$test=$hobj->select("wm_testid,wm_testtext,wm_client","wm_testimonial","1");						//echo $text[0]['wm_abouttext'];						foreach ($test as $member)						{							//print_r($member);							echo $member['wm_testtext'];							echo $member['wm_client'];						}						//echo $text[0]['wm_abouttext'];					?>
						
                    </div>
                </div>
            </div>
        </div><?php include('footer.php');?>		