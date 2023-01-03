<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use InvalidArgumentException;
use rarkhopper\modals\NamedElement;

class Slider extends NamedElement implements ICustomFormOption{
	private string $txt;
	private int $default;
	private int $min;
	private int $max;

	/**
	 * @throws InvalidArgumentException
	 */
	public function __construct(string $name, string $txt, int $default, int $min, int $max){
		parent::__construct($name);

		if($min > $max) throw new InvalidArgumentException('min must be greater than max');
		if($min > $default || $default > $max) throw new InvalidArgumentException('default must be between min and max');
		$this->txt = $txt;
		$this->default = $default;
		$this->min = $min;
		$this->max = $max;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getDefault() : int{
		return $this->default;
	}

	public function getMin() : int{
		return $this->min;
	}

	public function getMax() : int{
		return $this->max;
	}

	private function putElement() : void{
		$this->element['type'] = 'slider';
		$this->element['text'] = $this->txt;
		$this->element['default'] = $this->default;
		$this->element['min'] = $this->min;
		$this->element['max'] = $this->max;
	}
}
