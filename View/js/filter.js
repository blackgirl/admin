var detectmob = false;  
$(document).ready( function() {

  if(navigator.userAgent.match(/Android/i)
  || navigator.userAgent.match(/webOS/i)
  || navigator.userAgent.match(/iPhone/i)
  || navigator.userAgent.match(/iPad/i)
  || navigator.userAgent.match(/iPod/i)
  || navigator.userAgent.match(/BlackBerry/i)
  || navigator.userAgent.match(/Windows Phone/i)) {             
    detectmob = true;

    $(".portfolio").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: true,
      infinite: true,
      centerMode: false,
      arrows: false,
    });
  }

  // Class binding according to data-tags
  // $('#expertise .modal-wrapper li, article.project').each( function() {
  $('#expertise .modal-wrapper li, article.project').each( function() {
    var $this = $(this);
    var tags = $this.data('tags');

    if (tags) {
      var classes = tags.split(',');
      for (var i = classes.length - 1; i >= 0; i--) {
        $this.closest( "li" ).addClass(classes[i]);
      };
    }
  });

  // Modal for technical expertise
  var modalShow = function(obj) {
    var modalClass;
    var self = obj;
    var iconClass = ['icon-apps', 'icon-ruby', 'icon-net', 'icon-ux'];

    for(var i = 0; i < iconClass.length; i++ ) {
      if(self.html().indexOf(iconClass[i]) > 0) {
        modalClass = iconClass[i];
        $('.modal-wrapper li').addClass('unable');
        $('.modal-wrapper li[data-tags~='+iconClass[i]+']').removeClass('unable');
        $('.modal-wrapper li.'+iconClass[i]).removeClass('unable');
        break;
      }
    }
    
    var bodyTop = $('body').scrollTop();
    var techTop = $('.technical-ex .services-box:nth-child(1)').offset().top;
    var busLeft = $('.bussiness-ex').offset().left;
    var bodyWidth = $('body').width();
    // var marginLeft = $('#expertise').css('margin-left');
    var marginRight = parseInt($('#expertise').css('margin-right'));
    var eTop = self.offset().top;
    var eH = $('.services-box').height();
    var modalH = (eH*4);

    var posY = techTop;
    var posX = busLeft;
    var posR = self.width()+marginRight+ 15;

    if(bodyWidth < 768) {
      posX = 130;
      posR = 20;
      if(bodyWidth < 380) {
        posX = 0;
        posR = 0;
        posY = eTop + eH;
      }
    }
    if( $('.modal-wrapper').height() > modalH) var coff = eH/2;
    else var coff = (eH/2)-10;

    // Move
    $('.modal-wrapper').removeClass('hide').css({
      'top': posY, 'left': posX, 'right': posR, 'min-height': modalH,
    })
    if($('.modal-wrapper .modal-triangle').css('margin-top') == '0px')
      $('.modal-wrapper .modal-triangle').css({
        'margin-top': (eH-$('.modal-wrapper').height() + (eTop-posY-coff))
        // 'margin-top': -(modalH-((eTop-techTop)+eH))
      })
  };
  var modalHide = function() {
    $('.modal-wrapper li').addClass('unable');
    $('.modal-wrapper .modal-triangle').css({
        'margin-top': '0px'
      })
    $('.modal-wrapper').addClass('hide');
  }
  // Event binding for technical expertise's modal
  // Now on 'click' or / and 'mouseenter'
  $('.technical-ex article').on('mouseenter focus click', function() {
    modalHide();
    modalShow($(this));
  });

  $('#expertise, .modal-wrapper').on('mouseleave blur focusout', function() {
    modalHide();
  });

  // Filter projects by choosen techical expertise
  $('.modal-wrapper li').on('click', function() {
    var filter = $(this).attr('data-value');
    setExpertise('#select1', filter);
  });

  // Filter projects by choosen business expertise
  $('.bussiness-ex li').on('click', function() {
    var filter = $(this).attr('data-value');
    setExpertise('#select2', filter);
  });

});

// Set selector for filter-select by expertise type
function setExpertise(selector,filter) {
    // if we need "paired" filtering
    // $(selector).find('option:selected').prop('selected',false);
    $('.show-and-hide-content select').find('option:selected').prop('selected',false);
    $(selector+' option[data-value='+filter+']').prop('selected',true).attr('data-value', filter);
    setTimeout(function(){document.location="#portfolio"},100);
    filterProjects($(selector));
};
// Portfolio filter
function filterProjects(obj) {
    var select = obj;
    var filter = '';
    var x = select.find('option:selected').attr('data-value');

    var self = select.attr('id');
    var that = $('.show-and-hide-content select:not(#'+self+')').attr('id');

    var y = $('#'+that+'').find('option:selected').attr('data-value');

    if(!(x)) {
      $('.content').show();
      $('.portfolio').slick('slickUnfilter');
      filtered = false;
    } else {
      filter = '.'+x;
      if(y) filter = '.'+x+'.'+y;
      $('.portfolio').slick('slickFilter',filter);
      filtered = true;
    }
};

// Portfolio slider & filter
$(function () {
  var bodyWidth = $('body').width();
  var slides = bodyWidth > 1000 ? 4 : (bodyWidth < 700 ? 1 : 2);

  $(".portfolio").slick({
    infinite: true,
    // arrows: true,
    // responsive: true,
    slidesToShow: slides,
    slidesToScroll: slides,
  });
  var filtered = false;

  $('.show-and-hide-content select').on('change', function() {
      filterProjects($(this));
  });
});