<?php

namespace seminarie\View;

use Id1354fw\View\AbstractRequestHandler;
//use seminarie\Controll\createaccount;
//use seminarie\Controll\comments.inc;
use seminarie\Controll\Comment;



//Every 30 days should be anough as the first page is not often changed
// header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

/**
 * The only purpose of this class is to show the first page of the website
 */
class AjaxComment extends AbstractRequestHandler {

	private $recipe = null;

	
	public function setRecipe($recipe){
		$this->recipe=$recipe;
	}
	

	protected function doExecute() {
		$this->session->restart();

		$comments = new \seminarie\Controll\Comment();

		$list_of_comments = $comments->getComments($this->recipe);

		//Setting the title name for the page
		$this->addVariable('comments', $list_of_comments);

		return 'ajaxcomment';
	}
}