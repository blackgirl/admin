<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<head>
  <!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title>Unicreo - Web | Apps | Design</title>
  <meta name="description" content="software development, software outsourcing, out-staffing, design">
  <meta name="keywords" content="software development, software outsourcing, out-staffing, design">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon" type="image/png">
  <!-- Bootstrap style -->
  <link href="css/bootstrap.min.css" rel="stylesheet">  
  <!-- slick slider style -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  <!-- Flexslider Style -->
  <link href="css/flexslider.css" rel="stylesheet">
  <!-- Flexi slider Style -->
  <link href="css/owl.carousel.css" rel="stylesheet"> 
  <!-- Font Awesome Style -->
  <link href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- Animate -->
  <link href="css/animate.css" rel="stylesheet">
  <!-- Lightbox -->
  <link href="css/magnific-popup.css" rel="stylesheet">  
  <!-- Theme style -->
  <link href="css/style.css" rel="stylesheet">      
  <!-- Components style -->
  <link href="css/components.css" rel="stylesheet"> 
  <!-- Main color scheme -->
  <link href="css/color/color-1.css" rel="stylesheet" id="color">
  <!-- Bootstrap override style -->                 
  <link href="css/bootstrap-override.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Fauna+One&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese' rel='stylesheet' type='text/css'>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="js/modernizr.js"></script>

    <!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->   
<script type="text/javascript"> 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11367084-5']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>  
</head>       
<body class="body-padding">
  <?php include 'view/includes/header.php'; ?>
  <section>
    <?php include 'view/includes/section_paralax_top.php'; ?>
    <?php include 'view/includes/section_problems.php'; ?>
    <div id="expertise" class="container expertise">
      <div class="row spacer80"></div>
      <?php include 'view/includes/section_expertises.php'; ?>
      <?php include 'view/includes/section_technical.php'; ?>
      <?php include 'view/includes/section_technical_modal.php'; ?>
    </div>

<div class="row spacer80" id="portfolio"></div>
<div class="container" >
  <div class="row show-and-hide-content">
    <div class="span12">
      <h4 class="section-title">Featured cases</h4>
      <!-- FILTERS -->
      <?php include 'view/includes/section_portfolio_filter_t.php'; ?>
      <?php include 'view/includes/section_portfolio_filter_e.php'; ?>
      <!-- Filters End -->

      <!-- PORTFOLIO -->
      <div class="owl-carousel carousel-top-navigation">    
        <section class="row" id="portfolio-items">
          <ul class="portfolio">
            <?php
              foreach($projectsArray as $project) {
                include 'view/includes/template_project_preview.php';
              }
            ?>

          </ul> 
        </section>
      </div>
    </div>          
  </div>
  <div class="owl-controlls clickable" style="display: none;"><div class="owl-buttons"><div class="owl-prev disabled"></div><div class="owl-next disabled"></div></div></div>  
</div>
<!-- </div>
</div>
</div> -->
     
</section> <!-- section end -->   

<?php include 'view/includes/section_ideas.php'; ?>
<?php include 'view/includes/section_prices.php'; ?>
<?php include 'view/includes/footer.php'; ?>

<!-- Javascript -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script> 
  <script src="js/bootstrap.min.js"></script>  
  <script src="js/jquery.easing.js"></script>   
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>   
  <script src="js/jquery.fitvids.js"></script>
  <script src="js/jquery.appear.js"></script>  
  <script src="js/retina.js"></script>
  <script src="js/functions.js"></script>   
  <script src="js/respond.min.js"></script>  
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.meanmenu.2.0.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/jquery.refineslide.js"></script>      
  <script src="js/sly.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.zoom.js"></script>
  <script type="text/javascript" src="slick/slick.js"></script>
  <script src="js/filter.js"></script>
</body>
</html>