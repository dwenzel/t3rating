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
class Voting extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Voting Type
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $type;

	/**
	 * Votes per User Count
	 *
	 * @var \integer
	 */
	protected $votesCount;

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
	 * Voting Options
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Choice>
	 * @lazy
	 */
	protected $choices;

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
		$this->choices = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the type
	 *
	 * @return \integer $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param \integer $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the votesCount
	 *
	 * @return \integer $votesCount
	 */
	public function getVotesCount() {
		return $this->votesCount;
	}

	/**
	 * Sets the votesCount
	 *
	 * @param \integer $votesCount
	 * @return void
	 */
	public function setVotesCount($votesCount) {
		$this->votesCount = $votesCount;
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
	 * Adds a Option
	 *
	 * @param \Webfox\T3rating\Domain\Model\Choice $choice
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Choice> choices
	 */
	public function addChoice(\Webfox\T3rating\Domain\Model\Choice $choice) {
		$this->choices->attach($choice);
	}

	/**
	 * Removes a Option
	 *
	 * @param \Webfox\T3rating\Domain\Model\Choice $choiceToRemove The Choice to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Choice> choices
	 */
	public function removeChoice(\Webfox\T3rating\Domain\Model\Choice $choiceToRemove) {
		$this->choices->detach($choiceToRemove);
	}

	/**
	 * Returns the choices
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Choice> choices
	 */
	public function getChoices() {
		return $this->choices;
	}

	/**
	 * Sets the choices
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Choice> $choices
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webfox\T3rating\Domain\Model\Choice> choices
	 */
	public function setChoices(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $choices) {
		$this->choices = $choices;
	}

}
?>