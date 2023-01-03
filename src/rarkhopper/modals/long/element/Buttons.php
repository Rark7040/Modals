<?php

declare(strict_types=1);

namespace rarkhopper\modals\long\element;

use rarkhopper\modals\ElementBase;

/**
 * @internal
 */
class Buttons extends ElementBase{
	public function __construct(){
		parent::__construct('buttons');
	}

	public function add(Button $button) : void{
		$this->element[] = $button->getElement();
	}
}
