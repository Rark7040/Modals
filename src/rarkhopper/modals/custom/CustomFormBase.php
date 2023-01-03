<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use pocketmine\player\Player;
use rarkhopper\modals\FormBase;
use rarkhopper\modals\long\LongFormElements;
use rarkhopper\modals\long\LongFormResponse;
use function is_int;

abstract class CustomFormBase extends FormBase{
	private LongFormElements $elements;

	abstract protected function onSubmit(Player $player, LongFormResponse $response) : void;

	public function __construct(LongFormElements $elements){
		$this->elements = $elements;
	}

	protected function getElements() : LongFormElements{
		return $this->elements;
	}

	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!is_int($rawResponse)) return;
		$response = $this->createResponse($rawResponse);

		if($response === null) return;
		$this->onSubmit($player, $response);
	}

	private function createResponse(int $rawResponse) : ?LongFormResponse{
		$pressedElement = $this->getElements()->getButtons()->getAll()[$rawResponse] ?? null;

		if($pressedElement === null) return null;
		return new LongFormResponse($pressedElement, $rawResponse);
	}
}
