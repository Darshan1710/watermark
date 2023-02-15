<?php
include('header.php');
?>
<div class="gallery_container">
    <div class="leftDiv">
        <h1>Portfolio</h1>

        <?php
        $siteurl = "http://water-mark.in/control_panel/";
        if (isset($_REQUEST['id']) && isset($_REQUEST['cat']) && isset($_REQUEST['subcat']) && isset($_REQUEST['year']) && isset($_REQUEST['name'])) {
            if ($_REQUEST['subcat'] != '0' && $year_id = $_REQUEST['year'] != '0') {
                $cat = $_REQUEST['cat'];
                $sub = $_REQUEST['subcat'];
                $year_id = $_REQUEST['year'];
                $pro_name = $_REQUEST['name'];
                $productid = $_REQUEST['id'];
                //print_r($pro_name);
                $get_proid = $hobj->select("wm_proid", "wm_product", "wm_proid='$productid'");
                $product_path = $hobj->select("wm_name,wm_product,wm_subname,wm_year", "wm_cat,wm_subcat,wm_year,wm_product", "wm_catid_product=wm_catid AND wm_subcatid_product=wm_subcatid AND wm_year_product=wm_yearid AND wm_proid='$productid'");
                //print_r($product_path);
                $category_name = $product_path[0]['wm_name'];
                $product_name = $product_path[0]['wm_product'];
                $subcategory_name = $product_path[0]['wm_subname'];
                $product_year = $product_path[0]['wm_year'];
                //echo $category_name;
                echo "<h4></h4>";
                echo "<h4>$category_name > $subcategory_name > $product_year > $product_name</h4>";
                /* foreach($ans as $imagepath)
                {
                    $imagepath=$imagepath['wm_path'];

                    $siteurl="http://localhost/xampp/girish/water-mark/website/control_panel";
                    //print_r($siteurl."/".$imagepath);
                    echo "<div class='item'>";
                    echo '<img src="'.$siteurl."/".$imagepath.'" alt="">';
                    echo "</div>";
                } */
            } else {
                $cat = $_REQUEST['cat'];
                $pro_name = $_REQUEST['name'];
                $productid = $_REQUEST['id'];
                //print_r($pro_name);
                $get_proid = $hobj->select("wm_proid", "wm_product", "wm_proid='$productid'");
                $product_path = $hobj->select("wm_name,wm_product", "wm_cat,wm_product", "wm_catid_product=wm_catid AND wm_proid='$productid'");
                //print_r($product_path);
                $category_name = $product_path[0]['wm_name'];
                $product_name = $product_path[0]['wm_product'];
                //echo $category_name;
                echo "<h4></h4>";
                echo "<h4>$category_name > $product_name</h4>";
            }
        }
        ?>



        <div class="portfolio">
            <ul>
                <?php $category_sql = $hobj->select("wm_catid,wm_name", "wm_cat", "wm_status='Enable'");
                            if ($category_sql != 'no') {
                                foreach ($category_sql as $category) { ?>
                <li class="arrow"><a href="#" class="submenu"><?= $category['wm_name'] ?></a>
                    <ul class="sub-menu">
                        <?php $check_subcat_sql = $hobj->select("wm_subcatid,wm_subname", "wm_subcat", "wm_substatus='Enable' AND wm_catid_sub='" . $category['wm_catid'] . "'");
                                            if ($check_subcat_sql != 'no') {
                                                foreach ($check_subcat_sql as $subcat) { ?>
                        <li class="arrow"><a href="#" class="submenu"><?= $subcat['wm_subname']; ?></a>
                            <ul class="sub-menu sub-menu2 scroll">
                                 <?php $check_year_sql = $hobj->select("wm_yearid,wm_year", "wm_year", "wm_yearstatus='Enable' AND wm_subcatid_year='" . $subcat['wm_subcatid'] . "'");
                                                            if ($check_year_sql != 'no') {
                                                                foreach ($check_year_sql as $year) { ?>
                                <li><a href="#" class="submenu"><?= $year['wm_year']; ?></a>
                                    <ul>
                                                                        <?php $check_product_sql = $hobj->select("*", "wm_product", "wm_prostatus='Enable' AND wm_catid_product='" . $category['wm_catid'] . "' AND wm_subcatid_product='" . $subcat['wm_subcatid'] . "' AND wm_year_product='" . $year['wm_yearid'] . "' group by wm_product");
                                                                        if ($check_product_sql != 'no') { ?>
                                                                            <?php foreach ($check_product_sql as $product) {
                                                                                $categoryId = $category['wm_catid'];
                                                                                $subcategory_id = $subcat['wm_subcatid'];
                                                                                $year = $product['wm_year_product'];
                                                                                $productname = $product['wm_product'];
                                                                                $proid = $product['wm_proid']; ?>
                                                                                <li>
                                                                                    <a href='portfolio.php?id=<?= $proid ?>&cat=<?= $categoryId ?>&subcat=<?= $subcategory_id ?>&year=<?= $year ?>&name=<?= $productname ?>'><?= $product['wm_product'] ?></a>
                                                                                </li>
                                                                            <?php } } ?>
                                                                        </ul>
                                </li>
                                 <?php } } ?>
                            </ul>
                        </li>
                         <?php } } ?>
                    </ul>
                </li>
                 <?php } } ?>
            </ul>
            </ul>
        </div>
    </div>
    <div class="rightDiv">
            <div class="span6 offset3">
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">


                        <?php
                        if (isset($_REQUEST['cat']) && isset($_REQUEST['subcat']) && isset($_REQUEST['year']) && isset($_REQUEST['name'])) {
                            $cat = $_REQUEST['cat'];
                            if ($_REQUEST['subcat'] != '0' && $_REQUEST['year'] != '0') {
                                $sub = $_REQUEST['subcat'];
                                $year_id = $_REQUEST['year'];
                                $pro_name = $_REQUEST['name'];
                                //print_r($pro_name);
                                $ans = $hobj->select("*", "wm_product", "wm_catid_product='$cat' AND wm_subcatid_product='$sub' AND wm_year_product='$year_id' AND wm_product='$pro_name'");
                                $i = 0;
                                $len = count($ans);
                                foreach ($ans as $imagepath) {
                                    $imagepath = $imagepath['wm_path'];
                                    //$siteurl="http://water-mark.in/control_panel";
                                    //print_r($key);
                                    if ($i == 0) {
                                        // first
                                        echo '<div class="item active">';
                                        echo '<img src="' . $siteurl . "/" . $imagepath . '" alt="">';
                                        echo '</div>';
                                    }
                                    if ($i != 0) {
                                        echo "<div class='item'>";
                                        echo '<img src="' . $siteurl . "/" . $imagepath . '" alt="">';
                                        echo "</div>";
                                    }
                                    $i++;
                                    //print_r($siteurl."/".$imagepath);
                                }
                            } else {
                                $pro_name = $_REQUEST['name'];
                                //print_r($pro_name);
                                $ans = $hobj->select("*", "wm_product", "wm_catid_product='$cat' AND wm_product='$pro_name'");
                                //print_r($ans);
                                $i = 0;
                                $len = count($ans);
                                foreach ($ans as $imagepath) {
                                    $imagepath = $imagepath['wm_path'];
                                    //$siteurl="http://water-mark.in/control_panel";
                                    //print_r($key);
                                    if ($i == 0) {
                                        // first
                                        echo '<div class="item active">';
                                        echo '<img src="' . $siteurl . "/" . $imagepath . '" alt="">';
                                        echo '</div>';
                                    }
                                    if ($i != 0) {
                                        echo "<div class='item'>";
                                        echo '<img src="' . $siteurl . "/" . $imagepath . '" alt="">';
                                        echo "</div>";
                                    }
                                    $i++;
                                }
                            }
                        } else {
                            echo '<div class="item active">
					<img src="images/Acetech-2009/Vis-a-Vis/1.png" alt="">
					
					</div>';
                        }
                        ?>


                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                </div>
            </div>
    </div>
</div>
</div>

<div id="maximage">
    <img src="images/background/img1.jpg" alt=""/>
    <img src="images/background/img2.jpg"/>
    <img src="images/background/img3.jpg"/>
    <img src="images/background/img4.jpg"/>
    <img src="images/background/img5.jpg"/>
    <img src="images/background/img6.jpg"/>
</div>

<script src='js/jquery.js'></script>
<script src="js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>
<script src="js/ace-responsive-menu.js" type="text/javascript"></script>
<script src="js/jquery.classyscroll.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#respMenu").aceResponsiveMenu({
            resizeWidth: '768', // Set the same in Media query
            animationSpeed: 'fast', //slow, medium, fast
            accoridonExpAll: false //Expands all the accordion menu on click
        });
    });
</script>


<script type='text/javascript' src="js/bootstrap.min.js"></script>
<script type='text/javascript'>

    $(document).ready(function () {
        $('#myCarousel').carousel({interval: 1000000000});

        var myInterval = false;
        $('.carousel-control').mouseover(function () {
            var ctrl = $(this);
            var interval = 1600;

            myInterval = setInterval(function () {
                ctrl.trigger("click");
            }, interval);
        });

        $('.carousel-control').mouseout(function () {
            clearInterval(myInterval);
            myInterval = false;
        });


        $(document).ready(function () {
            var $nav = $('ul.bigmenu > li');
            $nav.hover(
                function () {
                    $('ul', this).stop(true, true).slideDown(300);
                    //	$('ul', this).stop(true, true).animate({opacity: "1"});
                },
                function () {
                    $('ul', this).slideUp(300);
                    //	$('ul', this).animate({opacity: "0"});
                });
        });

    });

</script>


<script type="text/javascript" charset="utf-8">
    $(function () {
        // Trigger maximage
        jQuery('#maximage').maximage();
    });
</script>


</body>
</html>