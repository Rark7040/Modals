<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\NamedElement;

class Toggle extends NamedElement{
	private string $txt;
	private bool $default;

	public function __construct(string $name, string $txt, bool $default){
		parent::__construct($name);
		$this->txt = $txt;
		$this->default = $default;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getDefault() : bool{
		return $this->default;
	}

	private function putElement() : void{
		$this->element['type'] = 'toggle';
		$this->element['text'] = $this->txt;
		$this->element['default'] = $this->default;
	}
}
