<?php

declare(strict_types=1);

namespace rarkhopper\modals\modal\element;

class ModalFormResponse{
	private ModalFormButton $element;
	private bool $raw;

	public function __construct(ModalFormButton $element, bool $raw){
		$this->element = $element;
		$this->raw = $raw;
	}

	/**
	 * @return ModalFormButton クライアント側で押されたボタンのインスタンス
	 */
	public function getPressedElement() : ModalFormButton{
		return $this->element;
	}

	/**
	 * @return bool サーバーサイドに送られてきた生データ
	 */
	public function getRawResponse() : bool{
		return $this->raw;
	}
}
