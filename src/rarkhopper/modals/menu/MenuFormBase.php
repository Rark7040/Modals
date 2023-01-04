<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu;

use pocketmine\form\FormValidationException;
use pocketmine\player\Player;
use rarkhopper\modals\FormBase;
use rarkhopper\modals\menu\element\MenuFormElements;
use function is_int;

abstract class MenuFormBase extends FormBase{
	private MenuFormElements $elements;

	/**
	 * @throws FormValidationException
	 * フォームのボタンが押された時の処理
	 */
	abstract protected function onSubmit(Player $player, MenuFormResponse $response) : void;

	public function __construct(MenuFormElements $elements){
		$this->elements = $elements;
	}

	protected function getElements() : MenuFormElements{
		return $this->elements;
	}

	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!is_int($rawResponse)) return;
		$response = $this->createResponse($rawResponse);

		if($response === null) return;
		$this->onSubmit($player, $response);
	}

	private function createResponse(int $rawResponse) : ?MenuFormResponse{
		$pressedElement = $this->getElements()->getButtons()->getAllButtons()[$rawResponse] ?? null;

		if($pressedElement === null) return null;
		return new MenuFormResponse($pressedElement, $rawResponse);
	}
}
