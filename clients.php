<?php
include('header.php');
?>
            <div class="container1">
            	<div class="leftDiv">
                	<h1>Clients </h1>				</div>
                <div class="rightDiv">
                	<div class="scrollbars">
					<?php  					
					$siteurl="http://water-mark.in/control_panel/";
					$team=$hobj->select("wm_imgpath","wm_client",1);
					foreach ($team as $member)		
					{
					$photopath=$member['wm_imgpath'];
					echo '<div class="clients"><img src="'.$siteurl."/".$photopath.'" alt=""></div>';
					}									
					?>
                		
                        
                       
                </div>
                </div>
            </div>
        </div><?php include('footer.php');?>
