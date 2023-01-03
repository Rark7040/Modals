<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use pocketmine\form\Form;
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
	 */
	abstract protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void;
	abstract protected function getElements() : FormElements;

	protected function onNullHandle(Player $player) : void{
		//NOOP
	}

	public function send(Player $player) : void{
		$refClass = new ReflectionClass($player);
		$refProp = $refClass->getProperty('forms');
		$refProp->setAccessible(true);
		$receivedForms = $refProp->getValue($player);

		if(!is_array($receivedForms) || count($receivedForms) > 0) return;
		$player->sendForm($this);
	}

	/**
	 * @param mixed $data
	 */
	public function handleResponse(Player $player, $data) : void{
		if($data === null){
			$this->onNullHandle($player);
			return;
		}

		if(!is_int($data) && !is_array($data) && !is_bool($data)) return;
		$this->internalHandleResponse($player, $data);
	}

	public function jsonSerialize(){
		return $this->getElements()->jsonSerialize();
	}
}
