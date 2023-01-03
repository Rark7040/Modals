<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

class CustomFormResponse{
	/** @var array<string, string|int|bool> */
	private array $response;
	/** @var array<int, string|int|bool>  */
	private array $raw;

	/**
	 * @param array<string, string|int|bool> $response
	 * @param array<string|int|bool>         $raw
	 */
	public function __construct(array $response, array $raw){
		$this->response = $response;
		$this->raw = $raw;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function getResponse() : array{
		return $this->response;
	}

	/**
	 * @return array<int, mixed>
	 */
	public function getRawResponse() : array{
		return $this->raw;
	}
}
