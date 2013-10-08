<?php
namespace Webfox\T3rating\Domain\Model;

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
class VoteDemand extends \TYPO3\CMS\Extbase\DomainObjec\AbstractEntity {
	/**
 	* Choice
 	* @var \integer
 	*/
	protected $choice;

	/**
 	* User
	* @var \integer
	*/
	protected $user;

	/**
	* Voting
	* @var \integer
	*/
	protected $voting;

	/**
 	* sets the choice
 	* @param \integer $choice
 	* @return void
 	*/
	public function setChoice($choice) { 
		$this->choice = $choice;
	}
	
	/**
 	* get the choice
 	* @return \integer
 	*/ 
	public function getChoice() {
		return $this->choice;
	}

	/**
 	* sets the user
 	* @param \integer $user
 	* @return void
 	*/
	public function setUser($user) { 
		$this->user = $user;
	}
	
	/**
 	* get the user
 	* @return \integer
 	*/ 
	public function getUser() {
		return $this->user;
	}

	/**
 	* sets the votin
 	* @param \integer $voting
 	* @return void
 	*/
	public function setVoting($voting) { 
		$this->voting = $voting;
	}
	
	/**
 	* get the voting
 	* @return \integer
 	*/ 
	public function getVoting() {
		return $this->voting;
	}

}

?>

