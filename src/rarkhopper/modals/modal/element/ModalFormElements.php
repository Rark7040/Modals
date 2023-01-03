<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\utils\FormLabel;
use rarkhopper\modals\utils\FormType;

class ModalFormElements extends FormElements{
	private string $label;
	private ModalFormButton $trueButton;
	private ModalFormButton $falseButton;

	public function __construct(string $title, string $label, ModalFormButton $trueButton, ModalFormButton $falseButton){
		parent::__construct($title);
		$trueButton->position = true;
		$falseButton->position = false;
		$this->label = $label;
		$this->trueButton = $trueButton;
		$this->falseButton = $falseButton;
		$this->initElement();
	}

	private function initElement() : void{
		$this->appendElement(new FormLabel($this->label));
		$this->appendElement(new FormType(FormType::TYPE_MODAL));
	}

	public function getLabel() : string{
		return $this->label;
	}

	public function getTrueButton() : ModalFormButton{
		return $this->trueButton;
	}

	public function getFalseButton() : ModalFormButton{
		return $this->falseButton;
	}
}
