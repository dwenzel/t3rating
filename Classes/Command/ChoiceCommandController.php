<?php
namespace Webfox\T3rating\Command;
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
 *
 * @author Dirk Wenzel <wenzel@cps-it.de>
 * @package t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\RepositoryInterface;
use Webfox\T3rating\Domain\Model\Choice;
use Webfox\T3rating\Domain\Model\Voting;
use Webfox\T3rating\Domain\Repository\ChoiceRepository;
use Webfox\T3rating\Domain\Repository\VotingRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;

/**
 * Class ChoiceCommandController
 * Extbase Command controller for TYPO3 Scheduler
 *
 */
class ChoiceCommandController extends CommandController {

	/**
	 * Choice repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\ChoiceRepository
	 */
	protected $choiceRepository;

	/**
	 * @var \Webfox\T3rating\Domain\Repository\VotingRepository
	 */
	protected $votingRepository;

	/**
	 * @var PersistenceManager
	 */
	protected $persistenceManager;

	public function injectChoiceRepository(ChoiceRepository $choiceRepository) {
		$this->choiceRepository = $choiceRepository;
	}

	public function injectVotingRepository(VotingRepository $votingRepository) {
		$this->votingRepository = $votingRepository;
	}

	public function injectPersistenceManager(PersistenceManager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}

	/**
	 * Add choices
	 * Turns objects of a given class into choices for a voting. If a page id is given only objects
	 * in this page will be handled.
	 *
	 * @param \string $className Full class name of an extbase model
	 * @param \int $votingUid Voting uid (to which choices are added)
	 * @param \int $pid Optional Page Id (where to search for)
	 */
	public function addCommand($className, $votingUid, $pid = NULL) {
		/** @var \TYPO3\CMS\Extbase\Persistence\RepositoryInterface $objectRepository */
		$objectRepository = $this->getRepository($className);
		/** @var Voting $voting */
		$voting = $this->votingRepository->findByUid($votingUid);
		if($objectRepository instanceof RepositoryInterface AND $voting) {
			$modelName = substr(strrchr($className, '\\'), 1);
			$tableName = $this->getTableName($className);

			/** @var QuerySettingsInterface $querySettings */
			$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
			$querySettings->setRespectStoragePage(FALSE)
			->setIgnoreEnableFields(FALSE);
			if($pid) {
				$querySettings->setRespectStoragePage(TRUE)
					->setStoragePageIds(array($pid));
			}
			$objectRepository->setDefaultQuerySettings($querySettings);
			$this->choiceRepository->setDefaultQuerySettings($querySettings);
			$objects = $objectRepository->findAll();

			foreach($objects as $object) {
				$recordName = $tableName . '_' . $object->getUid();
				$existingChoices = $this->choiceRepository->findByRecord($recordName)->toArray();
				if(!count($existingChoices)) {
					/** @var Choice $choice */
					$choice = $this->objectManager->get('Webfox\\T3rating\\Domain\\Model\\Choice');
					$choice->setRecord($recordName);
					$choice->setTitle($modelName . ' ' . $object->getUid());
					if($pid) {
						$choice->setPid($pid);
					}
					$this->choiceRepository->add($choice);
					$voting->addChoice($choice);
				}
			}
			$this->votingRepository->update($voting);
		}
	}

	protected function getRepository($className){
		$repositoryClass = str_replace('Model', 'Repository', $className) . 'Repository';
		return $this->objectManager->get($repositoryClass);
	}

	/**
	 * Determines the SQL table for a given extbase model.
	 *
	 * @param \string $className
	 * @return \string
	 */
	protected function getTableName($className) {
		/** @var \TYPO3\CMS\Extbase\Persistence\Generic\Backend $backend */
		$backend = $this->objectManager->get('TYPO3\\CMS\Extbase\\Persistence\\Generic\\Backend');
		return $backend->getDataMapper()->getDataMap($className)->getTableName();
	}
} 