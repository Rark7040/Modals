<?php

declare(strict_types=1);

namespace rarkhopper\modals\long\element;

use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

class ButtonList extends NamedElement implements IPrimaryElement{
	/** @var array<LongFormButton> */
	private array $buttons = [];

	public function __construct(){
		parent::__construct('buttons');
	}

	/**
	 * @return array<LongFormButton>
	 */
	public function getAll() : array{
		return $this->buttons;
	}

	public function append(LongFormButton $button) : void{
		$this->buttons[] = $button;
		$this->element[] = $button->getElement();
	}
}
