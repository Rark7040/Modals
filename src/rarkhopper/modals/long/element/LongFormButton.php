<?php

declare(strict_types=1);

namespace rarkhopper\modals\long\element;

use rarkhopper\modals\ElementBase;

class LongFormButton extends ElementBase{
	private string $txt;
	private ?ButtonImage $img;

	public function __construct(string $txt, ?ButtonImage $img = null){
		$this->txt = $txt;
		$this->img = $img;
		$this->putElement();
	}

	public function getText() : string{
		return $this->txt;
	}

	public function getImage() : ?ButtonImage{
		return $this->img;
	}

	private function putElement() : void{
		$this->element['text'] = $this->txt;

		if($this->img === null) return;
		$this->element['image'] = $this->img->getElement();
	}
}
