jQuery(window).load(function () {
  jQuery('.honrix-loading-page').hide()
})

jQuery(document).ready(function () {
  // jQuery(".honrix-masonry").masonry();

  if (window.innerWidth < 768) {
    /* bootstrap menu */
    // jQuery(".navbar-nav .dropdown > a").on("click", function(e) {
    //     e.preventDefault();
    //     var sub_menu = this.nextElementSibling;
    //     if (sub_menu.className == "dropdown-menu show") {
    //         this.classList.remove("show");
    //         sub_menu.classList.remove("show");
    //         var sub_menus = this.parentNode.querySelectorAll(".dropdown-menu");
    //         sub_menus.forEach(function(menu) {
    //             if (menu.className == "dropdown-menu show") {
    //                 menu.classList.remove("show");
    //             }
    //         });
    //     } else {
    //         this.classList.add("show");
    //         sub_menu.classList.add("show");
    //     }
    // });
    // let dropdowns = document.querySelectorAll(".dropdown-toggle");
    // dropdowns.forEach((dd) => {
    //     dd.addEventListener("click", function(e) {
    //         var el = this.nextElementSibling;
    //         if (el.style.display === "block") {
    //             el.style.display = "none";
    //             var sub_menus = this.parentNode.querySelectorAll(".dropdown-menu");
    //             sub_menus.forEach(function(menu) {
    //                 if (menu.className == "dropdown-menu show") {
    //                     menu.classList.remove("show");
    //                 }
    //             });
    //         } else {
    //             el.style.display = "block";
    //         }
    //     });
    // });
    // document
    //     .querySelector("nav.navbar .close")
    //     .addEventListener("click", function() {
    //         var sub_menus = this.nextElementSibling.querySelectorAll("ul");
    //         sub_menus.forEach(function(menu) {
    //             if (menu.className == "dropdown-menu show") {
    //                 menu.classList.remove("show");
    //             } else if (menu.style.display === "block") {
    //                 menu.style.display = "none";
    //             }
    //         });
    //     });
    /* #end bootstrap menu */
  }

  if (window.innerWidth > 767) {
    jQuery('.honrix-inner-header .honrix-cart > a').on('click', function (e) {
      e.preventDefault()
      var cart = document.querySelector('.honrix-mini-cart-details')
      cart.classList.add('honrix-mini-cart-details-display')
    })

    // jQuery(".honrix-mini-cart-details .close").on("click", function(e) {
    //     // alert(e.key);
    //     var cart = document.querySelector(".honrix-mini-cart-details");
    //     cart.classList.remove("honrix-mini-cart-details-display");
    // });

    jQuery('.honrix-mini-cart-details .close').keyup(function (e) {
      // alert(e.key);
      if (e.key === 'Enter' || e.keyCode === 13) {
        var cart = document.querySelector('.honrix-mini-cart-details')
        cart.classList.remove('honrix-mini-cart-details-display')
      }
    })

    window.addEventListener('scroll', function (ev) {
      var header = document.querySelector('.honrix-header')
      var sticky_header = document.querySelector('.honrix-sticky-header')
      if (header && sticky_header) {
        if (window.scrollY >= header.offsetHeight) {
          sticky_header.classList.add('honrix-sticky-header-show')
        } else {
          sticky_header.classList.remove('honrix-sticky-header-show')
        }
      }
    })

    var sticky_header = document.querySelector('.honrix-sticky-header')
    jQuery('.honrix-content .sidebar, .honrix-entries').attr(
      'style',
      '--offset:' + (sticky_header.offsetHeight + 15) + 'px',
    )
  }
})

function close_mini_cart() {
  var cart = document.querySelector('.honrix-mini-cart-details')
  cart.classList.remove('honrix-mini-cart-details-display')
}

/* search box */
var search_buttons = document.querySelectorAll(
  '.honrix-inner-header .honrix-search-button',
)
search_buttons.forEach(function (button) {
  button.addEventListener('click', function () {
    var search_box = document.querySelector('.honrix-search-box')
    search_box.classList.add('search-box-dispaly')
  })
  button.addEventListener('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
      var search_box = document.querySelector('.honrix-search-box')
      search_box.classList.add('search-box-dispaly')
    }
  })
})

var search_close = document.querySelector('.honrix-search-box .search-close')
search_close.addEventListener('click', function () {
  var search_box = document.querySelector('.honrix-search-box')
  search_box.classList.remove('search-box-dispaly')
})

search_close.addEventListener('keyup', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
    var search_box = document.querySelector('.honrix-search-box')
    search_box.classList.remove('search-box-dispaly')
  }
})

window.addEventListener('scroll', function (ev) {
  var to_top = document.querySelector('.honrix-to-top-button')
  if (to_top) {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
      document.querySelector('.honrix-to-top-button').style.bottom =
        document.querySelector('.site-copyright').offsetHeight + 'px'
    } else {
      document.querySelector('.honrix-to-top-button').style.bottom = '0'
    }

    if (window.scrollY >= 400) {
      document.querySelector('.honrix-to-top-button').style.display = 'block'
    } else {
      document.querySelector('.honrix-to-top-button').style.display = 'none'
    }
  }
})

jQuery(
  '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>',
).insertAfter('.quantity input')
jQuery('.quantity').each(function () {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max')

  btnUp.click(function () {
    var oldValue = parseFloat(input.val())
    if (max) {
      if (oldValue >= max) {
        var newVal = oldValue
      } else {
        var newVal = oldValue + 1
      }
    } else {
      var newVal = oldValue + 1
    }
    spinner.find('input').val(newVal)
    spinner.find('input').trigger('change')
  })

  btnDown.click(function () {
    var oldValue = parseFloat(input.val())
    if (oldValue <= min) {
      var newVal = oldValue
    } else {
      var newVal = oldValue - 1
    }
    spinner.find('input').val(newVal)
    spinner.find('input').trigger('change')
  })
})
