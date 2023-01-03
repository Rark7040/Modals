<?php

declare(strict_types=1);

namespace rarkhopper\modals\long\element;

use InvalidArgumentException;

class ButtonImage{
	public const TYPE_URL = 'url';
	public const TYPE_PATH = 'path';

	private string $type;
	private string $source;

	/**
	 * @param string $type {@see ButtonImage::TYPE_URL, ButtonImage::TYPE_PATH}
	 */
	public function __construct(string $type, string $source){
		if($type !== self::TYPE_URL && $type !== self::TYPE_PATH) throw new InvalidArgumentException('invalid type ' . $type);
		$this->type = $type;
		$this->source = $source;
	}

	public function getSourceType() : string{
		return $this->type;
	}

	public function getDataSource() : string{
		return $this->source;
	}

	/**
	 * @return array<string, string>
	 */
	public function toArray() : array{
		return [
			'type' => $this->type,
			'data' => $this->source
		];
	}
}
