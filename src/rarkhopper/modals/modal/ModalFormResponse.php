<?php

declare(strict_types=1);

namespace rarkhopper\modals\modal\element;

use rarkhopper\modals\ElementBase;

class ModalFormResponse{
	private ElementBase $element;
	private bool $raw;

	public function __construct(ElementBase $element, bool $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	public function getPressedElement() : ElementBase{
		return $this->element;
	}

	public function getRawResponse() : bool{
		return $this->raw;
	}
}
