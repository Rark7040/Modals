<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use InvalidArgumentException;
use JsonSerializable;

abstract class ModalElements implements JsonSerializable{
	protected string $title;
	/** @var array<ElementBase> */
	protected array $elements = [];

	abstract protected function getElementsType() : string;

	public function __construct(string $title){
		$this->title = $title;
	}

	public function appendElement(ElementBase $element) : void{
		if(!$element instanceof IPrimaryElement) throw new InvalidArgumentException('element must be an IPrimaryElement');
		$this->elements[] = $element;
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
		$jsonArr = [];

		foreach($this->elements as $element){
			if($element instanceof ISingleElement){
				$jsonArr[$element->getName()] = $element->getParameter();

			}else{
				$jsonArr[$element->getName()] = $element->getElement();
			}
		}
		return $jsonArr;
	}
}
