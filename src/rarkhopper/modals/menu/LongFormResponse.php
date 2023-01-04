<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu;

use rarkhopper\modals\menu\element\LongFormButton;

class LongFormResponse{
	private LongFormButton $element;
	private int $raw;

	public function __construct(LongFormButton $element, int $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	/**
	 * @return LongFormButton クライアント側で押されたボタンのインスタンス
	 */
	public function getPressedElement() : LongFormButton{
		return $this->element;
	}

	/**
	 * @return int サーバーサイドに送られてきた生データ
	 */
	public function getRawResponse() : int{
		return $this->raw;
	}
}
