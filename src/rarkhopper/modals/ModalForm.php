<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use Closure;
use pocketmine\player\Player;
use function is_bool;

class ModalForm extends ClosureForm{
	/**
	 * @param Closure $handler signature is function(Player $player, bool $response)
	 * @return $this
	 */
	public function setHandler(Closure $handler) : self {
		return parent::setHandler($handler);
	}

	/**
	 * @inheritdoc
	 */
	protected function onSubmit(Player $player, int|bool|array $response) : void{
		if(!$this->validateResponse($response) || $this->handler === null) return;
		($this->handler)($player, (bool) $response);
	}

	private function validateResponse(mixed $response) : bool{
		return is_bool($response);
	}
}
