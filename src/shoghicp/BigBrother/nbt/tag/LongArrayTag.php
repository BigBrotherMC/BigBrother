<?php
/**
 *  ______  __         ______               __    __
 * |   __ \|__|.-----.|   __ \.----..-----.|  |_ |  |--..-----..----.
 * |   __ <|  ||  _  ||   __ <|   _||  _  ||   _||     ||  -__||   _|
 * |______/|__||___  ||______/|__|  |_____||____||__|__||_____||__|
 *             |_____|
 *
 * BigBrother plugin for PocketMine-MP
 * Copyright (C) 2014-2015 shoghicp <https://github.com/shoghicp/BigBrother>
 * Copyright (C) 2016- BigBrotherTeam
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author BigBrotherTeam
 * @link   https://github.com/BigBrotherTeam/BigBrother
 *
 */

declare(strict_types=1);

namespace shoghicp\BigBrother\nbt\tag;

use pocketmine\nbt\NBTStream;
use pocketmine\nbt\ReaderTracker;
use pocketmine\nbt\tag\NamedTag;
use function assert;
use function get_class;
use function implode;
use function is_int;
use function str_repeat;

class LongArrayTag extends NamedTag {
	/** @var int[] */
	private $value;

	/**
	 * @param string $name
	 * @param int[] $value
	 */
	public function __construct(string $name = "", array $value = []) {
		parent::__construct($name);

		assert((function() use(&$value) : bool {
			foreach ($value as $v) {
				if (!is_int($v)) {
					return false;
				}
			}

			return true;
		})());

		$this->value = $value;
	}

	public function getType() : int {
		return 12; //LongArray
	}

	public function read(NBTStream $nbt, ReaderTracker $tracker) : void {
		//Not implemented
	}

	public function write(NBTStream $nbt) : void {
		//Not implemented
	}

	public function toString(int $indentation = 0) : string {
		return str_repeat("  ", $indentation) . get_class($this) . ": " . ($this->__name !== "" ? "name='$this->__name', " : "") . "value=[" . implode(",", $this->value) . "]";
	}

	/**
	 * @return int[]
	 */
	public function getValue() : array {
		return $this->value;
	}
}
