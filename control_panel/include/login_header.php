<?php
 //$root = $_SERVER['DOCUMENT_ROOT']."/hathi_live18apr-liveFinal/admin/";
//require_once($root.'access.php');
require_once('access.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $page_title;?></title>
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />

<script type="text/javascript" src="chromejs/chrome.js">

/***********************************************
* Chrome CSS Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>


<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
  <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
   window.onload = function() {
        CKEDITOR.replace( 'editor1' );
		 CKEDITOR.replace( 'editor2' );
		  CKEDITOR.replace( 'editor3' );
		   CKEDITOR.replace( 'editor4' );
		    CKEDITOR.replace( 'editor5' );
    };
</script>
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});

</script>  

<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="ckeditor/sample.css"/>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
	$(".showdata:odd").css({'background-color':'#ececec'});
	$(".showdata:even").css({'background-color':'#fff'});
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 

<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
	$('.styledselect_form_5').selectbox({ inputClass: "styledselect_form_5" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 



<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="../index.php"><img src="images/shared/logo.png" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 


<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
			<div class="nav-divider">&nbsp;</div>
			<a href="logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
		</div>
		</div>
		
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">

		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>

<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">

<!-- start content -->
<div id="content">
<div class="chromestyle" id="chromemenu">
<ul><li><a href="about.php" rel="">About</a></li>
<li><a href="portfolio.php" rel="dropmenu1">Portfolio</a></li><li><a href="client.php" rel="dropmenu4">Client</a></li><li><a href="award.php" rel="">Award</a></li><li><a href="careers.php" rel="">Careers</a></li><li><a href="media.php" rel="">Media</a></li><li><a href="team.php" rel="dropmenu2">Team</a></li><li><a href="testimonial.php" rel="dropmenu3">Testimonials</a></li>
<!--<li><a href="about.php" rel="dropmenu2">About</a></li>
<li><a href="about.php" rel="dropmenu4">Coaching</a></li>
<li><a href="program.php" rel="dropmenu5">Program</a></li>
<li><a href="product.php" rel="dropmenu3">Products</a></li>
<li><a href="#" rel="dropmenu4">Search</a></li>	-->
</ul>
</div>

<!--1st drop down menu -->                                                   
<div id="dropmenu1" class="dropmenudiv">
<a href="category.php">Category</a>
<a href="subcategory.php">Sub-category</a>
<a href="year.php">Year</a>
<a href="product.php">Product</a><a href="listofproduct.php">View Product</a>
</div>
<div id="dropmenu2" class="dropmenudiv"><a href="team.php">Add New</a><a href="listofteam.php">View Team</a></div><div id="dropmenu3" class="dropmenudiv"><a href="testimonial.php">Add New</a><a href="listoftest.php">View Testimonials</a></div>
<div id="dropmenu4" class="dropmenudiv"><a href="client.php">Add New</a><a href="listofclient.php">View Client</a></div>
<!--2nd drop down menu -->                                                
<div id="dropmenu2" class="dropmenudiv" style="width: 150px;">
<a href="about.php">Content Management</a>
<a href="link.php">Link Management</a>
<a href="about_banner.php">Banner</a>
</div>

<!--3rd drop down menu -->                                                   
<div id="dropmenu3" class="dropmenudiv" style="width: 150px;">
<a href="workshop.php">Group Workshop</a>
<a href="session.php">Coaching</a>
<a href="product_assessments.php">Assessments</a>
<!--<a href="category.php">New Category</a>
<a href="product.php">New Product</a>-->

</div>
<!--coaching dropdown -->
<div id="dropmenu4" class="dropmenudiv" style="width: 150px;">
<a href="coaching.php">Content Management</a>
<a href="coaching_link.php">Link Management</a>
<a href="coaching_banner.php">Banner</a>
</div>
<div id="dropmenu5" class="dropmenudiv" style="width: 150px;">
<a href="program.php">Content Management</a>
<a href="program_link.php">Link Management</a>
<a href="program_banner.php">Banner</a>
</div>
<pre>





</pre>
<script src="Scripts/jquery-1.4.1.js" type="text/javascript"></script>
<script src="Scripts/jquery.msgBox.js" type="text/javascript"></script>
<link href="Styles/msgBoxLight.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

cssdropdown.startchrome("chromemenu")

</script>
<?php $siteurl='TDA';
$productphotosize=100;
$productphoto="http://localhost/xampp/girish/TDA/products/";
?>
