
$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url : 'http://127.0.0.1:8000/user/order/cartAmount',
        success : function(response){
            // console.log(response.listAmount);

            $('.cartAmount').text(response.listAmount);
        }
    })
})

