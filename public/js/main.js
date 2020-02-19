$('.currency ul li').click(function() {
  val = $(this).text();
  window.location = 'currency/change?curr=' + val;
});

// Color select (выбор цвета)
$('.color select').on('change', function() {
  var id = $(this).val(),
      color = $(this).find('option').filter(':selected').data('title'),
      price = $(this).find('option').filter(':selected').data('price'),
      basePrice = $('.base-price').data('price');
  if (price) {
    $('.base-price').text(price.toFixed(2));
  } else {
    $('.base-price').text(basePrice);
  }
});

// Cart
$('body').on('click', '.add-to-cart', function(e) {
  e.preventDefault();
  var id = $(this).data('id'),
      qty = $('.qty input').val() ? Number($('.qty input').val()) : 1,
      mod = $('.color select').find('option').filter(':selected').val();
    
    $.ajax({
      url: '/cart/add',
      method: 'GET',
      data: {id: id, qty: qty, mod: mod},
      success: function(res) {
        showCart(res);
        displayFlash('Successfully added!');
      },
      error: function() {
        alert('Error! Please try later.');
      }
    });
});

function showCart(res) {
  $('#cart-dropdown').html(res);
  var totalQty = $('#total-qty').text();
  if (totalQty !== '') {
    $('#cart-total span').text(totalQty);
  } else {
    $('#cart-total span').text('0');
  }
}

function showMainCart(res)
{
  $('.cart_main').html(res);
  var totalQty = $('#total-price').data('qty');
  if (totalQty !== '') {
    $('#cart-total span').text(totalQty);
  } else {
    $('#cart-total span').text('0');
  }
}

function updateOrder(res)
{
  $('.order-ajax').html(res);
  var totalQty = $('#total-price').data('qty');
  if (totalQty !== '') {
    $('#cart-total span').text(totalQty);
  } else {
    $('#cart-total span').text('0');
  }
}

function displayFlash(text) {
  $('.alert .alert-text').text(text);
  $('.alert').show();
  setTimeout(function() {
    $('.alert').hide();
  }, 3000);
}

function deleteItem(id) {
  $.ajax({
    url: '/cart/delete',
    method: 'GET',
    data: {id: id},
    success: function(res) {
      showCart(res);
    },
    error: function() {
      console.log(1);
    }
  });
  $.ajax({
    url: '/cart/delete-main',
    method: 'GET',
    data: {id: id},
    success: function(res) {
      showMainCart(res);
    },
    error: function() {
      console.log(1);
    }
  });
  $.ajax({
    url: '/cart/delete-order',
    method: 'GET',
    data: {id: id},
    success: function(res) {
      updateOrder(res);
    },
    error: function() {
      console.log(1);
    }
  });
}

function updateCart(id, qty)
{
  $.ajax({
    url: 'cart/update',
    method: 'GET',
    data: {id: id, qty: qty},
    success: function(res) {
      showMainCart(res);
    },
    error: function() {

    }
  });
  $.ajax({
    url: 'cart/update-cart',
    method: 'GET',
    data: {id: id, qty: qty},
    success: function(res) {
      showCart(res);
    },
    error: function() {

    }
  });
  $.ajax({
    url: 'cart/update-order',
    method: 'GET',
    data: {id: id, qty: qty},
    success: function(res) {
      updateOrder(res);
    },
    error: function() {

    }
  });
}

$('body').on('click', '.close-cart', function() {
  var id = $(this).data('id');
  deleteItem(id);
})

$('body').on('click', '.cart-del', function() {
  var id = $(this).data('id');
  deleteItem(id);
})

$('body').on('click', '.cart-del', function() {
  var id = $(this).data('id');
  deleteItem(id);
})

$('body').on('focusout', '.quantity', function() {
  var qty = $(this).val(),
      id = $(this).data('id');
  if (qty === '' || qty == 0 || isNaN(qty)) qty = 1;
  updateCart(id, qty);
})

$('body').on('change', '.cart-qty', function() {
  var qty = $(this).val(),
      id = $(this).data('id');
  if (qty === '' || qty == 0 || isNaN(qty)) qty = 1;
  updateCart(id, qty);
})

$('body').on('submit', '#cart-login', function(e) {
  e.preventDefault();
  var data = $(this).serialize();
  $.ajax({
    url: 'cart/signin',
    method: 'POST',
    data: data,
    success: function(res) {
      if (res == 2) {
        window.location = path + '/cart/checkout';
      } else {
        $('.login-ajax').html(res);
      }
    }
  });
});

$('body').on('submit', '#cart-register', function(e) {
  e.preventDefault();
  var data = $(this).serialize();
  $.ajax({
    url: 'cart/signup',
    method: 'POST',
    data: data,
    success: function(res) {
      if (res == 2) {
        window.location = path + '/cart/checkout';
      } else {
        $('.register-ajax').html(res);
      }
    }
  });
});

$('body').on('click', '.button-account', function(e) {
  e.preventDefault();
  // var link = $(this).parent().parent().parent().parent().parent().find('.panel-heading').next();
  // var link2 = $(this).parent().parent().parent().parent().parent().next().find('.panel-heading').next();
  // link.collapse('toggle');
  // link2.collapse('show');
})
// Cart End


// Search
var products = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    url: path + '/search/typeahead?query=%QUERY',
    wildcard: '%QUERY'
  }
});

products.initialize();

$('.typeahead').typeahead({
  highlight: true
}, {
  name: 'products',
  display: 'title',
  limit: 10,
  source: products
});

$('.typeahead').bind('typeahead:select', function(e, suggestion) {
  window.location = path + '/search?s=' + encodeURIComponent(suggestion.title);
});
// End Search

var min = 0;
var max = 2000;
// Range Slider
$(function() {
  
  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 2000,
    values: [0, 2000],
    slide: function(event, ui) {
      $("#amount").val(symbolLeft +  "" + Math.round(ui.values[0] * curVal) + "" + symbolRight + " - " + symbolLeft + "" + Math.round(ui.values[1] * curVal) + "" + symbolRight);
      min = Math.round(ui.values[0] * curVal);
      max = Math.round(ui.values[1] * curVal);
    }
  });

  $('#refine').on('click', function(){
    var slug = $('#refine').data('category');
    var page = $_GET('page');
    $.ajax({
      url: 'categories/' + slug,
      method: 'GET',
      data: {slug: slug, min:min, max:max, page:page},
      success: function(res) {
        $('.products-ajax').html(res);
        var filter = $('#filter-group1 .checkbox :checkbox:checked').map(function(i, el){
          return $(el).val();
        }).get();
        console.log(filter);
        
        history.pushState({}, '', '/categories/' + slug + '?page=' + page + '&min=' + min + '&max=' + max + '&slug=' + slug);
      }
    });
    // window.location = path + '/categories/' + slug + '?min=' + min + '?max=' + max;
  });

  $("#amount").val(symbolLeft + "" + Math.round($("#slider-range").slider("values", 0) * curVal) + "" + symbolRight + " - " + symbolLeft + "" + Math.round($("#slider-range").slider("values", 1) * curVal) + "" + symbolRight);
});

function $_GET(key) {
  var p = window.location.search;
  p = p.match(new RegExp(key + '=([1-9]+)'));
  return p ? p[1] : false;
}

function getHref(selector, key) {
  var p = selector;
  p = p.match(new RegExp(key + '=([1-9]+)'));
  return p ? p[1] : false;
}



// Pagination
$('body').on('click', '.page-link', function(e) {
  e.preventDefault();
  var slug = $('#refine').data('category');
  var link = $(this).attr('href');
  if (!link) {
    return false;
  }
  var page = getHref(link, 'page');
  $.ajax({
    url: 'categories/' + slug,
    method: 'GET',
    data: {slug: slug, min:min, max:max, page:page},
    success: function(res) {
      $('.products-ajax').html(res);
      console.log(page);
      history.pushState({}, '', '/categories/' + slug + '?page=' + page + '&min=' + min + '&max=' + max + '&slug=' + slug );
    }
  });
})


// Authorisation
$('body').on('submit', '#register-form', function(e) {
  e.preventDefault();
  var data = $(this).serialize();
  $.ajax({
    url: 'user/signup',
    method: 'POST',
    data: data,
    success: function(res) {
      if (res == 2) {
        window.location = path;
      } else {
        $('.auth-ajax').html(res);
      }
    }
  });
});

$('body').on('submit', '#login-form', function(e) {
  e.preventDefault();
  var data = $(this).serialize();
  $.ajax({
    url: 'user/signin',
    method: 'POST',
    data: data,
    success: function(res) {
      if (res == 2) {
        window.location = path;
      } else {
        $('.auth-ajax').html(res);
      }
    }
  });
});








