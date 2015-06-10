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
              // foreach($projectsArray as $project) {
              //   include 'view/includes/template_project_preview.php';
              // }
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