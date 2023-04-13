$(document).ready(function(){
	// update product quantity in cart
    $(".quantity").change(function() {		
		 var element = this;
		 setTimeout(function () { update_quantity.call(element) }, 2000);	
	});	
	function update_quantity() {	
		var pcode = $(this).attr("data-code");
		var quantity = $(this).val(); 
		$(this).parent().parent().fadeOut(); 
		$.getJSON( "manage_cart.php", {"update_quantity":pcode, "quantity":quantity} , function(data){		
			window.location.reload();			
		});
	}	
 
	

	// add item to cart
	$(document).ready(function(){
        $(".product-form").on('click','a.button',function(e){
		e.preventDefault();
		var form_data = $(this).serialize();
        var id = $(this).data('id');
        var product_title = $(this).data('proname');
		$.ajax({
			url: "cart_data.php",
			type: "POST",
			dataType:"json",
			data: form_data, product_id:id,
            success : function(data){
				jQuery("#add-item-bag").html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have added <strong>'+product_title+'</strong> to your shopping cart!</div>');
            	$("#cart-container").html(data.product); 	
				setTimeout(function () { window.location = "cart.php"; }, 2000); 
		        }
		    });
	    });	
    });

	//create a class in javascript?

	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); 
		$(this).parent().parent().fadeOut();
		$.getJSON( "manage_cart.php", {"remove_code":pcode} , function(data){
			$("#cart-container").html(data.products); 		
		});
	});
});