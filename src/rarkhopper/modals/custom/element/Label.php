<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\NamedElement;

class Label extends NamedElement implements ICustomFormOption{
	private string $txt;

	public function __construct(string $name, string $txt){
		parent::__construct($name);
		$this->txt = $txt;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	private function putElement() : void{
		$this->element['type'] = 'label';
		$this->element['text'] = $this->txt;
	}
}
