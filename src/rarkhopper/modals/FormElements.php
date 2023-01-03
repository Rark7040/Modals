<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use JsonSerializable;
use rarkhopper\modals\utils\FormTitle;

abstract class FormElements implements JsonSerializable{
	protected string $title;
	/** @var array<IPrimaryElement> */
	protected array $elements = [];

	public function __construct(string $title){
		$this->title = $title;
		$this->appendElement(new FormTitle($title));
	}

	public function getTitle() : string{
		return $this->title;
	}

	public function appendElement(IPrimaryElement $element) : void{
		$this->elements[] = $element;
	}

	/**
	 * @return IPrimaryElement[]
	 */
	public function getElements() : array{
		return $this->elements;
	}

	public function getElementByName(string $name) : ?ElementBase{
		foreach($this->elements as $element){
			if(!$element instanceof NamedElement) continue;
			if($element->getName() !== $name) continue;
			return $element;
		}
		return null;
	}

	public function jsonSerialize(){
		$jsonArr = [];

		foreach($this->elements as $element){
			$jsonArr[$element->getName()] = $element->getElement();
		}
		return $jsonArr;
	}
}
