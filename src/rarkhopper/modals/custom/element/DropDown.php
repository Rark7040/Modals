<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use InvalidArgumentException;
use rarkhopper\modals\NamedElement;
use function count;

class DropDown extends NamedElement implements ICustomFormOption{
	private string $txt;
	private int $default;
	/** @var array<string> */
	private array $options;

	/**
	 * @throws InvalidArgumentException
	 */
	public function __construct(string $name, string $txt, int $default, string ...$options){
		parent::__construct($name);

		if(count($options) <= $default) throw new InvalidArgumentException('default must be less than or equal to the number of elements in options');
		$this->txt = $txt;
		$this->default = $default;
		$this->options = $options;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getDefault() : int{
		return $this->default;
	}

	public function getDefaultOption() : string {
		return $this->options[$this->default];
	}

	/**
	 * @return string[]
	 */
	public function getOptions() : array{
		return $this->options;
	}

	private function putElement() : void{
		$this->element['type'] = 'dropdown';
		$this->element['text'] = $this->txt;
		$this->element['default'] = $this->default;
		$this->element['options'] = $this->options;
	}
}
