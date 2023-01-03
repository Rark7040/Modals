<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use LogicException;
use rarkhopper\modals\ElementBase;
use rarkhopper\modals\IPrimaryElement;

class ModalFormButton extends ElementBase implements IPrimaryElement{
	private string $txt;
	public ?bool $position = null;

	public function __construct(string $txt){
		$this->txt = $txt;
	}

	public function getName() : string{
		if($this->position === null) throw new LogicException('getName called must be initialized position');
		return 'button' . ($this->position ? '1' : '2');
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getElement() : array|string|int|bool{
		return $this->txt;
	}
}
