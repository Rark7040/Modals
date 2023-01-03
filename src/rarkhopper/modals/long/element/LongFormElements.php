<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\long\element\ButtonList;
use rarkhopper\modals\utils\FormLabel;
use rarkhopper\modals\utils\FormType;

class LongFormElements extends FormElements{
	private ButtonList $buttons;
	private string $label;

	public function __construct(string $title, string $label, ButtonList $buttons){
		parent::__construct($title);
		$this->label = $label;
		$this->buttons = $buttons;
		$this->initElement();
	}

	private function initElement() : void{
		$this->appendElement(new FormLabel($this->label));
		$this->appendElement(new FormType(FormType::TYPE_LONG));
		$this->appendElement($this->buttons);
	}

	public function getLabel() : string{
		return $this->label;
	}

	public function getButtons() : ButtonList{
		return $this->buttons;
	}
}
