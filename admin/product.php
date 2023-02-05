<?php
$page_title = "Product Management >> Product Category";
include('include/login_header.php');
include('validateFile.php');
/* on form submit*/
if (isset($_POST['submit'])) {
    if (!empty($_POST['product']) && !empty($_FILES['photo'])) {
        $cat_type = $_POST['cat_type'];
        $subcat_id = $_POST['subcat_type'];
        $year = $_POST['year_type'];
        $product = $_POST['product'];
        $status = $_POST['status'];
        $photo = $_FILES['photo'];
		$photo_name=$photo['name'];
//		$bufferpath=$photo['tmp_name'];
		$path='photo/'.time().$photo_name;
//		$photoquery=move_uploaded_file($bufferpath,$path);
        $image = validateFile('photo',$path);
        if ($image['type'] == 'error') { ?>
            <script>alert($image['message'])</script>;
            <?php echo '<script>window.location="product.php"</script>';
        }
        $insert_query = $hobj->insert("wm_product", "wm_catid_product,wm_subcatid_product,wm_year_product,wm_product,wm_path,wm_prostatus", "'$cat_type','$subcat_id','$year','$product','$path','$status'");
        if ($insert_query) {
            ?>
            <script>alert('Product Added Successfully')</script>
            <?php
            echo '<script>window.location="product.php"</script>';
        } else {
            echo '<script>alert("SERVER ERROR:: Please Try Again")</script>';
            echo '<script>window.location="product.php"</script>';
        }
    } else {
        echo '<script>alert("Please Enter All Data")</script>';
        echo '<script>window.location="product.php"</script>';
    }
}
?>
<script src="js/product.js"></script>
<!--  start page-heading -->
<div id="page-heading">
    <h1><?php echo $page_title ?></h1>
</div>
<!-- end page-heading -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
    <tr>
        <td id="tbl-border-left"></td>
        <td>
            <!--  start content-table-inner ...................................................................... START -->
            <div id="content-table-inner">
                <!--  start table-content  -->
                <form method="post" name="home_page" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                      enctype='multipart/form-data'>
                    <div class="inner-table" style="width:80%">
                        <table border="0" cellpadding="0" cellspacing="0" id="id-form">
                            <tr>
                                <th valign="top">&nbsp;</th>
                                <td id="s_error"></td>
                            </tr>
                            <tr>
                                <th valign="top">Category:</th>
                                <td>

                                    <?php
                                    $hobj->cascading_dropdown("wm_catid,wm_name", "wm_cat", "wm_status='Enable'", "cat_type");
                                    ?>&nbsp;<span id="s_cname"></span>
                                </td>
                            </tr>
                            <tr>
                                <th valign="top">Sub-Category:</th>
                                <td>
                                    <div id="subcatdiv">
                                        <?php
                                        $hobj->cascading_dropdown("wm_subcatid,wm_subname", "wm_subcat", "wm_substatus='Enable' AND wm_subcatid='1'", "subcat_type");
                                        ?></div>&nbsp;<span id="s_sname"></span>
                                </td>
                            </tr>
                            <tr>
                                <th valign="top">Year:</th>
                                <td>

                                    <div id="yeardiv">
                                        <?php
                                        $hobj->cascading_dropdown("wm_yearid,wm_year", "wm_year", "wm_yearstatus='Enable' AND wm_yearid='1'", "year_type");
                                        ?></div>&nbsp;<span id="s_sname"></span>
                                </td>
                            </tr>
                            <tr>
                                <th valign="top">Product:</th>
                                <td>

                                    <?php $hobj->text("text", "product", "inp-form", "Enter Product Name", "", ""); ?>
                                    &nbsp;<span id="s_sname"></span>
                                </td>
                            </tr>
                            <tr>
                                <th valign="top">Upload Photo:</th>
                                <td><input type="file" class="file_1" name="photo" id="photo"/><span
                                            id="s_photo"></span></td>

                            </tr>
                            <tr>
                                <th valign="top">Status:</th>
                                <td>
                                    <select name="status" id="status" class="styledselect_form_5">
                                        <option value="Enable">Enable</option>
                                        <option value="Disable">Disable</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td valign="top">
			<span id="btnsubmit">
			<input type="submit" value="" id="submit" name="submit" class="form-submit"/>
			</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>

                <div class="clear"></div>
                <div class="clear"></div>
            </div>
            <!--  end content-table-inner ............................................END  -->
        </td>
        <td id="tbl-border-right"></td>
    </tr>
    <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
    </tr>
</table>
<!-- end page-heading -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
    <tr>
        <td id="tbl-border-left"></td>
        <td>
            <!--  start content-table-inner ...................................................................... START -->
            <div id="content-table-inner">
                <!--  start table-content  -->
                <div class="clear"></div>
                <div class="clear"></div>


            </div>
            <!--  end content-table-inner ............................................END  -->
        </td>
        <td id="tbl-border-right"></td>
    </tr>
    <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
    </tr>
</table>
<?php include('include/footer.php'); ?>