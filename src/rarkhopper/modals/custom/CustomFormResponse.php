<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use function is_bool;
use function is_int;
use function is_string;

class CustomFormResponse{
	/** @var array<string, string|int|bool> */
	private array $response;
	/** @var array<int> */
	private array $intResponses = [];
	/** @var array<string> */
	private array $stringResponses = [];
	/** @var array<bool> */
	private array $boolResponses = [];
	/** @var array<int, string|int|bool>  */
	private array $raw;

	/**
	 * @param array<string, string|int|bool> $response
	 * @param array<string|int|bool>         $raw
	 */
	public function __construct(array $response, array $raw){
		$this->response = $response;
		$this->raw = $raw;
		$this->allocateResponse($response);
	}

	/**
	 * @param array<string, string|int|bool> $response
	 */
	private function allocateResponse(array $response) : void{
		foreach($response as $name => $res){
			if(is_int($res)){
				$this->intResponses[] = $res;

			}elseif(is_string($res)){
				$this->stringResponses[] = $res;

			}elseif(is_bool($res)){
				$this->boolResponses[] = $res;

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
