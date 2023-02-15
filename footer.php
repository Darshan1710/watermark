<div id="maximage">

    <img src="images/background/img1.jpg" alt=""/>

    <img src="images/background/img2.jpg"/>

    <img src="images/background/img3.jpg"/>

    <img src="images/background/img4.jpg"/>

    <img src="images/background/img5.jpg"/>

    <img src="images/background/img6.jpg"/>

</div>

<!--<script src='js/jquery.js'></script>-->

<script src="https://code.jquery.com/jquery-1.10.2.js" integrity="sha256-it5nQKHTz+34HijZJQkpNBIHsjpV8b6QzMJs9tmOBSo=" crossorigin="anonymous"></script>

<script src="js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>

<script src="js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>


<script type="text/javascript" charset="utf-8">

    $(function () {

        // Trigger maximage

        jQuery('#maximage').maximage();

    });

</script>


<!--Scripts-->

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
<script type="text/javascript">
    $(window).load(function(){
        $(".scrollbars").ClassyScroll();
    });
</script>
</body>

</html>
