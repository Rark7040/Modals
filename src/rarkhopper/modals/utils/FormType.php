<?php

declare(strict_types=1);

namespace rarkhopper\modals\utils;

use InvalidArgumentException;
use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

class FormType extends NamedElement implements IPrimaryElement{
	public const TYPE_LONG = 'form';
	public const TYPE_MODAL = 'modal';
	public const TYPE_CUSTOM = 'custom';

	private string $type;

	/**
	 * @param string $type {@see FormType::TYPE_LONG, FormType::TYPE_MODAL, FormType::TYPE_CUSTOM}
	 */
	public function __construct(string $type){
		if($type !== self::TYPE_LONG && $type !== self::TYPE_MODAL && $type !== self::TYPE_CUSTOM) throw new InvalidArgumentException('invalid type ' . $type);
		$this->type = $type;
		parent::__construct('type');
	}

	public function getElement() : array|string|int|bool{
		return $this->type;
	}
}
