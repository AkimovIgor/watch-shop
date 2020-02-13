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

function displayFlash(text) {
  $('.alert .alert-text').text(text);
  $('.alert').show('fast');
  setTimeout(function() {
    $('.alert').hide('slow');
  }, 2000);
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
}

$('body').on('click', '.close-cart', function() {
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
  if (qty === '' || qty == 0) qty = 1;
  updateCart(id, qty);
})

$('body').on('mouseout', '.cart-qty', function() {
  var qty = $(this).val(),
      id = $(this).data('id');
  if (qty === '' || qty == 0) qty = 1;
  updateCart(id, qty);
})
// Cart End