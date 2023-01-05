<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use function is_bool;
use function is_float;
use function is_int;
use function is_string;

class CustomFormResponse{
	/** @var array<string, string|int|float|bool|null> */
	private array $response;
	/** @var array<int> */
	private array $intResponses = [];
	/** @var array<string> */
	private array $stringResponses = [];
	/** @var array<bool> */
	private array $boolResponses = [];
	/** @var array<int, string|int|float|bool|null>  */
	private array $raw;

	/**
	 * @param array<string, string|int|float|bool|null> $response
	 * @param array<int, string|int|float|bool|null>    $raw
	 */
	public function __construct(array $response, array $raw){
		$this->response = $response;
		$this->raw = $raw;
		$this->allocateResponse($response);
	}

	/**
	 * @param array<string, string|int|float|bool|null> $response
	 */
	private function allocateResponse(array $response) : void{
		foreach($response as $name => $res){
			if(is_int($res) || is_float($res)){
				$this->intResponses[$name] = (int) $res;

			}elseif(is_string($res)){
				$this->stringResponses[$name] = $res;

			}elseif(is_bool($res)){
				$this->boolResponses[$name] = $res;
			}
		}
	}

	/**
	 * @return array<string, mixed>
	 */
	public function getAllResponse() : array{
		return $this->response;
	}

	/**
	 * @return String[]
	 */
	public function getStringResponses() : array{
		return $this->stringResponses;
	}

	/**
	 * @return int[]
	 */
	public function getIntResponses() : array{
		return $this->intResponses;
	}

	/**
	 * @return bool[]
	 */
	public function getBoolResponses() : array{
		return $this->boolResponses;
	}

	/**
	 * @return array<int, mixed>
	 */
	public function getRawResponse() : array{
		return $this->raw;
	}
}
