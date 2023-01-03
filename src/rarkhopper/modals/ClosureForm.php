<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use InvalidArgumentException;
use pocketmine\form\Form;
use pocketmine\player\Player;
use function is_array;
use function is_bool;
use function is_int;

/**
 * @internal
 */
abstract class ClosureForm implements Form{
	/**
	 * @param int|bool|array<int, int|string> $rawResponse
	 */
	abstract protected function internalHandlingResponse(Player $player, int|bool|array $rawResponse) : void;
	abstract protected function getModalElements() : ModalElements;

	protected function onNullHandling(Player $player) : void{
		//NOOP
	}

	/**
	 * @param mixed $data
	 * @throws InvalidArgumentException
	 */
	public function handleResponse(Player $player, $data) : void{
		if($data === null){
			$this->onNullHandling($player);
			return;
		}

		if(!is_int($data) && !is_array($data) && !is_bool($data)) return;
		$this->internalHandlingResponse($player, $data);
	}

	public function jsonSerialize(){
		return $this->getModalElements()->jsonSerialize();
	}
}
