<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\FormElements;
use rarkhopper\modals\utils\FormType;

/**
 * モーダルフォームのスタイルを定義したクラス
 * Jsonに適用される値は{@see CustomFormElements::__construct}の時点で固定され不変です
 */
class CustomFormElements extends FormElements{
	private CustomFormOptions $options;

	public function __construct(string $title, CustomFormOptions $options){
		parent::__construct($title);
		$this->options = $options;
		$this->initElement();
	}

	private function initElement() : void{
		$this->appendElement(new FormType(FormType::TYPE_CUSTOM))
			->appendElement($this->options);
	}

	public function getOptions() : CustomFormOptions{
		return $this->options;
	}
}
