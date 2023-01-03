<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use Closure;
use pocketmine\player\Player;
use rarkhopper\modals\ClosureForm;
use function is_array;

class CustomForm extends ClosureForm{
	/**
	 * @param Closure $handler signature is function(Player $player, array<int, int|string> $response)
	 * @return $this
	 */
	public function setHandler(Closure $handler) : self {
		return parent::setHandler($handler);
	}

	/**
	 * @inheritdoc
	 */
	protected function internalHandlingResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!$this->validateResponse($rawResponse) || $this->handler === null) return;
		($this->handler)($player, (array) $rawResponse);
	}

	private function validateResponse(mixed $response) : bool{
		return is_array($response);
	}
}
