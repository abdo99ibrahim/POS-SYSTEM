$(document).ready(function () {
    //add product button
    $('.add-product-btn').on('click',function(e){
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        console.log(id);
        var price =$.number($(this).data('price'),2);
        $(this).removeClass('btn-success').addClass('btn-default disabled')
        var html =
        // <td><input type="hidden" name="product_ids[]" value="${id}"</td>
        `<tr>
            <td>${name}</td>
            <td><input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
            <td class="product-price">${price}</td>
            <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
        </tr>`;
        $('.order-list').append(html);

        // To calculate Total Price
        calculateTotal();
    });

    //disabled btn
    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });//end of disabled

    $('body').on('click', '.remove-product-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        // To calculate Total Price
        calculateTotal()
    });
    $('body').on('keyup change','.product-quantity',function(){
        // alert($(this).val());
        var qunatity = Number($(this).val());
        var unitPrice = parseFloat($(this).data('price').replace(/,/g, ''));
        $(this).closest('tr').find('.product-price').html($.number(qunatity * unitPrice,2));
        calculateTotal();
    });
    // List all order products
    $('.order-products').on('click',function(e){
        e.preventDefault();
        $('#loading').css('display','flex');
       let url = $(this).data('url');
       console.log(url);
       let method = $(this).data('get');
       $.ajax({
        url:url,
        method:method,
        success:function(data){
            $('#loading').css('display','none');


           $('#order-product-list').empty();

           $('#order-product-list').append(data);
        }
       })
    });

   $(document).on('click','.print-btn',function(){
    $('#print-area').printThis();
   })
});

//calculate the total
function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function(index) {

        price += parseFloat($(this).html().replace(/,/g, '')); //convert string to int

    });//end of product price

    $('.total-price').html($.number(price, 2));

    //check if price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    }//end of else

}//end of calculate total
