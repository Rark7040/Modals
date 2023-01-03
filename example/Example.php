<?php

declare(strict_types=1);

use pocketmine\player\Player;
use rarkhopper\modals\custom\CustomFormBase;
use rarkhopper\modals\custom\CustomFormResponse;
use rarkhopper\modals\custom\element\CustomFormElements;
use rarkhopper\modals\custom\element\CustomFormOptions;
use rarkhopper\modals\custom\element\Slider;
use rarkhopper\modals\long\element\ButtonImage;
use rarkhopper\modals\long\element\ButtonList;
use rarkhopper\modals\long\element\LongFormButton;
use rarkhopper\modals\long\FalseButton;
use rarkhopper\modals\long\LongFormBase;
use rarkhopper\modals\long\LongFormElements;
use rarkhopper\modals\long\LongFormResponse;
use rarkhopper\modals\long\ModalFormButton;
use rarkhopper\modals\long\ModalFormElements;
use rarkhopper\modals\long\TrueButton;
use rarkhopper\modals\modal\element\ModalFormResponse;
use rarkhopper\modals\modal\ModalFormBase;

function example(Player $player) : void{
	$form = new ExampleLongForm();
	$form->send($player);
}

class ExampleLongForm extends LongFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : LongFormElements{
		$buttons = new ButtonList();
		$buttons->add(new LongFormButton('hoge', new ButtonImage(ButtonImage::TYPE_URL, 'https://img/hoge')));
		$buttons->add(new LongFormButton('aho'));
		$buttons->add(new LongFormButton('rrrrrrr'));
		$buttons->add(new LongFormButton('uoooo'));
		return new LongFormElements('TestForm', 'ボタンを選んでね！', $buttons);
	}

	protected function onSubmit(Player $player, LongFormResponse $response) : void{
		$button = $response->getPressedElement(); //LongFormButton{txt: aho, img: null}
		$buttonName = $response->getPressedElement()->getText(); //aho
		$buttonPosition = $response->getRawResponse(); //1
	}
}

class ExampleModalForm extends ModalFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : ModalFormElements{
		return new ModalFormElements(
			'TestForm',
			'あなたはバッタ？',
			new ModalFormButton('yes'),
			new ModalFormButton('no')
		);
	}

	protected function onSubmit(Player $player, ModalFormResponse $response) : void{
		$button = $response->getPressedElement(); //TrueButton{txt: yes}
		$buttonName = $response->getPressedElement()->getText(); //yes
		$buttonPosition = $response->getRawResponse(); //true
	}
}

class ExampleCustomForm extends CustomFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : CustomFormElements{
		$options = new CustomFormOptions();
		$options->add(new Slider('amount', 'アイテムの数を入力', 0, 0, 100));
		return new CustomFormElements('TestForm', $options);
	}

	protected function onSubmit(Player $player, CustomFormResponse $response) : void{
		$amount = $response->getResponse()['amount'];
	}
}
