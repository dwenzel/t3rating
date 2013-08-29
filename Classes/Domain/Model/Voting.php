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
class Voting extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Description
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * Teaser
	 *
	 * @var \string
	 */
	protected $teaser;

	/**
	 * image
	 *
	 * @var \string
	 */
	protected $image;

	/**
	 * Votable Items
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\Option>
	 * @lazy
	 */
	protected $votables;

	/**
	 * __construct
	 *
	 * @return Voting
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
		$this->votables = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the teaser
	 *
	 * @return \string $teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Sets the teaser
	 *
	 * @param \string $teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Returns the image
	 *
	 * @return \string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Adds a Vote
	 *
	 * @param \webfox\T3rating\Domain\Model\Option $votable
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\Option> votables
	 */
	public function addVotable(\webfox\T3rating\Domain\Model\Option $votable) {
		$this->votables->attach($votable);
	}

	/**
	 * Removes a Vote
	 *
	 * @param \webfox\T3rating\Domain\Model\Option $votableToRemove The Option to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\Option> votables
	 */
	public function removeVotable(\webfox\T3rating\Domain\Model\Option $votableToRemove) {
		$this->votables->detach($votableToRemove);
	}

	/**
	 * Returns the votables
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\Option> votables
	 */
	public function getVotables() {
		return $this->votables;
	}

	/**
	 * Sets the votables
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\Option> $votables
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\Option> votables
	 */
	public function setVotables(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $votables) {
		$this->votables = $votables;
	}

}
?>