<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use pocketmine\form\FormValidationException;
use pocketmine\player\Player;
use rarkhopper\modals\custom\element\CustomFormElements;
use rarkhopper\modals\custom\element\DropDown;
use rarkhopper\modals\custom\element\ICustomFormOption;
use rarkhopper\modals\custom\element\Input;
use rarkhopper\modals\custom\element\Label;
use rarkhopper\modals\custom\element\Slider;
use rarkhopper\modals\custom\element\StepSlider;
use rarkhopper\modals\custom\element\Toggle;
use rarkhopper\modals\FormBase;
use function gettype;
use function is_array;
use function is_bool;
use function is_float;
use function is_int;
use function is_string;

abstract class CustomFormBase extends FormBase{
	private CustomFormElements $elements;

	/**
	 * @throws FormValidationException
	 * フォームのボタンが押された時の処理
	 */
	abstract protected function onSubmit(Player $player, CustomFormResponse $response) : void;

	public function __construct(CustomFormElements $elements){
		$this->elements = $elements;
	}

	protected function getElements() : CustomFormElements{
		return $this->elements;
	}

	/**
	 * @throws FormValidationException
	 */
	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!is_array($rawResponse)) throw new FormValidationException('invalid response. expected but array, given ' . gettype($rawResponse));
		$this->onSubmit($player, $this->createResponse($rawResponse));
	}

	/**
	 * @param array<int, scalar|null> $rawResponse
	 * @throws FormValidationException
	 */
	private function createResponse(array $rawResponse) : CustomFormResponse{
		$responses = [];
		$options = $this->getElements()->getOptions()->getAll();

		foreach($rawResponse as $idx => $raw){
			$option = $options[$idx] ?? null;

			if($option === null) throw new FormValidationException('invalid index ' . $idx);;
			if(!$this->validateResponse($option, $raw)) throw new FormValidationException('invalid response ' . gettype($raw) . $raw);
			$responses[$option->getName()] = $raw;
		}
		return new CustomFormResponse($responses, $rawResponse);
	}

	private function validateResponse(ICustomFormOption $option, mixed $rawResponse) : bool{
		return match(true){
			$option instanceof DropDown => is_int($rawResponse) && isset($option->getOptions()[$rawResponse]),
			$option instanceof Input => is_string($rawResponse),
			$option instanceof Label => $rawResponse === null,
			$option instanceof Slider => ($rawResponse === 0 || is_float($rawResponse)) && ($option->getMin() <= $rawResponse && $rawResponse <= $option->getMax()),
			$option instanceof StepSlider => is_int($rawResponse) && isset($option->getSteps()[$rawResponse]),
			$option instanceof Toggle => is_bool($rawResponse),
			default => false
		};
	}
}
