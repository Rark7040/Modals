<?php

declare(strict_types=1);

namespace rarkhopper\modals\long\element;

use rarkhopper\modals\PrimaryElement;

/**
 * @internal
 */
class Buttons extends PrimaryElement{
	/** @var array<Button> */
	private array $buttons = [];

	public function __construct(){
		parent::__construct('buttons');
	}

	/**
	 * @return array<Button>
	 */
	public function getAll() : array{
		return $this->buttons;
	}

	public function add(Button $button) : void{
		$this->buttons[] = $button;
		$this->element[] = $button->getElement();
	}
}
