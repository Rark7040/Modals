<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

class CustomFormOptions extends NamedElement implements IPrimaryElement{
	/** @var array<ICustomFormOption> */
	private array $options = [];

	public function __construct(){
		parent::__construct('content');
	}

	/**
	 * @return array<ICustomFormOption>
	 */
	public function getAll() : array{
		return $this->options;
	}

	/**
	 * カスタムフォームにインプットやスライダーなどのオプションを追加します
	 */
	public function append(ICustomFormOption $option) : CustomFormOptions{
		$this->options[] = $option;
		$this->element[] = $option->getElement();
		return $this;
	}
}
