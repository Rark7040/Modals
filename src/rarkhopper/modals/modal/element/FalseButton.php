<?php

declare(strict_types=1);

namespace rarkhopper\modals\long;

class FalseButton extends ModalFormButton{
	public function __construct(string $txt){
		parent::__construct('button2', $txt);
	}
}
