<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

class ModalFormButton extends NamedElement implements IPrimaryElement{
	private string $txt;

	public function __construct(string $name, string $txt){
		parent::__construct($name);
		$this->txt = $txt;
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getElement() : array|string|int|bool{
		return $this->txt;
	}
}
