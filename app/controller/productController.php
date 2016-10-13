<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a ProductController and route it
$pc = new ProductController();
$pc->route($action);

class ProductController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {
			case 'products':
        $productType = $_GET['ptype'];
        if($productType == 'shirts') {
				    $this->shirts();
        } elseif($productType == 'pants') {
            $this->pants();
        }
				break;

			case 'product':
        $productID = $_GET['pid'];
				$this->product($productID);
				break;

			case 'checkout':
				$this->checkout();
				break;

      // redirect to home page if all else fails
      default:
        header('Location: '.BASE_URL);
        exit();
		}

	}

  public function pants() {
		$pageName = 'Pants';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/pants.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

  public function shirts() {
		$pageName = 'Shirts';
		
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/shirts.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function checkout() {
		$pageName = 'Checkout';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/checkout.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function product($id) {
		$pageName = 'Product';

    $product = array();
    switch($id) {
      case 1: // maroon t-shirt
        $product['imgURL'] = BASE_URL.'/public/img/tshirt.jpg';
        $product['name'] = 'Maroon T-shirt';
        $product['description'] = 'Some product description would go here.';
        $product['sizes'] = 'Small';
        $product['price'] = '$20';
        break;

      case 2: // football jersey
        $product['imgURL'] = BASE_URL.'/public/img/jersey.jpg';
        $product['name'] = 'Football Jersey';
        $product['description'] = 'Some product description would go here.';
        $product['sizes'] = 'Small, Medium';
        $product['price'] = '$80';
        break;
    }

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/product.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }


}
