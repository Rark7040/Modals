<?php

declare(strict_types=1);

namespace rarkhopper\modals;

interface ISingleElement{
	public function getName() : string;
	public function getParameter() : string|int|bool;
}
