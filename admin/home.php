<?php 
$page_title="Home >> Text Management";
include('include/login_header.php');
//$data=$hobj->select("*","tda_hometxt","1");
//print_r($data);
if(isset($_POST['submit']))
{
	if(empty($_REQUEST['wel_title']) || empty($_REQUEST['editor1']) || empty($_REQUEST['ch_head']) || empty($_REQUEST['editor2']) || empty($_REQUEST['pr_head']) || empty($_REQUEST['editor3']) || empty($_REQUEST['editor4']))
			{
			?>
						<script>
						$(document).ready(function(){		
						$.msgBox({
							title: "Ooops",
							content: "All fields mandatory!!!",
							type: "error",
							buttons: [{ value: "Ok" }],
							afterShow: function (result) { }
						});
						});
						</script>
			<?
			}
			else
			{
					$wel_title=$_REQUEST['wel_title'];
					$wel_text=$_REQUEST['editor1'];
					$ch_head=$_REQUEST['ch_head'];
					$ch_text=$_REQUEST['editor2'];
					$pr_head=$_REQUEST['pr_head'];
					$pr_text=$_REQUEST['editor3'];
					$sch_text=$_REQUEST['editor4'];
					$id=$_REQUEST['tdaid'];
							
					$updatedata=$hobj->update("tda_hometxt","home_wel_title","'$wel_title'","home_id='$id'");
					$updatedata=$hobj->update("tda_hometxt","home_wel_text","'$wel_text'","home_id='$id'");
					$updatedata=$hobj->update("tda_hometxt","home_ch_head","'$ch_head'","home_id='$id'");
					$updatedata=$hobj->update("tda_hometxt","home_ch_text","'$ch_text'","home_id='$id'");
					$updatedata=$hobj->update("tda_hometxt","home_pr_head","'$pr_head'","home_id='$id'");
					$updatedata=$hobj->update("tda_hometxt","home_pr_text","'$pr_text'","home_id='$id'");
					$updatedata=$hobj->update("tda_hometxt","home_sch_text","'$sch_text'","home_id='$id'");
					
				//$insertquery=$hobj->insert("tda_hometxt","home_wel_title,home_wel_text,home_ch_head,home_ch_text,home_pr_head,home_pr_text,home_sch_text","'$wel_title','$wel_text','$ch_head','$ch_text','$pr_head','$pr_text','$sch_text'");
					if($updatedata)
					{?>
							<script>
							$(document).ready(function(){		
							$.msgBox({
								title:"Page Update",
								content:"Home Page Content Update Successfully",
								type:"info"
							});
							 
							});
							</script>
					<?
						echo '<script>window.location="home.php"</script>';
					}
					else
					{?>
								<script>
									$(document).ready(function(){		
									$.msgBox({
										title: "Ooops",
										content: "SERVER ERROR:: Pleaser Try Again!!!",
										type: "error",
										buttons: [{ value: "Ok" }],
										afterShow: function (result) { }
									});
									});
									</script>
						<?
							echo '<script>window.location="home.php"</script>';
								//end message-red
					}
			}
}
?>
<?php include('include/footer.php');?>    