<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu\element;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\utils\FormLabel;
use rarkhopper\modals\utils\FormType;

/**
 * モーダルフォームのスタイルを定義したクラス
 * Jsonに適用される値は{@see MenuFormElements::__construct}の時点で固定され不変です
 */
class MenuFormElements extends FormElements{
	private ButtonList $buttons;
	private string $label;

	public function __construct(string $title, string $label, ButtonList $buttons){
		parent::__construct($title);
		$this->label = $label;
		$this->buttons = $buttons;
		$this->initElement();
	}

	private function initElement() : void{
		$this->appendElement(new FormLabel($this->label))
			->appendElement(new FormType(FormType::TYPE_LONG))
			->appendElement($this->buttons);
	}

	public function getLabel() : string{
		return $this->label;
	}

	public function getButtons() : ButtonList{
		return $this->buttons;
	}
}
