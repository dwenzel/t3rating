<?php
namespace Webfox\T3rating\ViewHelpers;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * View helper which returns votes for a given voting and / or choice
 *
 * @author Dirk Wenzel <wenzel@cps-it.de>
 * @package t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class CountVotesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Vote Repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VoteRepository
	 * @inject
	 */
	protected $voteRepository;

	/**
	 * Initialize arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('choice', '\Webfox\T3rating\Domain\Model\Choice', 'A choice, optional. If given only votes for this choice are returned');
		$this->registerArgument('voting', '\Webfox\T3rating\Domain\Model\Voting', 'A voting, optional. If given only votes for this voting are returned.');
	}

	/**
	 * Returns the number of votes.
	 *
	 * @return \int
	 */
	public function render() {
		/** @var \Webfox\T3rating\Domain\Model\Voting $voting */
		$voting = $this->arguments['voting'];

		/** @var \Webfox\T3rating\Domain\Model\Choice $choice */
	    $choice = $this->arguments['choice'];

		$voteDemand = GeneralUtility::makeInstance('Webfox\\T3rating\\Domain\\Model\\VoteDemand');

	    if($voting) {
			$voteDemand->setVoting($voting->getUid());
	    }
		if($choice) {
			$voteDemand->setChoice($choice->getUid());
		}
	    $votes = $this->voteRepository->findDemanded($voteDemand);
	    return count($votes);
	}

}

