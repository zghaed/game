<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a ProductController and route it
$pc = new ProgramController();
$pc->route($action);

class ProgramController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {
			case 'programs':
        // $productType = $_GET['ptype'];
        $this->programs();
        // if($productType == 'beginner') {
				//     $this->beginner();
        // } elseif($productType == 'intermediate') {
        //     $this->intermediate();
        // } elseif($productType == 'advanced') {
        //     $this->advanced();
        // }
				break;

			case 'program':
        $productID = $_GET['pid'];
				$this->program($programID);
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

  public function programs() {
		$pageName = 'Play';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/programs.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

  public function intermediate() {
		$pageName = 'Intermediate';

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/intermediate.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

  public function advanced() {
		$pageName = 'Advanced';

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/advanced.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function checkout() {
		$pageName = 'Checkout';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/checkout.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function program($id) {
		$pageName = 'Program';

    $program = array();
    switch($id) {
      case 1: // maroon t-shirt
        $program['imgURL'] = BASE_URL.'/public/img/tshirt.jpg';
        $program['name'] = 'Maroon T-shirt';
        $program['description'] = 'Some product description would go here.';
        $program['sizes'] = 'Small';
        $program['price'] = '$20';
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
