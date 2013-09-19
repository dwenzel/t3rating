<?php

namespace Webfox\T3rating\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Dirk Wenzel <wenzel@webfox01.de>, Agentur Webfox
 *  			Michael Kasten <kasten@webfox01.de>, Agentur Webfox
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Webfox\T3rating\Domain\Model\Option.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Rating
 *
 * @author Dirk Wenzel <wenzel@webfox01.de>
 * @author Michael Kasten <kasten@webfox01.de>
 */
class OptionTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \Webfox\T3rating\Domain\Model\Option
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \Webfox\T3rating\Domain\Model\Option();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getHintReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setHintForStringSetsHint() { 
		$this->fixture->setHint('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getHint()
		);
	}
	
	/**
	 * @test
	 */
	public function getCollectionReturnsInitialValueForCollection() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCollection()
		);
	}

	/**
	 * @test
	 */
	public function setCollectionForObjectStorageContainingCollectionSetsCollection() { 
		$collection = new \Webfox\T3rating\Domain\Model\Collection();
		$objectStorageHoldingExactlyOneCollection = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCollection->attach($collection);
		$this->fixture->setCollection($objectStorageHoldingExactlyOneCollection);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCollection,
			$this->fixture->getCollection()
		);
	}
	
	/**
	 * @test
	 */
	public function addCollectionToObjectStorageHoldingCollection() {
		$collection = new \Webfox\T3rating\Domain\Model\Collection();
		$objectStorageHoldingExactlyOneCollection = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCollection->attach($collection);
		$this->fixture->addCollection($collection);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCollection,
			$this->fixture->getCollection()
		);
	}

	/**
	 * @test
	 */
	public function removeCollectionFromObjectStorageHoldingCollection() {
		$collection = new \Webfox\T3rating\Domain\Model\Collection();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($collection);
		$localObjectStorage->detach($collection);
		$this->fixture->addCollection($collection);
		$this->fixture->removeCollection($collection);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCollection()
		);
	}
	
}
?>