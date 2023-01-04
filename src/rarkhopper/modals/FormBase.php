<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use Exception;
use pocketmine\form\Form;
use pocketmine\form\FormValidationException;
use pocketmine\player\Player;
use ReflectionClass;
use function count;
use function is_array;
use function is_bool;
use function is_int;

/**
 * @internal
 */
abstract class FormBase implements Form{
	/**
	 * @param int|bool|array<int, int|string|bool> $rawResponse
	 * @throws FormValidationException
	 */
	abstract protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void;
	abstract protected function getElements() : FormElements;

	/**
	 * @return void
	 * フォームのボタンを何も押さずに閉じた時の処理
	 */
	protected function handleClosed(Player $player) : void{
		//NOOP
	}

	/**
	 * @return void
	 * フォームを重複しないように送信します
	 * フォームチェーン用に2つまで重複するケースが考慮されます
	 */
	public function send(Player $player) : void{
		$refClass = new ReflectionClass($player);
		$refProp = $refClass->getProperty('forms');
		$refProp->setAccessible(true);
		$receivedForms = $refProp->getValue($player);

		if(!is_array($receivedForms) || count($receivedForms) > 1) return;
		$player->sendForm($this);
	}

	/**
	 * @param mixed $data
	 * @throws FormValidationException
	 */
	public function handleResponse(Player $player, $data) : void{
		if($data === null){
			$this->handleClosed($player);
			return;
		}

		if(!is_int($data) && !is_array($data) && !is_bool($data)) throw new FormValidationException('received invalid response data');
		$this->internalHandleResponse($player, $data);
	}

	public function jsonSerialize(){
		return $this->getElements()->jsonSerialize();
	}
}
