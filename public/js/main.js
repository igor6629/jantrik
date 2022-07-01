/*================================================
[  Table of contents  ]
==================================================
1. Newsletter Popup
2. Mobile Menu Activation
3 Checkout Page Activation
4. NivoSlider Activation
5. New Products Activation
6. New Upsell Product Activation
7. Side Product Activation
8. Best Seller Activation
9. Hand Tool Activation
10. Brand Banner Activation
11. Blog Activation
12. Blog two Activation
13. WOW Js Activation
14. ScrollUp Activation
15. Sticky-Menu Activation
16. Price Slider Activation
17. Testimonial Slick Carousel
18. Best Seller Activation
19. Best Product Activation
20. Blog Realted Post activation
21.Best Seller  Unique Activation
22. My JS


================================================*/
(function ($) {

  "use Strict";
  /*--------------------------
  1. Newsletter Popup
  ---------------------------*/
  setTimeout(function () {
    $('.popup_wrapper').css({
      "opacity": "1",
      "visibility": "visible"
    });
    $('.popup_off').on('click', function () {
      $(".popup_wrapper").fadeOut(500);
    })
  }, 2500);

  /*----------------------------
  2. Mobile Menu Activation
  -----------------------------*/
  jQuery('.mobile-menu nav').meanmenu({
    meanScreenWidth: "991",
  });

  /*----------------------------
  3 Checkout Page Activation
  -----------------------------*/
  $('.categorie-title').on('click', function () {
    $('.vertical-menu-list').slideToggle();
  });

  $('#showlogin').on('click', function () {
    $('#checkout-login').slideToggle();
  });
  $('#showcoupon').on('click', function () {
    $('#checkout_coupon').slideToggle();
  });
  $('#cbox').on('click', function () {
    $('#cbox_info').slideToggle();
  });
  $('#ship-box').on('click', function () {
    $('#ship-box-info').slideToggle();
  });

  /*----------------------------
  4. NivoSlider Activation
  -----------------------------*/
  $('#slider').nivoSlider({
    effect: 'random',
    animSpeed: 300,
    pauseTime: 5000,
    directionNav: false,
    manualAdvance: true,
    controlNavThumbs: false,
    pauseOnHover: true,
    controlNav: true,
    prevText: "<i class='zmdi zmdi-chevron-left'></i>",
    nextText: "<i class='zmdi zmdi-chevron-right'></i>"
  });

  /*----------------------------------------------------
  5. New Products Activation
  -----------------------------------------------------*/
  $('.new-pro-active').owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1000,

    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 30,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 2
      },
      768: {
        items: 2
      },
      1000: {
        items: 2
      },
      1200: {
        items: 3
      }
    }

  })
  /*----------------------------------------------------
  6. New Upsell Product Activation
  -----------------------------------------------------*/
  $('.new-upsell-pro').owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1000,

    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 30,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 2
      },
      768: {
        items: 2
      },
      1000: {
        items: 3
      },
      1200: {
        items: 4
      }
    }

  })

  /*----------------------------------------------------
  7. Side Product Activation
  -----------------------------------------------------*/
  $('.side-product-list-active')
  .on('changed.owl.carousel initialized.owl.carousel', function (event) {
    $(event.target)
    .find('.owl-item').removeClass('last')
    .eq(event.item.index + event.page.size - 1).addClass('last');
  }).owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1500,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 1,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 2
      },
      768: {
        items: 2
      },
      991: {
        items: 1
      }
    }
  })

  /*----------------------------------------------------
  8. Best Seller Activation
  -----------------------------------------------------*/
  $('.best-seller-pro-active')
  .on('changed.owl.carousel initialized.owl.carousel', function (event) {
    $(event.target)
    .find('.owl-item').removeClass('last')
    .eq(event.item.index + event.page.size - 1).addClass('last');
  }).owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1200,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 1,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 2
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      },
      1200: {
        items: 4
      }
    }
  })

  /*----------------------------------------------------
  9. Hand Tool Activation
  -----------------------------------------------------*/
  $('.hand-tool-active').owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1200,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 30,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 2
      },
      768: {
        items: 3
      },
      992: {
        items: 3
      },
      1200: {
        items: 4
      }
    }
  })
  /*----------------------------------------------------
  10. Brand Banner Activation
  -----------------------------------------------------*/
  $('.brand-banner').on('changed.owl.carousel initialized.owl.carousel', function (event) {
    $(event.target)

    .find('.owl-item').removeClass('last')
    .eq(event.item.index + event.page.size - 1).addClass('last');

    $(event.target)
    .find('.owl-item').removeClass('first')
    .eq(event.item.index).addClass('first')


  }).owlCarousel({
    loop: false,
    nav: false,
    dots: false,
    smartSpeed: 1200,
    margin: 1,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 3
      },
      768: {
        items: 4
      },
      1000: {
        items: 5
      }
    }
  })

  /*----------------------------------------------------
  11. Blog Activation
  -----------------------------------------------------*/
  $('.blog-active').owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1000,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 30,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      768: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  })
  /*----------------------------------------------------
  12. Blog two Activation
  -----------------------------------------------------*/
  $('.blog-active2').owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1000,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 30,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      768: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  })
  /*----------------------------
  13. WOW Js Activation
  -----------------------------*/
  new WOW().init();

  /*----------------------------
  14. ScrollUp Activation
  -----------------------------*/
  $.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '550', // Distance from top before showing element (px)
    topSpeed: 1000, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    scrollSpeed: 900,
    animationInSpeed: 1000, // Animation in speed (ms)
    animationOutSpeed: 1000, // Animation out speed (ms)
    scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
    activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });

  /*----------------------------
  15. Sticky-Menu Activation
  ------------------------------ */
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 150) {
      $('.header-sticky').addClass("sticky");
    } else {
      $('.header-sticky').removeClass("sticky");
    }
  });

  /*----------------------------
  16. Price Slider Activation
  -----------------------------*/
  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 80,
    values: [0, 74],
    slide: function (event, ui) {
      $("#amount").val("$" + ui.values[0] + "  $" + ui.values[1]);
    }
  });
  $("#amount").val("$" + $("#slider-range").slider("values", 0) +
  "  $" + $("#slider-range").slider("values", 1));

  /*--------------------------------
  17. Testimonial Slick Carousel
  -----------------------------------*/
  $('.testext_active').owlCarousel({
    loop: false,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 15,
    smartSpeed: 1000,
    nav: true,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  })

  /*----------------------------------------------------
  18. Best Seller Activation
  -----------------------------------------------------*/
  $('.best-seller-pro').on('changed.owl.carousel initialized.owl.carousel', function (event) {
    $(event.target)
    .find('.owl-item').removeClass('last')
    .eq(event.item.index + event.page.size - 1).addClass('last');
  }).owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1000,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 0,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 2
      },
      768: {
        items: 2
      },
      1000: {
        items: 1
      }
    }
  })
  /*----------------------------------------------------
  19. Best Product Activation
  -----------------------------------------------------*/
  $('.best-seller-pro-two')
  .owlCarousel({
    loop: false,
    nav: false,
    dots: false,
    smartSpeed: 1200,
    margin: 0,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      768: {
        items: 3
      },
      1000: {
        items: 1
      }
    }
  })

  /*-------------------------------------
  20. Blog Realted Post activation
  --------------------------------------*/
  $('.blog-related-post-active').owlCarousel({
    loop: false,
    margin: 30,
    smartSpeed: 1000,
    nav: false,
    dots: false,
    items: 2,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      480: {
        items: 1
      },
      768: {
        items: 2
      },
      992:{
        margin: 29,
        items: 2
      },
      1200: {
        items: 2
      }
    }
  })

  /*----------------------------------------------------
  21.Best Seller  Unique Activation
  -----------------------------------------------------*/
  $('.best-seller-unique').on('changed.owl.carousel initialized.owl.carousel', function (event) {
    $(event.target)
    .find('.owl-item').removeClass('last')
    .eq(event.item.index + event.page.size - 1).addClass('last');
  }).owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    smartSpeed: 1000,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 0,
    responsive: {
      0: {
        items: 1,
        autoplay:true
      },
      768: {
        items: 2
      },
      1000: {
        items: 1
      }
    }
  })

  // Поиск
  var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
      wildcard: '%QUERY',
      url: path + '/search/typeahead?query=%QUERY'
    }
  });

  products.initialize();

  $("#typeahead").typeahead({
    // hint: false,
    highlight: true
  },{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
  });

  $('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
  });

  // Работа с корзиной
  $('body').on('click', '.add-cart', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
    qty = $('.box-quantity input').val() ? $('.box-quantity input').val() : 1,
    mod = $('.mods select').val();
    $.ajax({
      url: '/cart/add',
      data: {id: id, qty: qty, mod: mod},
      type: 'GET',
      success: function (res) {
        showCart(res);
      },
      error: function(){
        alert('Ошибка! Попробуйте позже');
      }
    });
  })


  $('#cart .modal-body').on('click', '.icon-delete', function (){
    var id = $(this).data('id');
    $.ajax({
      url: '/cart/delete',
      data: {id: id},
      type: 'GET',
      success: function(res){
        showCart(res);
      },
      error: function (){
        alert('Ошибка! Попробуйте позже');
      }
    })
  })

  // Модификация товара (цена с доп. памятью)
  $('.mods select').on('change', function() {
    var modId = $(this).val(),
    storage = $(this).find('option').filter(':selected').data('title'),
    price = $(this).find('option').filter(':selected').data('price'),
    basePrice = $('#base-price').data('base');
    if (price) {
      $('#base-price').text(symboleLeft + price + symboleRight);
    } else {
      $('#base-price').text(symboleLeft + basePrice + symboleRight);
    }
  });

  //white-bg
  //white-bg
  //single-product

  $('body').on('change', '.white-bg input', function(){
    var checked = $('.white-bg input:checked'),
        data = '';
    checked.each(function () {
      data += this.value + ',';
    });
    if(data){
      $.ajax({
        url: location.href,
        data: {filter: data},
        type: 'GET',
        beforeSend: function(){
          $('.preloader').fadeIn(300, function(){
            $('.single-product').hide();
          });
        },
        success: function(res){
          $('.preloader').delay(500).fadeOut('slow', function(){
            $('.single-product').html(res).fadeIn();
            var url = location.search.replace(/filter(.+?)(&|$)/g, ''); //$2
            var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
            newURL = newURL.replace('&&', '&');
            newURL = newURL.replace('?&', '?');
            history.pushState({}, '', newURL);
          });
        },
        error: function () {
          alert('Ошибка!');
        }
      });
    }else{
      window.location = location.pathname;
    }
  });


})(jQuery);

function clean() {
  $.ajax({
    url: '/cart/clear',
    type: 'GET',
    success: function(res){
      showCart(res);
    },
    error: function (){
      alert('Ошибка! Попробуйте позже');
    }
  });
}

function showCart(cart){
  if ($.trim(cart) == '<h3>Корзина пуста</h3>') {
    $('#cart .modal-footer a, #cart .modal-footer btn-danger').css('display','none');
  }else {
    $('#cart .modal-footer a, #cart .modal-footer btn-danger').css('display','inline-block');
  }
  $('#cart .modal-body').html(cart);
  $('#cart').modal();
  if ($('.cart-qty').text()){
    $('.cart-counter').html($('#cart .cart-qty').text());
  }else {
    $('.cart-counter').text('0');
  }
}

// Validate

const signup = document.getElementById('signup');
const update = document.getElementById('update');

if(signup){
    bootstrapValidate('#login', 'min:6:Логин должен содержать не менее 6 символов|alphanum:Логин содержит только латинские буквы и цифры|min:6:Логин должен содержать не менее 6 символов|alphanum:Логин содержит только латинские буквы и цифры', function (isValid) {
      if (isValid) {
        $('#login').addClass('is-valid');
      } else {
        $('#login').removeClass('is-valid');
        $('#login').addClass('is-invalid');
      }
    });

    bootstrapValidate('#name', 'required:Поле обязательное к заполнению|alpha:Имя содержит только буквы', function (isValid) {
      if (isValid) {
        $('#name').addClass('is-valid');
      } else {
        $('#name').removeClass('is-valid');
        $('#name').addClass('is-invalid');
      }
    });

    bootstrapValidate('#email', 'required:Поле обязательное к заполнению|email:Введите корректный E-mail. Например, examples@gmail.com', function (isValid) {
      if (isValid) {
        $('#email').addClass('is-valid');
      } else {
        $('#email').removeClass('is-valid');
        $('#email').addClass('is-invalid');
      }
    });

    bootstrapValidate('#address', 'required:Поле обязательное к заполнению|min:10:Введите корректный адрес. Например, г.Москва, ул.Маршала Рыбалко, д.14 кв.2', function (isValid) {
      if (isValid) {
        $('#address').addClass('is-valid');
      } else {
        $('#address').removeClass('is-valid');
        $('#address').addClass('is-invalid');
      }
    });

    bootstrapValidate('#password', 'min:8:Пароль должен содержать не менее 8 символов', function (isValid) {
      if (isValid) {
        $('#password').addClass('is-valid');
      } else {
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
      }
    });

    bootstrapValidate('#password-confirm', 'matches:#password:Ваш пароль не совпадает с введенным', function (isValid) {
      if (isValid) {
        $('#password-confirm').addClass('is-valid');
      } else {
        $('#password-confirm').removeClass('is-valid');
        $('#password-confirm').addClass('is-invalid');
      }
    });
}

if (update){
  bootstrapValidate('#password', 'min:8:Пароль должен содержать не менее 8 символов', function (isValid) {
    if (isValid) {
      $('#password').addClass('is-valid');
    } else {
      $('#password').removeClass('is-valid');
      $('#password').addClass('is-invalid');
    }});

  bootstrapValidate('#password-confirm', 'matches:#password:Ваш пароль не совпадает с введенным', function (isValid) {
    if (isValid) {
      $('#password-confirm').addClass('is-valid');
    } else {
      $('#password-confirm').removeClass('is-valid');
      $('#password-confirm').addClass('is-invalid');
    }});
}

// Маска телефона

const phone = document.getElementById('phone');

if (phone){
  jQuery(function($){
    $("#phone").mask("+380 (99) 999-99-99");
    $("#index").mask("99999");

    bootstrapValidate('#name', 'required:Поле обязательное к заполнению|alphaRu:Имя содержит только кириллицу', function (isValid) {
      if (isValid) {
        $('#name').addClass('is-valid');
      } else {
        $('#name').addClass('is-invalid');
        $('#name').removeClass('is-valid');
      }})
    bootstrapValidate('#lastname', 'required:Поле обязательное к заполнению|alphaRu:Фамилия содержит только кирилицу', function (isValid) {
      if (isValid) {
        $('#lastname').addClass('is-valid');
      } else {
        $('#lastname').removeClass('is-valid');
        $('#lastname').addClass('is-invalid');
      }
    })
    bootstrapValidate('#address', 'required:Поле обязательное к заполнению|min:10:Введите корректный адрес. Например, г.Москва, ул.Маршала Рыбалко, д.14 кв.2', function (isValid) {
      if (isValid) {
        $('#address').addClass('is-valid');
      } else {
        $('#address').removeClass('is-valid');
        $('#address').addClass('is-invalid');
      }
    })
    bootstrapValidate('#index', 'required:Поле обязательное к заполнению', function (isValid) {
      if (isValid) {
        $('#index').addClass('is-valid');
      } else {
        $('#index').removeClass('is-valid');
        $('#index').addClass('is-invalid');
      }
    })
    bootstrapValidate('#email', 'required:Поле обязательное к заполнению|email:Введите корректный E-mail. Например, examples@gmail.com', function (isValid) {
      if (isValid) {
        $('#email').addClass('is-valid');
      } else {
        $('#email').removeClass('is-valid');
        $('#email').addClass('is-invalid');
      }
    });

  });
}

const code = document.getElementById('code');

if (code){
  jQuery(function($){
    $("#code").mask("999999");
  });
}


// ОБЩИЙ РЕЙТИНГ ТОВАРА

const ratings = document.querySelectorAll('.rating');

if (ratings.length > 0) {
  initRatings();
}

function initRatings() {
  let ratingActive,
      ratingValue;

  for (let i = 0; i < ratings.length; i++) {
    const rating = ratings[i];
    initRating(rating);
  }

  function initRating(rating) {
    initRatingVars(rating);

    setRatingActiveWidth()
  }
  
  function initRatingVars(rating) {
    ratingActive = rating.querySelector('.rating__active');
    ratingValue = rating.querySelector('.rating__value_int');
  }

  function setRatingActiveWidth(i = ratingValue.innerHTML) {
    const ratingActiveWidth = i / 0.05;
    ratingActive.style.width = `${ratingActiveWidth}%`
  }
}

if (document.getElementsByClassName('rvw')) {
  $('a.rvw').on("click", function (event) {
    event.preventDefault();

    $(".detail").removeClass("active");
    $(".review").addClass("active");
    $(".dt").removeClass("in active");
    $(".dr").addClass(" in active");

    let top = $("#review_lst").offset().top;
    $('body,html').animate({scrollTop: top - 150}, 1200);
  });

  $('a.add_rvw').on("click", function (event) {
    event.preventDefault();

    $(".detail").removeClass("active");
    $(".review").addClass("active");
    $(".dt").removeClass("in active");
    $(".dr").addClass(" in active");

    let top = $("#review_add").offset().top;
    $('body,html').animate({scrollTop: top - 150}, 1200);
  });
}

  // Кабинет->редактирование профиля
  const edit = document.getElementById('edit_profile');

  if (edit){

      bootstrapValidate('#login', 'min:6:Логин должен содержать не менее 6 символов|alphanum:Логин содержит только латинские буквы и цифры|min:6:Логин должен содержать не менее 6 символов|alphanum:Логин содержит только латинские буквы и цифры', function (isValid) {
        if (isValid) {
          $('#login').addClass('is-valid');
        } else {
          $('#login').removeClass('is-valid');
          $('#login').addClass('is-invalid');
        }
      });

    bootstrapValidate('#f-name', 'required:Поле обязательное к заполнению|alphaRu:Имя содержит только кириллицу', function (isValid) {
      if (isValid) {
        $('#f-name').addClass('is-valid');
      } else {
        $('#f-name').addClass('is-invalid');
        $('#f-name').removeClass('is-valid');
      }})
      bootstrapValidate('#address_f', 'required:Поле обязательное к заполнению|min:10:Введите корректный адрес. Например, г.Москва, ул.Маршала Рыбалко, д.14 кв.2', function (isValid) {
        if (isValid) {
          $('#address_f').addClass('is-valid');
        } else {
          $('#address_f').removeClass('is-valid');
          $('#address_f').addClass('is-invalid');
        }
      })
      bootstrapValidate('#email', 'required:Поле обязательное к заполнению|email:Введите корректный E-mail. Например, examples@gmail.com', function (isValid) {
        if (isValid) {
          $('#email').addClass('is-valid');
        } else {
          $('#email').removeClass('is-valid');
          $('#email').addClass('is-invalid');
        }
      });

    bootstrapValidate('#newpassword', 'min:8:Пароль должен содержать не менее 8 символов', function (isValid) {
      if (isValid) {
        $('#newpassword').addClass('is-valid');
      } else {
        $('#newpassword').removeClass('is-valid');
        $('#newpassword').addClass('is-invalid');
      }
    });

    bootstrapValidate('#c-password', 'matches:#newpassword:Ваш пароль не совпадает с введенным', function (isValid) {
      if (isValid) {
        $('#c-password').addClass('is-valid');
      } else {
        $('#c-password').removeClass('is-valid');
        $('#c-password').addClass('is-invalid');
      }
    });
  }

