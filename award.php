<?phpinclude('header.php');?>
            <div class="container1">
            	<div class="leftDiv">
                	<h1>Awards </h1>				</div>
                <div class="rightDiv">
                	<div class="scrollbars">
                		<div class="awards">
                        <?php  $text=$hobj->select("wm_awardtext","wm_award","1");						echo $text[0]['wm_awardtext'];					?>
                        </div>
                       
                </div>
                </div>
            </div>
        </div><?php include('footer.php');?>	
		