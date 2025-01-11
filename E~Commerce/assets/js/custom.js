$(document).ready(function () {

    // Increment button logic
    $(document).on('click','.increment-btn',function (e){
        e.preventDefault();

        var product_qty = $(this).closest('.product_data').find('.product-qty').val();
        
        var value=parseInt(product_qty,10);
        value = isNaN(value) ? 0 : value ;
        if(value < 10 ){
            value++;
            var product_qty = $(this).closest('.product_data').find('.product-qty').val(value);
        }
    });

    // Decrement button logic
    $(document).on('click','.decrement-btn',function (e){
        e.preventDefault();
        var product_qty = $(this).closest('.product_data').find('.product-qty').val();
        
        var value=parseInt(product_qty,10);
        value = isNaN(value) ? 0 : value ;
        if(value > 1 ){
            value--;
            var product_qty = $(this).closest('.product_data').find('.product-qty').val(value);
        }
    });

    // Add to cart product using ajax
        $(document).on('click','.add-to-cart',function (e){
        e.preventDefault();

        var product_qty = $(this).closest('.product_data').find('.product-qty').val();
        var product_id=$(this).val();

        $.ajax({
            method: "POST",
            url : "functions/add_to_cart.php",
            data : {
                "product_id" : product_id ,
                "product_qty" : product_qty ,
                "scope" : "add"
            },
            success: function(response){
                if(response == 201){
                    alertify.success('Product Added to Cart');
                }
                else if(response == "Product_exist"){
                    alertify.success('This Product is Already in the Cart');
                }
                else if(response == 401){
                    alertify.success('Login to Continue');
                }
                else if(response == 500){
                    alertify.error('Something Went Wrong');
                }
            }
        });
    });

    // Update product quantity from Cart
    $(document).on('click','.updateQty',function (){
        var product_qty = $(this).closest('.product_data').find('.product-qty').val();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        // Call ajax to update quantity
        $.ajax({
            method: "POST",
            url : "functions/add_to_cart.php",
            data : {
                "product_id" : product_id ,
                "product_qty" : product_qty ,
                "scope" : "update"
            },
            success:function(response) {
                // You can add success feedback if needed
            }
        });
    });

    // Delete item from Cart
    $(document).on('click','.deleteItem',function() {
        var cart_id = $(this).val();

        // Call ajax to delete item
        $.ajax({
            method: "POST",
            url : "functions/add_to_cart.php",
            data : {
                "cart_id" : cart_id ,
                "scope" : "delete"
            },
            success:function(response) {
                if(response == 200){
                    alertify.success('Product Deleted from Cart');
                    // Reload the part of the page displaying cart items
                    $("#loadcart").load(location.href + " #loadcart");
                }
                else {
                    alertify.error('Something Went Wrong');
                }
            }
        });
    });

});
