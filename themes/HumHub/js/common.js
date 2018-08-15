$(function() {
	// Custom JS

  // Sliders
  $('.front-top .base-img-slider').slick({
    // normal options...
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  // Autoheight footer textarea
  var textarea = document.querySelector('footer .top textarea');

  textarea.addEventListener('keydown', autosize);

  function autosize(){
    var el = this;
    setTimeout(function(){
      el.style.cssText = 'height:auto; padding:0';
      // for box-sizing other than "content-box" use:
      // el.style.cssText = '-moz-box-sizing:content-box';
      el.style.cssText = 'height:' + el.scrollHeight + 'px';
    },0);
  }

  // Faq 
  $('.faq .anchors-info .info').click(function () {
    $(this).toggleClass('active');
    $(this).find('.desc').slideToggle();
  });

  // Smooth scroll for anchors
  // Select all links with hashes
  $('a[href*="#"]')
  // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            }
          });
        }
      }
    }); 

  // Input & label validation focus
  var inputFocus = $('input, textarea, input[type="password"]');

  inputFocus.each(function () {
    $(this).focus(function () {
      $(this).parents('.form-item').addClass('focus');
    });
    $(this).focusout(function () {
      $(this).parents('.form-item').removeClass('focus');
    });

    if ($(this).val() == '') {
      $(this).parents('.form-item').removeClass('not-empty');
    } else {
      $(this).parents('.form-item').addClass('not-empty');
    }

    $(this).bind('change paste keyup', function () {
      if ($(this).val() == '') {
        $(this).parents().removeClass('not-empty');
      } else {
        $(this).parents().addClass('not-empty');
      }
    });
  });


  // Slimmenu
  $('#navigation').slimmenu(
    {
      resizeWidth: '767',
      collapserTitle: '',
      animSpeed: 'medium',
      easingEffect: null,
      indentChildren: true,
      childrenIndenter: '&nbsp;'
    }
  );

  $('header .collapse-button').click(function () {
    $(this).toggleClass('active');
    $('.front-header .logo').toggleClass('show')
  });

  // scrollTop() >= 108
  // Should be equal the the height of the header
  $(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
      $('.front-header').addClass('fixed-header');
    }
    else {
      $('.front-header').removeClass('fixed-header');
    }
  });

  // Relocate link block on mobile header
  var linkBlock = $('header .link-block');
  if(window.matchMedia('(max-width: 767px)').matches) {
    $(linkBlock).appendTo('header #navigation');
  }

  $('.loginPopUp, .recoveryPassPopUp').magnificPopup({
    type: 'inline',
    preloader: false,
  });

  // If form has error it open form again
  var errItem = $('#login-form .form-item .has-error');
  if($(errItem).length) {
    $('.loginPopUp').click();
  }
  $('input[type="checkbox"], input[type="radio"], input[type="file"], select').styler();

  // Input tags
  $('input#tags').tagsinput();

  //////////////
  //PRIVATE PAGE SCRIPT
  //////////////
  $('.privHeader .activities-menu .activity-icon').click(function () {
    $('.privHeader .activities-menu .item').not($(this).parent()).removeClass('showSubMenu');
    $(this).parent().toggleClass('showSubMenu');
  });

  // Tabs
  // add tab position on localstorage
  // $('ul.tabs__caption').each(function(i) {
  //   var storage = localStorage.getItem('tab' + i);
  //   if (storage) {
  //     $(this).find('li').removeClass('active').eq(storage).addClass('active')
  //       .closest('div.tabs').find('div.tabs__content').removeClass('active').eq(storage).addClass('active');
  //   }
  // });

  $('ul.tabs__caption').on('click', 'li:not(.active)', function() {
    $(this)
      .addClass('active').siblings().removeClass('active')
      .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');

    var ulIndex = $('ul.tabs__caption').index($(this).parents('ul.tabs__caption'));
    localStorage.removeItem('tab' + ulIndex);
    localStorage.setItem('tab' + ulIndex, $(this).index());
  });

  function cropText() {
    var text = $('.lang-block .jq-selectbox__select-text').text().slice(0, 2);
    $('.lang-block .jq-selectbox__select-text').text(text);
  }
  cropText();

  $('.lang-block .jq-selectbox__dropdown li').click(function () {
    cropText();
  });

  // Search autocomplete
  var options = {
    url: "../searchList.json",
    getValue: "name",

    list: {
      match: {
        enabled: true
      }
    },

    theme: "square"
  };
  $("#headerSearch").easyAutocomplete(options);

  // Sidebar position
  var sidebarBlock =  $('.right-sidebar .item');
  // add tab state on localstorage
  $(sidebarBlock).each(function(i) {
    var itemId = $(this).attr('id');
    var storage = localStorage.getItem('sidebar-item-' + itemId);
    if (storage === 'true') {
      $(this).addClass('active');
      $(this).find('.item-content').slideToggle();
    }
  });

  $(sidebarBlock).find('.item-header .label').click(function () {
    $(this).parents('.item').toggleClass('active');
    $(this).parents('.item').find('.item-content').slideToggle();

    var sidebarItemId = $(this).parents('.item').attr('id');

    localStorage.removeItem('sidebar-item-' + sidebarItemId);
    localStorage.setItem('sidebar-item-' + sidebarItemId, $(this).parents('.item').hasClass('active'));

  })

  // Star rating
  var el = $(".star-rating");
  $(el).each(function () {
    var starVal = $(this).find('.starVal').text();

    $(this).starRating({
      totalStars: 5,
      initialRating: starVal,
      starSize: 25,
      readOnly: true
    });
  });

  $('.active-star-rating').starRating({
    totalStars: 5,
    initialRating: 0,
    callback: function(currentRating, $el){
      alert('rated ' + currentRating);
      console.log('DOM element ', $el);
    }
  });

  // Polls diagram
  var itemPolls = $('.diagram-polls .item');
  var biggerVal = 0;
  $(itemPolls).each(function () {
    var itemPollsVal = +$(this).find('.val').text();

    if( itemPollsVal >= biggerVal) {
      $(itemPolls).removeClass('is-bigger');
      $(this).addClass('is-bigger');
      biggerVal = +$(this).find('.val').text();
    }
  });
  $(itemPolls).each(function () {
    var diagramWidth = +$(this).find('.val').text() / biggerVal * 100;
    $(this).find('.diagram span').width(diagramWidth + '%');
  });

  // Tags cloud module
  var tagBlock = $("#all-tags, #all-footer-tags");
  $(tagBlock).each(function () {
    $(this).awesomeCloud({
      "size" : {
        "<a href='https://www.jqueryscript.net/tags.php?/grid/'>grid</a>" : 16, // word spacing, smaller is more tightly packed
        "factor" : 0, // font resize factor, 0 means automatic
        "normalize" : false // reduces outliers for more attractive output
      },
      "color" : {
        "background" : "rgba(255,255,255,0)", // background color, transparent by default
        "start" : "#ffe1b5", // color of the smallest font, if options.color = "gradient""
        "end" : "#ffb74d" // color of the largest font, if options.color = "gradient"
      },
      "options" : {
        "color" : "gradient", // random-light, random-dark, gradient
        "rotationRatio" : 0.35, // 0 is all horizontal, 1 is all vertical
        "printMultiplier" : 3, // set to 3 for nice printer output; higher numbers take longer
        "sort" : "random" // highest, lowest or random
      },
      "font" : "'Roboto', sans-serif", //  the CSS font-family string
      "shape" : "square" // circle, square, star or a theta function describing a shape
    });
  });

  $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd"
  });

  //Avatar-menu toggle btn state
  $('.avatar-menu .menu li, .follow-btn').click(function () {
    $(this).toggleClass('active-item');
  });

  $('.context-menu-btn').click(function () {
    $(this).parent().toggleClass('active-context-menu');
  })
});


