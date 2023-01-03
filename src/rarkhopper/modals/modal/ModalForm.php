<?php

declare(strict_types=1);

namespace rarkhopper\modals\modal;

use pocketmine\player\Player;
use rarkhopper\modals\ClosureForm;
use rarkhopper\modals\long\LongFormElements;
use rarkhopper\modals\long\ModalFormElements;
use rarkhopper\modals\FormElements;
use rarkhopper\modals\modal\element\ModalFormResponse;
use function is_int;

abstract class ModalForm extends ClosureForm{
	private ModalFormElements $elements;

	abstract protected function onSubmit(Player $player, ModalFormResponse $response) : void;

	public function __construct(ModalFormElements $elements){
		$this->elements = $elements;
	}

	protected function getElements() : ModalFormElements{
		return $this->elements;
	}

	/**
	 * @inheritdoc
	 */
	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		$response = $this->createResponse($rawResponse);

		if($response === null) return;
		$this->onSubmit($player, $response);
	}

	/**
	 * @param int|bool|array<int, int|string> $rawResponse
	 */
	private function createResponse(int|bool|array $rawResponse) : ?ModalFormResponse{
		if(!is_bool($rawResponse)) return null;
		$element = $this->getElements();
		$pressedElement = $rawResponse ? $element->getTrueButton() : $element->getFalseButton();
		return new ModalFormResponse($pressedElement, $rawResponse);
	}
}
