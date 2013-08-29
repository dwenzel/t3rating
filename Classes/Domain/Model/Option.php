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
class Option extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
	 * Content Elements
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\TtContent>
	 * @lazy
	 */
	protected $contentElements;

	/**
	 * __construct
	 *
	 * @return Votable
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
		$this->contentElements = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a TtContent
	 *
	 * @param \webfox\T3rating\Domain\Model\TtContent $contentElement
	 * @return void
	 */
	public function addContentElement(\webfox\T3rating\Domain\Model\TtContent $contentElement) {
		$this->contentElements->attach($contentElement);
	}

	/**
	 * Removes a TtContent
	 *
	 * @param \webfox\T3rating\Domain\Model\TtContent $contentElementToRemove The TtContent to be removed
	 * @return void
	 */
	public function removeContentElement(\webfox\T3rating\Domain\Model\TtContent $contentElementToRemove) {
		$this->contentElements->detach($contentElementToRemove);
	}

	/**
	 * Returns the contentElements
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\TtContent> $contentElements
	 */
	public function getContentElements() {
		return $this->contentElements;
	}

	/**
	 * Sets the contentElements
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\webfox\T3rating\Domain\Model\TtContent> $contentElements
	 * @return void
	 */
	public function setContentElements(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contentElements) {
		$this->contentElements = $contentElements;
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

}
?>