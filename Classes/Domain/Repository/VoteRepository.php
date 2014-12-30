<?php
namespace Webfox\T3rating\Domain\Repository;

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
class VoteRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	/**
  	 * Find demanded
  	 * @var \Webfox\T3rating\Domain\Model\VoteDemand $demand
  	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
  	 */
	public function findDemanded($demand) {
		$query = $this->createQuery();
		$constraints = array();
		if ($demand->getUser()) {
			$constraints[] = $query->equals('user', $demand->getUser());
		}
		if ($demand->getVoting()) {
			$constraints[] = $query->equals('voting', $demand->getVoting());
		}
		if ($demand->getChoice()) {
			$constraints[] = $query->equals('choice', $demand->getChoice());
		}
		if($demand->getVisitorHash()) {
			$constraints[] = $query->equals('visitor_hash', $demand->getVisitorHash());
		}
		
		count($constraints)?$query->matching($query->logicalAnd($constraints)):NULL;
		return $query->execute();
	}

}
?>
