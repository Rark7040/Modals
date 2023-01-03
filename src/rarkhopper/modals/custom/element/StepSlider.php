<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use InvalidArgumentException;
use rarkhopper\modals\NamedElement;
use function count;

class StepSlider extends NamedElement implements ICustomFormOption{
	private string $txt;
	private int $default;
	/** @var array<string> */
	private array $steps;

	/**
	 * @throws InvalidArgumentException
	 */
	public function __construct(string $name, string $txt, int $default, string ...$steps){
		parent::__construct($name);

		if(count($steps) <= $default) throw new InvalidArgumentException('default must be less than or equal to the number of elements in steps');
		$this->txt = $txt;
		$this->default = $default;
		$this->steps = $steps;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getDefault() : int{
		return $this->default;
	}

	public function getDefaultStep() : string {
		return $this->steps[$this->default];
	}

	/**
	 * @return string[]
	 */
	public function getSteps() : array{
		return $this->steps;
	}

	private function putElement() : void{
		$this->element['type'] = 'step_slider';
		$this->element['text'] = $this->txt;
		$this->element['default'] = $this->default;
		$this->element['steps'] = $this->steps;
	}
}
