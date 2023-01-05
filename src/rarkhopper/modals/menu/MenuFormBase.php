<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu;

use pocketmine\form\FormValidationException;
use pocketmine\player\Player;
use rarkhopper\modals\FormBase;
use rarkhopper\modals\menu\element\MenuFormElements;
use function gettype;
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

	/**
	 * @throws FormValidationException
	 */
	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!is_int($rawResponse)) throw new FormValidationException('invalid response. expected int but given ' . gettype($rawResponse));
		$this->onSubmit($player, $this->createResponse($rawResponse));
	}

	/**
	 * @throws FormValidationException
	 */
	private function createResponse(int $rawResponse) : MenuFormResponse{
		$pressedElement = $this->getElements()->getButtons()->getAllButtons()[$rawResponse] ?? null;

		if($pressedElement === null) throw new FormValidationException('invalid response ' . $rawResponse);
		return new MenuFormResponse($pressedElement, $rawResponse);
	}
}
