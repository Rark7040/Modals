<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\utils\FormLabel;
use rarkhopper\modals\utils\FormType;

class ModalFormElements extends FormElements{
	private string $label;
	private TrueButton $trueButton;
	private FalseButton $falseButton;

	public function __construct(string $title, string $label, TrueButton $trueButton, FalseButton $falseButton){
		parent::__construct($title);
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

	public function getTrueButton() : TrueButton{
		return $this->trueButton;
	}

	public function getFalseButton() : FalseButton{
		return $this->falseButton;
	}
}
