<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use rarkhopper\modals\custom\element\ICustomFormOption;

class CustomFormResponse{
	/** @var array<ICustomFormOption> */
	private array $elements;
	/** @var array<int, string|int|bool>  */
	private array $raw;

	/**
	 * @param array<ICustomFormOption> $elements
	 * @param array<string|int|bool>   $raw
	 */
	public function __construct(array $elements, array $raw){
		$this->elements = $elements;
		$this->raw = $raw;
	}

	/**
	 * @return ICustomFormOption[]
	 */
	public function getAllElements() : array{
		return $this->elements;
	}

	/**
	 * @return array<int, mixed>
	 */
	public function getRawResponse() : array{
		return $this->raw;
	}
}
