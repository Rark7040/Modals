<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\long\element\Buttons;
use rarkhopper\modals\ModalElements;

class LongFormElements extends ModalElements{
	private Buttons $buttons;

	public function __construct(string $title){
		$this->buttons = new Buttons();
		parent::__construct($title);
	}

	public function getButtons() : Buttons{
		return $this->buttons;
	}
}
