<?php

declare(strict_types=1);

use pocketmine\player\Player;
use rarkhopper\modals\custom\CustomFormBase;
use rarkhopper\modals\custom\CustomFormResponse;
use rarkhopper\modals\custom\element\CustomFormElements;
use rarkhopper\modals\custom\element\CustomFormOptions;
use rarkhopper\modals\custom\element\Slider;
use rarkhopper\modals\menu\element\ButtonImage;
use rarkhopper\modals\menu\element\ButtonList;
use rarkhopper\modals\menu\element\MenuFormButton;
use rarkhopper\modals\menu\MenuFormBase;
use rarkhopper\modals\menu\MenuFormElements;
use rarkhopper\modals\menu\MenuFormResponse;
use rarkhopper\modals\modal\element\ModalFormButton;
use rarkhopper\modals\modal\element\ModalFormElements;
use rarkhopper\modals\modal\element\ModalFormResponse;
use rarkhopper\modals\modal\ModalFormBase;

function example(Player $player) : void{
	$form = new ExampleMenuForm();
	$form->send($player);
}

class ExampleMenuForm extends MenuFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : MenuFormElements{
		$buttons = (new ButtonList())
			->append(new MenuFormButton('hoge', new ButtonImage(ButtonImage::TYPE_URL, 'https://img/hoge')))
			->append(new MenuFormButton('aho'))
			->append(new MenuFormButton('rrrrrrr'))
			->append(new MenuFormButton('uoooo'));
		return new MenuFormElements('TestForm', 'ボタンを選んでね！', $buttons);
	}

	protected function onSubmit(Player $player, MenuFormResponse $response) : void{
		$button = $response->getPressedElement(); //MenuFormButton{txt: aho, img: null}
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
		$button = $response->getPressedElement(); //ModalFormButton{txt: yes}
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
		$options->append(new Slider('amount', 'アイテムの数を入力', 0, 0, 100));
		return new CustomFormElements('TestForm', $options);
	}

	protected function onSubmit(Player $player, CustomFormResponse $response) : void{
		$amount = $response->getIntResponses()['amount'];
	}
}
