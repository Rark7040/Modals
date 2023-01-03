<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use rarkhopper\modals\long\element\LongFormButton;

class CustomFormResponse{
	private LongFormButton $element;
	private int $raw;

	public function __construct(LongFormButton $element, int $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	public function getPressedElement() : LongFormButton{
		return $this->element;
	}

	public function getRawResponse() : int{
		return $this->raw;
	}
}
