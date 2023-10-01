var pro_qty = document.querySelectorAll('pro_qty');
var pro_qty = document.querySelectorAll('pro_qty');

$(document).ready(function(){
    $('.plusButton').click(function(){
        $parentNode = $(this).parents("tr");
        $price = $parentNode.find('.productPrice').text();

        $qty = $parentNode.find('.pro_qty').val();
        $qty++;
        $parentNode.find('.pro_qty').val($qty);

        $total = $price * $qty;
        console.log($total);

        $parentNode.find('.itemPrice').text($total + ' kyat');
        totalFunction();
    })

    $('.minusButton').click(function(){

        $parentNode = $(this).parents("tr");
        $price = $parentNode.find('.productPrice').text();
        $qty = $parentNode.find('.pro_qty').val();

        if($qty > 1){
            $qty--;
            $parentNode.find('.pro_qty').val($qty);

            $total = $price * $qty;
            console.log($total);

            $parentNode.find('.itemPrice').text($total);
            totalFunction();
        }
    })

    $('.btnRemove').click(function(){
        $row = $(this).parents('tr');
        $row.remove();
        totalFunction();
    })

    $('.clearButton').click(function(){
        $('tbody tr').each(function(index,row){
            $(row).remove();
        })
        totalFunction();
    })

    function totalFunction(){
        $total = 0;
        $('tbody tr').each(function(index,row){
            $total += Number($(row).find('.itemPrice').text().replace(" kyat",""));
        })
        console.log($total);
        $('.subtotalPrice').text($total + ' kyat');
        $('.alltotalPrice').text($total+3000 + ' kyat');
        cartSaveing();

    }

    function cartSaveing(){
        $cartArray = [];
        $('tbody tr').each(function(index,row){
            $cartArray.push({
                'user_id' : $(row).find('.userID').text(),
                'product_id' : $(row).find('.productID').text(),
                'quantity' : $(row).find('.pro_qty').val()
            })
        })
        $.ajax({
            type: 'GET',
            url : 'http://127.0.0.1:8000/user/cart/save',
            data:  Object.assign({}, $cartArray),
            datatype: 'json',
            success: function(response){
                console.log(response);
            }
        })
    }
    if(window.onbeforeunload == true){

    }

    $('.orderButton').click(function(){
        console.log('click');
        $orderArray = [];
        $('tbody tr').each(function(index,row){
            $orderArray.push({
                'user_id': $(row).find('.userID').text(),
                'product_id': $(row).find('.productID').text(),
                'qty':  $(row).find('.pro_qty').val(),
                'total': $(row).find('.itemPrice').text().replace('kyat','')
            });
        });

        console.log(Object.assign({},$orderArray));
        $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/user/ajax/pizza/orderList',
            data: Object.assign({}, $orderArray),
            datatype: 'json',
            success: function(response){
                console.log(response);
                if(response.status == 'success'){

                    var url = "http://127.0.0.1:8000/user/ajax/pizza/order/payment";
	                $(location). attr('href',url);
                }
            }
        })
    })

})
