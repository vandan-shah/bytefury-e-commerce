$(document).ready(function () {
    $('.add-to-cart-btn').click(function (e) {
        e.preventDefault();
        
        alert("I am Here");
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // var product_id = $(this).closest('.product_data').find('.product_id').val();
        // var quantity = $(this).closest('.product_data').find('.qty-input').val();

        // $.ajax({
        //     url: "/add-to-cart",
        //     method: "POST",
        //     data: {
        //         'quantity': quantity,
        //         'product_id': product_id,
        //     },
        //     success: function (response) {
        //         alertify.set('notifier','position','top-right');
        //         alertify.success(response.status);
        //     },
        // });
    });
});
