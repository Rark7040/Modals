<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom;

use pocketmine\form\FormValidationException;
use pocketmine\player\Player;
use rarkhopper\modals\custom\element\CustomFormElements;
use rarkhopper\modals\custom\element\DropDown;
use rarkhopper\modals\custom\element\ICustomFormOption;
use rarkhopper\modals\custom\element\Input;
use rarkhopper\modals\custom\element\Slider;
use rarkhopper\modals\custom\element\StepSlider;
use rarkhopper\modals\custom\element\Toggle;
use rarkhopper\modals\FormBase;
use function is_array;
use function is_bool;
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

	protected function internalHandleResponse(Player $player, int|bool|array $rawResponse) : void{
		if(!is_array($rawResponse)) return;
		$response = $this->createResponse($rawResponse);

		if($response === null) return;
		$this->onSubmit($player, $response);
	}

	/**
	 * @param array<int, int|string|bool> $rawResponse
	 */
	private function createResponse(array $rawResponse) : ?CustomFormResponse{
		$responses = [];
		$options = $this->getElements()->getOptions()->getAll();

		foreach($rawResponse as $idx => $raw){
			$option = $options[$idx] ?? null;

			if($option === null) return null;
			if(!$this->validateResponse($option, $raw)) return null;
			$responses[$option->getName()] = $raw;
		}
		return new CustomFormResponse($responses, $rawResponse);
	}

	private function validateResponse(ICustomFormOption $option, mixed $rawResponse) : bool{
		return match(true){
			$option instanceof DropDown => is_int($rawResponse) && isset($option->getOptions()[$rawResponse]),
			$option instanceof Input => is_string($rawResponse),
			$option instanceof Slider => is_int($rawResponse) && ($option->getMin() <= $rawResponse && $rawResponse <= $option->getMax()),
			$option instanceof StepSlider => is_int($rawResponse) && isset($option->getSteps()[$rawResponse]),
			$option instanceof Toggle => is_bool($rawResponse),
			default => false
		};
	}
}
