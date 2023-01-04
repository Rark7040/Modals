<?php

declare(strict_types=1);

namespace rarkhopper\modals\menu\element;

use InvalidArgumentException;
use rarkhopper\modals\ElementBase;

class ButtonImage extends ElementBase{
	public const TYPE_URL = 'url';
	public const TYPE_PATH = 'path';

	private string $type;
	private string $source;

	/**
	 * @param string $type {@see ButtonImage::TYPE_URL, ButtonImage::TYPE_PATH}
	 * @throws InvalidArgumentException
	 */
	public function __construct(string $type, string $source){
		if($type !== self::TYPE_URL && $type !== self::TYPE_PATH) throw new InvalidArgumentException('invalid type ' . $type);
		$this->type = $type;
		$this->source = $source;
		$this->putElement();
	}

	public function getSourceType() : string{
		return $this->type;
	}

	public function getDataSource() : string{
		return $this->source;
	}

	private function putElement() : void{
		$this->element['type'] = $this->type;
		$this->element['data'] = $this->source;
	}
}
