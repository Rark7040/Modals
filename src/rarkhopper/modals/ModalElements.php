<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use JsonSerializable;

abstract class ModalElements implements JsonSerializable{
	protected string $title;
	/** @var array<ElementBase> */
	protected array $elements = [];

	public function __construct(string $title){
		$this->title = $title;
	}

	/**
	 * @return ElementBase[]
	 */
	public function getElements() : array{
		return $this->elements;
	}

	public function getElementByName(string $name) : ?ElementBase{
		foreach($this->elements as $element){
			if($element->getName() !== $name) continue;
			return $element;
		}
		return null;
	}

	public function jsonSerialize(){
		return []; //TODO build
	}
}
