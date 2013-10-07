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
class Choice extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * description
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * hint
	 *
	 * @var \string
	 */
	protected $hint;

	/**
	 * Collection
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection>
	 * @lazy
	 */
	protected $collections;

	/**
	 * __construct
	 *
	 * @return Choice
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
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return \string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param \string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the hint
	 *
	 * @return \string $hint
	 */
	public function getHint() {
		return $this->hint;
	}

	/**
	 * Sets the hint
	 *
	 * @param \string $hint
	 * @return void
	 */
	public function setHint($hint) {
		$this->hint = $hint;
	}

	/**
	 * Adds a Collection
	 *
	 * @param \Webfox\T3rating\Domain\Model\Collection $collection
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> collections
	 */
	public function addCollection(\Webfox\T3rating\Domain\Model\Collection $collection) {
		$this->collections->attach($collections);
	}

	/**
	 * Removes a Collection
	 *
	 * @param \Webfox\T3rating\Domain\Model\Collection $collectionToRemove The Collection to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> collections
	 */
	public function removeCollection(\Webfox\T3rating\Domain\Model\Collection $collectionToRemove) {
		$this->collections->detach($collectionToRemove);
	}

	/**
	 * Returns the collections
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> collections
	 */
	public function getCollections() {
		return $this->collections;
	}

	/**
	 * Sets the collections
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> $collections
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Collection> collections
	 */
	public function setCollections(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $collections) {
		$this->collections = $collections;
	}

}
?>