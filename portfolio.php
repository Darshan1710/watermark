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
            <?php
            echo "<ul>";
            $category_sql = $hobj->select("wm_catid,wm_name", "wm_cat", "wm_status='Enable'");
            if ($category_sql != 'no') {
                foreach ($category_sql as $category) {
                    echo "<li><a href='#' id='submenu'>" . $category['wm_name'] . "</a>";
                    $check_subcat_sql = $hobj->select("wm_subcatid,wm_subname", "wm_subcat", "wm_substatus='Enable' AND wm_catid_sub='" . $category['wm_catid'] . "'");
                    //print_r($check_subcat_sql);
                    if ($check_subcat_sql != 'no') {
                        echo "<ul>";
                        foreach ($check_subcat_sql as $subcat) {
                            if ($check_subcat_sql != 'no') {
                                echo "<li><a href='#' id='submenu'>" . $subcat['wm_subname'] . "</a>";
                                $check_year_sql = $hobj->select("wm_yearid,wm_year", "wm_year", "wm_yearstatus='Enable' AND wm_subcatid_year='" . $subcat['wm_subcatid'] . "'");
                                //print_r($check_year_sql);
                                if ($check_year_sql != 'no') {
                                    echo "<ul>";
                                    foreach ($check_year_sql as $year) {
                                        echo "<li><a href='#' id='submenu'>" . $year['wm_year'] . "</a>";
                                        //SELECT * FROM `wm_product` where wm_catid_product="2" AND wm_subcatid_product="11" AND wm_year_product="2"
                                        $check_product_sql = $hobj->select("*", "wm_product", "wm_prostatus='Enable' AND wm_catid_product='" . $category['wm_catid'] . "' AND wm_subcatid_product='" . $subcat['wm_subcatid'] . "' AND wm_year_product='" . $year['wm_yearid'] . "' group by wm_product");
                                        //print_r($check_product_sql);
                                        if ($check_product_sql != 'no') {
                                            //print_r($check_product_sql);
                                            echo "<ul>";
                                            foreach ($check_product_sql as $product) {
                                                $categoryId = $category['wm_catid'];
                                                $subcategory_id = $subcat['wm_subcatid'];
                                                $year = $product['wm_year_product'];
                                                $productname = $product['wm_product'];
                                                $proid = $product['wm_proid'];
                                                //print_r($year['wm_yearid']);
                                                echo "<li><a href='portfolio.php?id=" . $proid . "&cat=" . $categoryId . "&subcat=" . $subcategory_id . "&year=" . $year . "&name=" . $productname . "'>" . $product['wm_product'] . "</a></li>";
                                                //echo '<li><a href="#">Blues Showroom</a> </li>';
                                            }
                                            echo "</ul>";
                                            echo "</li>";
                                        }
                                    }
                                    echo "</ul>";
                                } else {
                                    $check_product_sql = $hobj->select("*", "wm_product", "wm_prostatus='Enable' AND wm_catid_product='" . $category['wm_catid'] . "' AND wm_subcatid_product='" . $subcat['wm_subcatid'] . "' group by wm_product");
                                    //print_r($check_product_sql);
                                    if ($check_product_sql != 'no') {
                                        //print_r($check_product_sql);
                                        echo "<ul>";
                                        foreach ($check_product_sql as $product) {
                                            //print_r($product['wm_product']);
                                            $categoryId = $category['wm_catid'];
                                            $subcategory_id = $subcat['wm_subcatid'];
                                            $year = $product['wm_year_product'];
                                            $productname = $product['wm_product'];
                                            $proid = $product['wm_proid'];
                                            //print_r($productname);
                                            echo "<li><a href='portfolio.php?id=" . $proid . "&cat=" . $categoryId . "&subcat=" . $subcategory_id . "&year=" . $year . "&name=" . $productname . "'>" . $product['wm_product'] . "</a></li>";
                                            //$str="http://www.unicel.in/SendSMS/sendmsg.php?uname=FourMM&pass=a~a@a7b!&send=FOURMM&dest=$dest&msg=$smsmessage";
                                            //echo '<li><a href="#">Blues Showroom</a> </li>';
                                        }
                                        echo "</ul>";
                                        echo "</li>";
                                    }
                                }
                                echo "</li>";
                            } else {
                                echo "<ul><li>Test</li></ul>";
                                $check_product_sql = $hobj->select("*", "wm_product", "wm_prostatus='Enable' AND wm_catid_product='" . $category['wm_catid'] . "' group by wm_product");
                                //print_r($check_product_sql);
                                if ($check_product_sql != 'no') {
                                    //print_r($check_product_sql);
                                    echo "<ul>";
                                    foreach ($check_product_sql as $product) {
                                        //print_r($product['wm_product']);
                                        $category = $category['wm_catid'];
                                        $year = $product['wm_year_product'];
                                        $productname = $product['wm_product'];
                                        $proid = $product['wm_proid'];
                                        //print_r($productname);
                                        echo "<li><a href='portfolio.php?id=" . $proid . "&cat=" . $category . "&subcat=" . $subcategory_id . "&year=" . $year . "&name=" . $productname . "'>" . $product['wm_product'] . "</a></li>";
                                        //$str="http://www.unicel.in/SendSMS/sendmsg.php?uname=FourMM&pass=a~a@a7b!&send=FOURMM&dest=$dest&msg=$smsmessage";
                                        //echo '<li><a href="#">Blues Showroom</a> </li>';
                                    }
                                    echo "</ul>";
                                    echo "</li>";
                                }
                            }
                        }
                        $check_product_sql = $hobj->select("*", "wm_product", "wm_prostatus='Enable' AND wm_catid_product='" . $category['wm_catid'] . "' AND wm_subcatid_product='0' group by wm_product");
                        //print_r($check_product_sql);
                        if ($check_product_sql != 'no') {
                            //print_r($check_product_sql);
                            foreach ($check_product_sql as $product) {
                                $categoryId = $category['wm_catid'];
                                $year = $product['wm_year_product'];
                                $productname = $product['wm_product'];
                                $proid = $product['wm_proid'];
                                //print_r($productname);
                                echo "<li><a href='portfolio.php?id=" . $proid . "&cat=" . $categoryId . "&subcat=" . $subcategory_id . "&year=" . $year . "&name=" . $productname . "'>" . $product['wm_product'] . "</a></li>";
                                //$str="http://www.unicel.in/SendSMS/sendmsg.php?uname=FourMM&pass=a~a@a7b!&send=FOURMM&dest=$dest&msg=$smsmessage";
                                //echo '<li><a href="#">Blues Showroom</a> </li>';
                            }
                        }
                        echo "</li>";
                        echo "</ul>";
                    } else {
                        $check_product_sql = $hobj->select("*", "wm_product", "wm_prostatus='Enable' AND wm_catid_product='" . $category['wm_catid'] . "' group by wm_product");
                        //print_r($check_product_sql);
                        if ($check_product_sql != 'no') {
                            //print_r($check_product_sql);
                            echo "<ul>";
                            foreach ($check_product_sql as $product) {
                                //print_r($product['wm_product']);
                                $categoryId = $category['wm_catid'];
                                $year = $product['wm_year_product'];
                                $productname = $product['wm_product'];
                                $proid = $product['wm_proid'];
                                //print_r($productname);
                                echo "<li><a href='portfolio.php?id=" . $proid . "&cat=" . $categoryId . "&subcat=" . $subcategory_id . "&year=" . $year . "&name=" . $productname . "'>" . $product['wm_product'] . "</a></li>";
                                //$str="http://www.unicel.in/SendSMS/sendmsg.php?uname=FourMM&pass=a~a@a7b!&send=FOURMM&dest=$dest&msg=$smsmessage";
                                //echo '<li><a href="#">Blues Showroom</a> </li>';
                            }
                            echo "</ul>";
                            echo "</li>";
                        }
                    }
                    echo "</li>";
                }
            } else {
                echo "<li>dsfjsaf</li>";
            }
            echo "</ul>";
            ?>
        </div>


        <div class="bigmenuDiv">
            <ul class="bigmenu">
                <li class="arrow"><a href="#" class="sub-menu">Exibitions</a>
                    <ul class="sub-menu">
                        <li class="arrow"><a href="#" class="sub-menu">Acetech</a>
                            <ul class="sub-menu sub-menu2 scroll">

                                <li><a href="#">2009</a></li>
                                <li><a href="#">2011</a></li>
                                <li><a href="#">2012</a></li>
                                <li><a href="#">2013</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Acrex</a></li>
                        <li><a href="#">Arab Plast</a></li>
                        <li><a href="#">ET Realty</a></li>
                        <li><a href="#">Glamour</a></li>
                        <li><a href="#">IIJS</a></li>
                        <li><a href="#">MCHI</a></li>
                        <li><a href="#">MJS</a></li>
                        <li><a href="#">Plastindia</a></li>
                        <li><a href="#">sahara</a></li>
                    </ul>
                </li>
                <li class="arrow"><a href="#" class="sub-menu">Retail</a>
                    <ul class="sub-menu">
                        <li><a href="#">Blues Showroom</a></li>
                        <li><a href="#">Di Bella</a></li>
                        <li><a href="#">Malkish</a></li>
                        <li><a href="#">Jet Homes</a></li>
                        <li><a href="#">Nirvana</a></li>
                        <li><a href="#">Opulence Andheri</a></li>
                        <li><a href="#">Opulence Bandra</a></li>
                    </ul>
                </li>
                <li><a href="#" class="sub-menu">Props</a></li>
                <li class="arrow"><a href="#" class="sub-menu">Architecture</a>
                    <ul class="sub-menu ">
                        <li><a href="#">Artek</a></li>
                        <li><a href="#">Khushi</a></li>
                        <li><a href="#">Mukesh Bhatt</a></li>
                    </ul>
                </li>

            </ul>
            </ul>
        </div>
    </div>
    <div class="rightDiv">
        <div class="container">
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