<?php

declare(strict_types=1);

namespace rarkhopper\modals\utils;

use rarkhopper\modals\ISingleElement;
use rarkhopper\modals\PrimaryElement;

class FormTitle extends PrimaryElement implements ISingleElement{
	private string $title;

	public function __construct(string $type){
		$this->title = $type;
		parent::__construct('title');
	}

	public function getParameter() : string|int|bool{
		return $this->title;
	}
}
