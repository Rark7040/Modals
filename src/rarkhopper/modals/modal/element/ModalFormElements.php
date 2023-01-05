<?php

declare(strict_types=1);

namespace rarkhopper\modals\modal\element;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\utils\FormLabel;
use rarkhopper\modals\utils\FormType;

/**
 * モーダルフォームのスタイルを定義したクラス
 * Jsonに適用される値は{@see ModalFormElements::__construct}の時点で固定され不変です
 */
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
		$this->appendElement(new FormLabel($this->label))
			->appendElement(new FormType(FormType::TYPE_MODAL))
			->appendElement($this->trueButton)
			->appendElement($this->falseButton);
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
