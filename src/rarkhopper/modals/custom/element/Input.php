<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\NamedElement;

class Input extends NamedElement implements ICustomFormOption{
	private string $txt;
	private string $default;
	private string $placeholder;

	public function __construct(string $name, string $txt, string $default, string $placeholder){
		parent::__construct($name);
		$this->txt = $txt;
		$this->default = $default;
		$this->placeholder = $placeholder;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getDefault() : string{
		return $this->default;
	}

	public function getPlaceholder() : string{
		return $this->placeholder;
	}

	private function putElement() : void{
		$this->element['type'] = 'input';
		$this->element['text'] = $this->txt;
		$this->element['default'] = $this->default;
		$this->element['placeholder'] = $this->placeholder;
	}
}
