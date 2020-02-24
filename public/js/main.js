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


// Filters
var filter;
var min = min ? Math.round(min) : 0 * curVal;
var max = max ? Math.round(max) : 2000 * curVal;
$(function() {

    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 2000,
        values: [min, max],
        slide: function(event, ui) {
            $("#amount").val(symbolLeft +  "" + Math.round(ui.values[0] * curVal) + "" + symbolRight + " - " + symbolLeft + "" + Math.round(ui.values[1] * curVal) + "" + symbolRight);
            min = Math.round(ui.values[0] * curVal);
            max = Math.round(ui.values[1] * curVal);
        }
    });

    // $('#refine').on('click', function(){
    //     console.log(window.location.search.slice(1).split('&'));
    // });

  $('#refine').on('click', function(){
      var data = getJsonFromParams(location.pathname + location.search);
      data['min'] = min;
      data['max'] = max;
      data = getParams(data);

      $.ajax({
          url: location.pathname,
          method: 'GET',
          data: data,
          beforeSend: function() {
              $('.loder').fadeIn(1);
          },
          success: function(res) {
              $('.products-ajax').html(res);
              history.pushState({}, '', location.pathname + getParamsFromJson(data));
              console.log(location.pathname)
          },
          complete: function() {
              $('.loder').delay(100).fadeOut('slow');
          }
      });
  });

  $("#amount").val(symbolLeft + "" + Math.round($("#slider-range").slider("values", 0) * curVal) + "" + symbolRight + " - " + symbolLeft + "" + Math.round($("#slider-range").slider("values", 1) * curVal) + "" + symbolRight);
//
// function $_GET(key) {
//   var p = window.location.search;
//   p = p.match(new RegExp(key + '=([1-9]+)'));
//   return p ? p[1] : false;
// }
//
// function getHref(selector, key) {
//   var p = selector;
//   p = p.match(new RegExp(key + '=([1-9]+)'));
//   return p ? p[1] : false;
// }
//
    $('body').on('change', '#input-sort', function() {
        var data = getJsonFromParams(location.pathname + location.search);
        data['min'] = min;
        data['max'] = max;
        data = getParams(data);

        $.ajax({
            url: location.pathname,
            method: 'GET',
            data: data,
            beforeSend: function() {
                $('.loder').fadeIn(1);
            },
            success: function(res) {
                $('.products-ajax').html(res);
                history.pushState({}, '', location.pathname + getParamsFromJson(data));
            },
            complete: function() {
                $('.loder').delay(100).fadeOut('slow');
            }
        });
    });

    $('body').on('change', '#input-limit', function() {
        var data = getJsonFromParams(location.pathname + location.search);
        data['min'] = min;
        data['max'] = max;
        data = getParams(data);

        $.ajax({
            url: location.pathname,
            method: 'GET',
            data: data,
            beforeSend: function() {
                $('.loder').fadeIn(1);
            },
            success: function(res) {
                $('.products-ajax').html(res);
                history.pushState({}, '', location.pathname + getParamsFromJson(data));
            },
            complete: function() {
                $('.loder').delay(100).fadeOut('slow');
            }
        });
    });

// $('body').on('click', '.btn-list-grid button', function() {
//   var view = $(this).attr('id');
//   if($(this).hasClass('grid-view')) {

//     $(this).addClass('active');
//     $('.btn-list-grid button.list-view').removeClass('active');
//   }
//   else if($(this).hasClass('list-view')) {
//     $(this).addClass('active');
//     $('.btn-list-grid button.grid-view').removeClass('active');
//   }
//   var order = $('#input-sort').val();
//   var perpage = $('#input-limit').val();
//   var slug = $('#refine').data('category');
//   var page = $_GET('page');
//   filter = $('#filter-group1 .checkbox :checkbox:checked').map(function(i, el){
//       return $(el).val();
//   }).get().join(',');
//   $.ajax({
//       url: 'categories/' + slug,
//       method: 'GET',
//       data: {slug: slug, min:min, max:max, page:page, filter:filter, order:order, perpage:perpage, view:view},
//       success: function(res) {
//       $('.products-ajax').html(res);
//           var push = '/categories/' + slug;
//           if (page) {
//           push += '?page=' + page;
//           } else {
//           push += '?page=' + 1;
//           }
//           push += '&min=' + min + '&max=' + max;
//           if (filter) {
//           push += '&filter=' + filter;
//           }
//           if (order) {
//           push += '&order=' + order;
//           }
//           if (perpage) {
//           push += '&perpage=' + perpage;
//           }
//           if (view) {
//           push += '&view=' + view;
//           }
//           history.pushState({}, '', push);
//       }
//   });
});


function getJsonFromParams(str)
{
    let params, data = {};
    if (str != "") {
        params = str.slice(location.pathname.length + 1).replace(/=/g, ':').split('&');
        if (params.join('') != "") {
            for (let i = 0; i < params.length; i++) {
                params[i] = params[i].split(':');
                data[params[i][0]] = urldecode(params[i][1]);
            }
            return data;
        }
    }
    return {};
}

/**
 * Получить параметры из JSON
 *
 * @param {object} jsonArr
 * @returns {string}
 */
function getParamsFromJson(jsonArr)
{
    let str = "";
    console.log(jsonArr)
    let i = 1;
    $.each(jsonArr, function(key, val) {
        if (i == 1) {
            if (typeof val === "string") val = val.replace(/\ #/g, '%20%23')
            str += '?' + key + '=' + val;
        } else {
            str += '&' + key + '=' + val;
        }
        i++;
    });
    console.log(str)
    return str;
}

/**
 * Декодировать URL
 *
 * @param {string} url
 * @returns {string}
 */
function urldecode(url) {
    // (str + '').replace(/\+/g, '%20')
    return decodeURIComponent(url.replace(/\+/g, '%20').replace(/\#+/g, '%23'));
}

/**
 * Сформировать и получить список всех параметров из адресной строки
 *
 * @param {object} data
 * @returns {*}
 */
function getParams(data)
{
    var filter = $('#filter-group1 .checkbox :checkbox:checked').map(function(i, el){
        return $(el).val();
    }).get().join(',');
    var order = $('#input-sort').val();
    var perpage = $('#input-limit').val();

    if (filter == "") {
        if (data['filter']) {
            delete data['filter'];
        }
    }
    if (filter != "") {
        data['filter'] = filter;
    }
    if (order != undefined) {
        console.log(order)
        data['order'] = order;
    }
    if (perpage != undefined) {
        data['perpage'] = perpage;
    }
    // if (min == 0 && max == 2000) {
    //     data['min'] = min;
    //     data['max'] = max;
    // }

    return data;
}


// Pagination
$('body').on('click', '.page-link', function(e) {
    e.preventDefault();
    let link = $(this).attr('href');

    if (!link) {
        return false;
    }

    var data = getJsonFromParams(link);
    data = getParams(data);

    $.ajax({
        url: location.pathname,
        method: 'GET',
        data: data,
        beforeSend: function() {
            $('.loder').fadeIn(1);
        },
        success: function(res) {
            $('.products-ajax').html(res);
            console.log(data);
            history.pushState({}, '', location.pathname + getParamsFromJson(data));
        },
        complete: function() {
            $('.loder').delay(100).fadeOut('slow');
        }
    });
    // filter = $('#filter-group1 .checkbox :checkbox:checked').map(function(i, el){
    //     return $(el).val();
    // }).get().join(',');
    // $.ajax({
    //     url: location.href,
    //     method: 'GET',
    //     data: {slug: slug, min:min, max:max, page:page, filter:filter},
    //
    //     success: function(res) {
    //
    //         $('.products-ajax').html(res);
    //         var push = location.pathname;
    //
    //         if (page) {
    //             push += '?page=' + page;
    //         } else {
    //             push += '?page=' + 1;
    //         }
    //
    //         push += '&min=' + min + '&max=' + max;
    //         if (filter) {
    //             push += '&filter=' + filter;
    //         }
    //
    //         history.pushState({}, '', location.pathname);
    //     },
    //     complete: function() {
    //         $('.loder').delay(100).fadeOut('slow');
    //     }
    // });
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








