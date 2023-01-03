<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\ModalElements;

class LongFormElements extends ModalElements{
	public function addButton(Button $button) : void{
		$this->elements[] = $button;
	}
}