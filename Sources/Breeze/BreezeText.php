<?php

/**
 * BreezeSettings
 *
 * The purpose of this file is to extract the text strings from the language files
 * @package Breeze mod
 * @version 1.0 Beta 3
 * @author Jessica Gonz�lez <missallsunday@simplemachines.org>
 * @copyright Copyright (c) 2012, Jessica Gonz�lez
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

/*
 * Version: MPL 1.1
 *
 * The contents of this file are subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * The Original Code is http://missallsunday.com code.
 *
 * The Initial Developer of the Original Code is
 * Jessica Gonz�lez.
 * Portions created by the Initial Developer are Copyright (c) 2012
 * the Initial Developer. All Rights Reserved.
 *
 * Contributor(s):
 *
 */

if (!defined('SMF'))
	die('Hacking attempt...');

class BreezeText
{
	private static $_instance;
	protected $_text = array();
	private $_pattern = 'Breeze_';
	private function __construct(){}

	public static function getInstance()
	{
		if (!self::$_instance)
			self::$_instance = new self();

		return self::$_instance;
	}

	public function extract()
	{
		global $txt;

		loadLanguage(Breeze::$name);

		$this->_text = $txt;
	}

	/**
	 * Get the requested array element.
	 *
	 * @param string the key name for the requested element
	 * @access public
	 * @return mixed
	 */
	public function getText($var)
	{
		if (empty($var))
			return false;

		if (empty($this->_text))
			$this->extract();

		if (!empty($this->_text[$this->_pattern . $var]))
			return $this->_text[$this->_pattern . $var];

		else
			return false;
	}
}