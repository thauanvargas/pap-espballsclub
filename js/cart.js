$(document).ready(function(){
	// Atualizar carrinho
    $(".quantity").change(function() {		
		 var element = this;
		 setTimeout(function () { update_quantity.call(element) }, 2000);	
	});	
	function update_quantity() {
		var pcode = $(this).attr("data-code");
		var quantity = $(this).val(); 
		$(this).parent().parent().fadeOut(); 
		$.getJSON( "gestor_carrinho.php", {"update_quantity":pcode, "quantity":quantity} , function(data){		
			window.location.reload();			
		});
	}	
	// Adicionar items no carrinho
	$(".product-form").submit(function(e){
		
		var form_data = $(this).serialize();
		var button_content = $(this).find('button[type=submit]');
		
		button_content.html('Adicionando...'); 
		$.ajax({
			url: "gestor_carrinho.php",
			type: "POST",
			dataType:"json",
			data: form_data
		}).done(function(data){		
			$("#cart-container").html(data.products);
			button_content.html('Adicionar');		
		}).fail(function(xhr, textStatus, errorThrown)  {
			alert(xhr.responseText);
		}); 
		e.preventDefault();
	});	
	//Remover items do carrinho
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); 
		$(this).parent().parent().fadeOut();
		$.getJSON( "gestor_carrinho.php", {"remove_code":pcode} , function(data){
			$("#cart-container").html(data.products); 	
			window.location.reload();			
		});
	});
});