<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu;

use rarkhopper\modals\menu\element\MenuFormButton;

class MenuFormResponse{
	private MenuFormButton $element;
	private int $raw;

	public function __construct(MenuFormButton $element, int $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	/**
	 * @return MenuFormButton クライアント側で押されたボタンのインスタンス
	 */
	public function getPressedElement() : MenuFormButton{
		return $this->element;
	}

	/**
	 * @return int サーバーサイドに送られてきた生データ
	 */
	public function getRawResponse() : int{
		return $this->raw;
	}
}
