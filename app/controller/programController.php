<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a ProgramController and route it
$pc = new ProgramController();
$pc->route($action);

class ProgramController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {
			case 'programs':
				$this->programs();
				break;

			case 'level':
				$id = $_GET['pid'];
				$this->level($id);
				break;

			case 'editProgram':
				$id = $_GET['pid'];
				$this->editProgram($id);
				break;

			case 'editProgramProcess':
				$id = $_GET['pid'];
				$this->editProgramProcess($id);
				break;

      // redirect to home page if all else fails
      default:
        header('Location: '.BASE_URL);
        exit();
		}

	}

  public function programs() {
		$pageName = 'Play';

		$p = Program::getAllPrograms();

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/programs.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function level($id) {
		$pageName = 'Level' + $id;

		$p = Program::loadById($id);

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/level.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function editProgram($id) {
		$pageName = 'Program';

		$p = Program::loadById($id);

		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/editProgram.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function editProgramProcess($id) {
		$title = $_POST['title'];
		$code = $_POST['code'];
		$level = $_POST['level'];
		$logo_url = $_POST['logo_url'];


		// create program
		// $newProgram = new Program(
		// 	array(
		// 		'title' => 'Sweatshirt',
		// 		'code' => 'A great sweatshirt',
		// 		'level' => 25,
		// 		'creator_id' => 1
		// 	)
		// );
		// $newProgram->save();

		$p = Program::loadById($id);
		$p->set('title', $title);
		$p->set('code', $code);
		$p->set('level', $level);
		$p->set('logo_url', $logo_url);
		$p->save();
		$id = $p->getId();
		session_start();
		$_SESSION['msg'] = "You edited the program called ".$title;
		header('Location: '.BASE_URL.'/programs/level/'.$id);
	}
}
