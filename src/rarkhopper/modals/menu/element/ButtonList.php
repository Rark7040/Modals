<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu\element;

use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

class ButtonList extends NamedElement implements IPrimaryElement{
	/** @var array<LongFormButton> */
	private array $buttons = [];

	public function __construct(){
		parent::__construct('buttons');
	}

	/**
	 * @return array<LongFormButton>
	 */
	public function getAllButtons() : array{
		return $this->buttons;
	}

	/**
	 * フォームにボタンを追加します
	 *
	 * @param LongFormButton $button
	 *
	 * @return ButtonList
	 */
	public function append(LongFormButton $button) : ButtonList{
		$this->buttons[] = $button;
		$this->element[] = $button->getElement();
		return $this;
	}
}
