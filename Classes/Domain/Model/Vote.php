<?php
namespace webfox\T3rating\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Dirk Wenzel <wenzel@webfox01.de>, Agentur Webfox
 *  Michael Kasten <kasten@webfox01.de>, Agentur Webfox
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Vote extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Selected option
	 *
	 * @var \webfox\T3rating\Domain\Model\Option
	 */
	protected $selection;

	/**
	 * Frontend User
	 *
	 * @var \webfox\T3rating\Domain\Model\User
	 * @lazy
	 */
	protected $user;

	/**
	 * voting
	 *
	 * @var \webfox\T3rating\Domain\Model\Voting
	 */
	protected $voting;

	/**
	 * Returns the voting
	 *
	 * @return \webfox\T3rating\Domain\Model\Voting $voting
	 */
	public function getVoting() {
		return $this->voting;
	}

	/**
	 * Sets the voting
	 *
	 * @param \webfox\T3rating\Domain\Model\Voting $voting
	 * @return void
	 */
	public function setVoting(\webfox\T3rating\Domain\Model\Voting $voting) {
		$this->voting = $voting;
	}

	/**
	 * Returns the selection
	 *
	 * @return \webfox\T3rating\Domain\Model\Option selection
	 */
	public function getSelection() {
		return $this->selection;
	}

	/**
	 * Sets the selection
	 *
	 * @param \webfox\T3rating\Domain\Model\Option $selection
	 * @return \webfox\T3rating\Domain\Model\Option selection
	 */
	public function setSelection(\webfox\T3rating\Domain\Model\Option $selection) {
		$this->selection = $selection;
	}

	/**
	 * Returns the user
	 *
	 * @return \webfox\T3rating\Domain\Model\User user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Sets the user
	 *
	 * @param \webfox\T3rating\Domain\Model\User $user
	 * @return \webfox\T3rating\Domain\Model\User user
	 */
	public function setUser(\webfox\T3rating\Domain\Model\User $user) {
		$this->user = $user;
	}

}
?>