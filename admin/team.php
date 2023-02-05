<?php
$page_title = " Team >> Team Management";
include('include/login_header.php');
include('validateFile.php');
/* on form submit*/
if (isset($_POST['submit'])) {
    //print_r($_POST);
    //print_r($_FILES);
    if (!empty($_POST['name']) && !empty($_FILES['photo'])) {
        $name = $_POST['name'];
        $desi = $_POST['desi'];
        $status = $_POST['status'];
        $photo = $_FILES['photo'];
//        $photo_name = $photo['name'];
//        $bufferpath = $photo['tmp_name'];
        $path = '../team/' . time() . $photo_name;
//        $photoquery = move_uploaded_file($bufferpath, $path);
        $image = validateFile('photo',$path);
        $insert_query = $hobj->insert("wm_team", "wm_teammember,wm_desi,wm_phto,wm_status", "'$name','$desi','$path','$status'");
        if ($image['type'] == 'error') { ?>
            <script>alert($image['message'])</script>;
            <?php echo '<script>window.location="team.php"</script>';
        }
        if ($insert_query) {
            ?>
            <script>alert('Team Member Added Successfully')</script>
            <?php
            echo '<script>window.location="team.php"</script>';
        } else {
            echo '<script>alert("SERVER ERROR:: Please Try Again")</script>';
            echo '<script>window.location="team.php"</script>';
        }
    } else {
        echo '<script>alert("Please Enter All Data")</script>';
        echo '<script>window.location="team.php"</script>';
    }
}
?>

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
                                <th valign="top">Name:</th>
                                <td>

                                    <?php $hobj->text("text", "name", "inp-form", "Enter Name", "", ""); ?>&nbsp;<span
                                            id="s_sname"></span>
                                </td>
                            </tr>
                            <tr>
                                <th valign="top">Designation:</th>
                                <td>

                                    <?php $hobj->text("text", "desi", "inp-form", "Enter Designation", "", ""); ?>&nbsp;<span
                                            id="s_sname"></span>
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