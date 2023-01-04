<?php

declare(strict_types=1);

namespace rarkhopper\modals;

interface IPrimaryElement{
	/**
	 * @return string Json化したときのキーになるワード (type, content, ...)
	 */
	public function getName() : string;
	/**
	 * @return string|int|bool|array<string, mixed>
	 */
	public function getElement() : array|string|int|bool;
}
