<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use Closure;
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
	private ?Closure $handler = null;
	private ?Closure $nullHandler = null;
	/** @var array<string, string|array<string>> */
	private array $formArr;

	/**
	 * @param int|bool|array<int, int|string> $response
	 */
	abstract protected function onSubmit(Player $player, int|bool|array $response) : void;

	/**
	 * @param array<string, string|array<string>> $formArr
	 */
	public function __construct(array $formArr){
		$this->formArr = $formArr;
	}

	/**
	 * @param Closure $handler signature is `function(Player $player, mixed $response)`
	 * @return $this
	 */
	public function setHandler(Closure $handler) : self {
		$this->handler = $handler;
		return $this;
	}

	/**
	 * @param Closure $handler signature is `function(Player $player)`
	 * @return $this
	 */
	public function setNullHandler(Closure $handler) : self {
		$this->nullHandler = $handler;
		return $this;
	}

	protected function getHandler() : ?Closure{
		return $this->handler;
	}

	/**
	 * @param int|bool|array<int, int|string>|null $data
	 * @throws InvalidArgumentException
	 */
	public function handleResponse(Player $player, $data) : void{
		if($data === null && $this->nullHandler !== null){
			($this->nullHandler)($player);
			return;
		}

		if(!is_int($data) && !is_array($data) && !is_bool($data)) throw new InvalidArgumentException('invalid response data');
		$this->onSubmit($player, $data);
	}

	public function jsonSerialize(){
		return $this->formArr;
	}
}
