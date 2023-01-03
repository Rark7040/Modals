<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

use pocketmine\player\Player;
use rarkhopper\modals\ClosureForm;
use function is_int;

abstract class LongForm extends ClosureForm{
	private LongFormElements $elements;

	abstract protected function onSubmit(Player $player, LongFormResponse $response) : void;

	public function __construct(LongFormElements $elements){
		$this->elements = $elements;
	}

	/**
	 * @inheritdoc
	 */
	protected function internalHandlingResponse(Player $player, int|bool|array $rawResponse) : void{
		$response = $this->createResponse($rawResponse);

		if($response === null) return;
		$this->onSubmit($player, $response);
	}

	/**
	 * @param int|bool|array<int, int|string> $rawResponse
	 */
	private function createResponse(int|bool|array $rawResponse) : ?LongFormResponse{
		if(!is_int($rawResponse)) return null;
		$pressedElement = $this->elements->getElements()[$rawResponse] ?? null;

		if($pressedElement === null) return null;
		return new LongFormResponse($pressedElement, $rawResponse);
	}
}
