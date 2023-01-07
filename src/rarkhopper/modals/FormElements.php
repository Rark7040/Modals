<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use JsonSerializable;
use rarkhopper\modals\utils\FormTitle;

/**
 * @internal
 */
abstract class FormElements{
	protected string $title;
	/** @var array<IPrimaryElement> */
	protected array $elements = [];

	public function __construct(string $title){
		$this->title = $title;
		$this->appendElement(new FormTitle($title));
	}

	/**
	 * @return string フォームのタイトルテキスト
	 */
	public function getTitle() : string{
		return $this->title;
	}

	public function appendElement(IPrimaryElement $element) : FormElements{
		$this->elements[] = $element;
		return $this;
	}

	/**
	 * @return IPrimaryElement[]
	 */
	public function getElements() : array{
		return $this->elements;
	}

	/**
	 * @return array<string, mixed> Minecraftのフォームスタイルが定義されているJsonに変換可能な配列
	 */
	public function toArray() : array{
		$jsonArr = [];

		foreach($this->elements as $element){
			$jsonArr[$element->getName()] = $element->getElement();
		}
		return $jsonArr;
	}
}
