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

			case 'viewProduct':
        $productID = $_GET['pid'];
				$this->viewProduct($productID);
				break;

			case 'editProduct':
        $productID = $_GET['pid'];
				$this->editProduct($productID);
				break;

			case 'editProductProcess':
				$productID = $_GET['pid'];
				$this->editProductProcess($productID);
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

		$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS)
			or die ('Error: Could not connect to MySql database');
		mysql_select_db(DB_DATABASE);

		$q = "SELECT * FROM product ORDER BY date_created; ";
		$result = mysql_query($q);

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

	public function viewProduct($id) {
		$pageName = 'Product';

		$p = Product::loadById($id);

		// $conn = mysql_connect(DB_HOST, DB_USER, DB_PASS)
		// 	or die ('Error: Could not connect to MySql database');
		// mysql_select_db(DB_DATABASE);
		//
		// $q = sprintf("SELECT * FROM product WHERE id = %d; ",
		// 	$id
		// 	);
		// $result = mysql_query($q);

		//while($row = mysql_fetch_assoc($result)) {
			// $product['title'] = $p->get('title');
			// $product['description'] = $p->get('description');
			// $product['sizes'] = $p->get('sizes');
			// $product['price'] = $p->get('price');
			// $product['img_url'] = $p->get('img_url');
		//}


		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/product.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }


	public function editProduct($id) {
		$pageName = 'Edit Product';

		$host     = DB_HOST;
		$database = DB_DATABASE;
		$username = DB_USER;
		$password = DB_PASS;

		$conn = mysql_connect($host, $username, $password)
			or die ('Error: Could not connect to MySql database');

		mysql_select_db($database);

		$q = sprintf("SELECT * FROM product WHERE id = %d ",
			mysql_real_escape_string($id)
		);
		$result = mysql_query($q);

		$product = array();
		while($row = mysql_fetch_assoc($result)) {
			$product['title'] = $row['title'];
			$product['description'] = $row['description'];
			$product['sizes'] = $row['sizes'];
			$product['price'] = $row['price'];
			$product['img_url'] = $row['img_url'];
		}

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/editProduct.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function editProductProcess($id) {
		$title = $_POST['title'];
		$description = $_POST['description'];
		$sizes = $_POST['sizes'];
		$price = $_POST['price'];
		$img_url = $_POST['img_url'];


		// create product
		$newProduct = new Product();
		$newProduct->set('title','Sweatshirt');

		$newProduct2 = new Product(
			array(
				'title' => 'Sweatshirt',
				'description' => 'A great sweatshirt',
				'price' => 25
			)
		);
		$newProduct2->save();



		$p = Product::loadById($id);
		$p->set('title', $title);
		$p->set('description', $description);
		$p->set('sizes', $sizes);
		$p->set('price', $price);
		$p->set('img_url', $img_url);
		$p->save();

		//
		//
		// // connect to DATABASE FIRST
		// $conn = mysql_connect(DB_HOST, DB_USER, DB_PASS)
		// 	or die ('Error: Could not connect to MySql database');
		// mysql_select_db(DB_DATABASE);
		//
		// $q = sprintf("UPDATE product
		// 		SET title = '%s', description = '%s', sizes = '%s', price = %d, img_url = '%s'
		// 		WHERE id = %d ",
		// 		$title,
		// 		$description,
		// 		$sizes,
		// 		$price,
		// 		$img_url,
		// 		$id
		// 	);
		// 	echo $q;
		// 	mysql_query($q);

		session_start();
		$_SESSION['msg'] = "You edited the product called ".$title;
		header('Location: '.BASE_URL.'/shirts/');
	}


}
