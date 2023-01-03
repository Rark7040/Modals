<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\utils\FormType;

class CustomFormElements extends FormElements{
	private CustomFormOptions $options;

	public function __construct(string $title, CustomFormOptions $options){
		parent::__construct($title);
		$this->options = $options;
		$this->initElement();
	}

	private function initElement() : void{
		$this->appendElement(new FormType(FormType::TYPE_CUSTOM));
		$this->appendElement($this->options);
	}

	public function getOptions() : CustomFormOptions{
		return $this->options;
	}
}
