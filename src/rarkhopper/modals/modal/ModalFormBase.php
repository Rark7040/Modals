<?php

declare(strict_types=1);

namespace rarkhopper\modals\modal;

use pocketmine\form\FormValidationException;
use pocketmine\player\Player;
use rarkhopper\modals\FormBase;
use rarkhopper\modals\modal\element\ModalFormElements;
use rarkhopper\modals\modal\element\ModalFormResponse;
use function is_bool;

abstract class ModalFormBase extends FormBase{
	private ModalFormElements $elements;

	/**
	 * @throws FormValidationException
	 * フォームのボタンが押された時の処理
	 */
	abstract protected function onSubmit(Player $player, ModalFormResponse $response) : void;

	public function __construct(ModalFormElements $elements){
		$this->elements = $elements;
	}

	protected function getElements() : ModalFormElements{
		return $this->elements;
	}

	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!is_bool($rawResponse)) return;
		$response = $this->createResponse($rawResponse);
		$this->onSubmit($player, $response);
	}

	private function createResponse(bool $rawResponse) : ModalFormResponse{
		$element = $this->getElements();
		$pressedElement = $rawResponse ? $element->getTrueButton() : $element->getFalseButton();
		return new ModalFormResponse($pressedElement, $rawResponse);
	}
}
