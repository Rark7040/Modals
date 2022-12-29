<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use Closure;
use pocketmine\player\Player;
use function is_int;

class ListForm extends ClosureForm{
	/**
	 * @param Closure $handler signature is `function(Player $player, int $response)`
	 * @return $this
	 */
	public function setHandler(Closure $handler) : self {
		return parent::setHandler($handler);
	}

	/**
	 * @inheritdoc
	 */
	protected function onSubmit(Player $player, int|bool|array $response) : void{
		if(!$this->validateResponse($response)) return;
		$handler = $this->getHandler();

		if($handler === null) return;
		$handler($player, (int) $response);
	}

	private function validateResponse(mixed $response) : bool{
		return is_int($response);
	}
}
