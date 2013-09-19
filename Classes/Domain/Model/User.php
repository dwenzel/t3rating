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
class User extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser {

	/**
	 * Collections
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection>
	 */
	protected $collections;

	/**
	 * __construct
	 *
	 * @return User
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->collections = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Collection
	 *
	 * @param \Webfox\T3rating\Domain\Model\Collection $collection
	 * @return void
	 */
	public function addCollection(\Webfox\T3rating\Domain\Model\Collection $collection) {
		$this->collections->attach($collection);
	}

	/**
	 * Removes a Collection
	 *
	 * @param \Webfox\T3rating\Domain\Model\Collection $collectionToRemove The Collection to be removed
	 * @return void
	 */
	public function removeCollection(\Webfox\T3rating\Domain\Model\Collection $collectionToRemove) {
		$this->collections->detach($collectionToRemove);
	}

	/**
	 * Returns the collections
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> $collections
	 */
	public function getCollections() {
		return $this->collections;
	}

	/**
	 * Sets the collections
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> $collections
	 * @return void
	 */
	public function setCollections(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $collections) {
		$this->collections = $collections;
	}

}
?>