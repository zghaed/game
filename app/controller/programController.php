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
				$this->programs();
				break;

			case 'level':
				$id = $_GET['pid'];
				$this->level($id);
				break;

			case 'editProgram':
				$level = $_GET['level'];
				$this->editProgram($level);
				break;

			case 'editProgramProcess':
				$level = $_GET['level'];
				$this->editProgramProcess($level);
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


}
