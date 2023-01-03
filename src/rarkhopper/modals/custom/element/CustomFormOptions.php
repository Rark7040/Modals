<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

class CustomFormOptions extends NamedElement implements IPrimaryElement{
	/** @var array<NamedElement> */
	private array $options = [];

	public function __construct(){
		parent::__construct('content');
	}

	/**
	 * @return array<NamedElement>
	 */
	public function getAll() : array{
		return $this->options;
	}

	public function add(NamedElement $button) : void{
		$this->options[] = $button;
		$this->element[] = $button->getElement();
	}
}
