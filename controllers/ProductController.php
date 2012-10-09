<?php

class ProductController {
	function __construct(){}
	
	public function displayProduct(){
		
		//product page
		$productPage=StaticPageController::getPageById(StaticPageController::$PAGE_PRODUCT);
		set("productPage",$productPage);
		
		
		// all product 
		$productObj=new ProductMySqlExtDAO();
		$productArray=$productObj->queryAllOrderBy('product_id');
		set("productArray",$productArray);
		
		set("productsClass","blue");
		set ( "templateTitle", "Our products" );
		set ( "tplSection", render ( "products.tpl.php" ) );
	}
	
	
	public function displayProductDetails(){
		
		$productId=ValidatorClass::prepareQuery(params('productId'),'INT');
		
		if ($productId != "" && $productId >0){
			$productObject=new ProductMySqlExtDAO();
			$productInfo=$productObject->load($productId);
			set("productInfo",$productInfo);
			
			$servicesObj=new ProductServiceMySqlExtDAO();
			$serviceArray=$servicesObj->queryByProductId($productId);
			set("serviceArray",$serviceArray);
		}
		
		set("productsClass","blue");
		set ( "templateTitle", "Our products" );
		set ( "tplSection", render ( "product.tpl.php" ) );
	}
}

?>