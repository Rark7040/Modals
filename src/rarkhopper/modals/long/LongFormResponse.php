<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\ElementBase;

class LongFormResponse{
	private ElementBase $element;
	private int $raw;

	public function __construct(ElementBase $element, int $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	public function getPressedElement() : ElementBase{
		return $this->element;
	}

	public function getRawResponse() : int{
		return $this->raw;
	}
}
