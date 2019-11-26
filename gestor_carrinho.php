<?php
session_start();
include_once("bd.php");
setlocale(LC_MONETARY,"pt_PT");
# Adicionar produtos ao carrinho
if(isset($_POST["product_code"])) {
	foreach($_POST as $key => $value){
		$product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
	}	
	$statement = $bd->prepare("SELECT produto,preco FROM loja WHERE product_code=? LIMIT 1");
	$statement->bind_param('s', $product['product_code']);
	$statement->execute();
	$statement->bind_result($produto, $preco);
	while($statement->fetch()){ 
		$product["product_name"] = $produto;
		$product["product_price"] = $preco;		
		if(isset($_SESSION["products"])){ 
			if(isset($_SESSION["products"][$product['product_code']])) {				
				$_SESSION["products"][$product['product_code']]["product_qty"] = $_SESSION["products"][$product['product_code']]["product_qty"] + $_POST["product_qty"];				
			} else {
				$_SESSION["products"][$product['product_code']] = $product;
			}			
		} else {
			$_SESSION["products"][$product['product_code']] = $product;
		}	
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Remover produto do carrinho
if(isset($_GET["remove_code"]) && isset($_SESSION["products"])) {
	$product_code  = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);
	if(isset($_SESSION["products"][$product_code]))	{
		unset($_SESSION["products"][$product_code]);
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Atualizar quantidade do carrinho
if(isset($_GET["update_quantity"]) && isset($_SESSION["products"])) {	
	if(isset($_GET["quantity"]) && $_GET["quantity"]>0) {		
		$_SESSION["products"][$_GET["update_quantity"]]["product_qty"] = $_GET["quantity"];	
	}
	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}	