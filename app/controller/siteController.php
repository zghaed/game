<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a SiteController and route it
$pc = new SiteController();
$pc->route($action);

class SiteController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {
			case 'home':
				$this->home();
				break;

			case 'signin':
				$this->signin();
				break;

			case 'play':
				$this->Play();
				break;

			case 'level':
				$this->Level();
				break;

			case 'about':
				$this->about();
				break;

			case 'contact':
				$this->contact();
				break;

			case 'login':
				$this->login();
				break;

			case 'processLogin':
				$username = $_POST['un'];
				$password = $_POST['pw'];
				$this->processLogin($username, $password);
				break;

			// redirect to home page if all else fails
      default:
        header('Location: '.BASE_URL);
        exit();

		}

	}

  public function home() {
		$pageName = 'Home';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/home.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function signin() {
		$pageName = 'Signin';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/signin.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function play() {
		$pageName = 'Play';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/play.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function level() {
		$pageName = 'Level';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/level.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function about() {
		$pageName = 'About';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/about.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function contact() {
		$pageName = 'Contact';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/contact.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }


	public function login() {
		$pageName = 'Login';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/login.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function processLogin($u, $p) {
		$adminUsername = 'foo';
		$adminPassword = 'bar';
		if(($u == $adminUsername) && ($p == $adminPassword)) {
			session_start();
			$_SESSION['user'] = $u;
			header('Location: '.BASE_URL);
			exit();
		// 	echo 'Hooray! Access is granted.';
		// } else {
		// 	echo 'Access denied.';
		} else {
			// send them back
			header('Location: '.BASE_URL);
			exit();
		}

	}

}
