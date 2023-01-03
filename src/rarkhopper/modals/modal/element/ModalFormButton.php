<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\ISingleElement;
use rarkhopper\modals\PrimaryElement;

class ModalFormButton extends PrimaryElement implements ISingleElement{
	private string $txt;

	public function __construct(string $name, string $txt){
		parent::__construct($name);
		$this->txt = $txt;
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getParameter() : string|int|bool{
		return $this->txt;
	}
}
