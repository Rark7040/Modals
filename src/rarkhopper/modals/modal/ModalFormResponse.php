<?php

declare(strict_types=1);

namespace rarkhopper\modals\modal\element;

use rarkhopper\modals\long\ModalFormButton;

class ModalFormResponse{
	private ModalFormButton $element;
	private bool $raw;

	public function __construct(ModalFormButton $element, bool $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	public function getPressedElement() : ModalFormButton{
		return $this->element;
	}

	public function getRawResponse() : bool{
		return $this->raw;
	}
}
