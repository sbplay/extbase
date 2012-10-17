<?php
namespace TYPO3\CMS\Extbase\Tests\Functional\Domain\Model\Fixture;

/***************************************************************
 * Copyright notice
 *
 * (c) 2012 Oliver Hader <oliver.hader@typo3.org>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * A file context object (File Abstraction Layer)
 *
 * @package Extbase
 * @subpackage Domain\Model
 * @scope prototype
 * @entity
 * @api
 */
class FileContext extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\File
	 */
	protected $file;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_File>
	 */
	protected $files;

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $fileReference;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FileReference>
	 */
	protected $fileReferences;

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection
	 */
	protected $staticFileCollection;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_StaticFileCollection>
	 */
	protected $staticFileCollections;

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection
	 */
	protected $folderBasedFileCollection;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FolderBasedFileCollection>
	 */
	protected $folderBasedFileCollections;

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\Folder
	 */
	protected $folder;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_Folder>
	 */
	protected $folders;

	public function __construct() {
		$this->files = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->fileReferences = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->staticFileCollections = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->folderBasedFileCollections = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->folders = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
	}

	/**
	 * FILE
	 */
	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\File
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\File $file
	 */
	public function setFile(\TYPO3\CMS\Extbase\Domain\Model\File $file) {
		$this->file = $file;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_File>
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_File> $files
	 */
	public function setFiles(\TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage $files) {
		$this->files = $files;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\File $file
	 */
	public function addFile(\TYPO3\CMS\Extbase\Domain\Model\File $file) {
		$this->files->attach($file);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\File $file
	 */
	public function removeFile(\TYPO3\CMS\Extbase\Domain\Model\File $file) {
		$this->files->detach($file);
	}

	/**
	 * COLLECTION
	 */
	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection
	 */
	public function getStaticFileCollection() {
		return $this->staticFileCollection;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection $staticFileCollection
	 */
	public function setStaticFileCollection(\TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection $staticFileCollection) {
		$this->staticFileCollection = $staticFileCollection;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_StaticFileCollection>
	 */
	public function getStaticFileCollections() {
		return $this->staticFileCollections;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_StaticFileCollection> $staticFileCollections
	 */
	public function setStaticFileCollections(\TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage $staticFileCollections) {
		$this->staticFileCollections = $staticFileCollections;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection $staticFileCollection
	 */
	public function addStaticFileCollection(\TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection $staticFileCollection) {
		$this->staticFileCollections->attach($staticFileCollection);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection $staticFileCollection
	 */
	public function removeStaticFileCollection(\TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection $staticFileCollection) {
		$this->staticFileCollections->detach($staticFileCollection);
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection
	 */
	public function getFolderBasedFileCollection() {
		return $this->folderBasedFileCollection;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection $folderBasedFileCollection
	 */
	public function setFolderBasedFileCollection(\TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection $folderBasedFileCollection) {
		$this->folderBasedFileCollection = $folderBasedFileCollection;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FolderBasedFileCollection>
	 */
	public function getFolderBasedFileCollections() {
		return $this->folderBasedFileCollections;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FolderBasedFileCollection> $folderBasedFileCollections
	 */
	public function setFolderBasedFileCollections(\TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage $folderBasedFileCollections) {
		$this->folderBasedFileCollections = $folderBasedFileCollections;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection $folderBasedFileCollection
	 */
	public function addFolderBasedFileCollection(\TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection $folderBasedFileCollection) {
		$this->folderBasedFileCollections->attach($folderBasedFileCollection);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection $folderBasedFileCollection
	 */
	public function removeFolderBasedFileCollection(\TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection $folderBasedFileCollection) {
		$this->folderBasedFileCollections->detach($folderBasedFileCollection);
	}

	/**
	 * REFERENCE
	 */
	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	public function getFileReference() {
		return $this->fileReference;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference
	 */
	public function setFileReference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference) {
		$this->fileReference = $fileReference;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FileReference>
	 */
	public function getFileReferences() {
		return $this->fileReferences;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FileReference> $fileReferences
	 */
	public function setFileReferences(\TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage $fileReferences) {
		$this->fileReferences = $fileReferences;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference
	 */
	public function addFileReference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference) {
		$this->fileReferences->attach($fileReference);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference
	 */
	public function removeFileReference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference) {
		$this->fileReferences->detach($fileReference);
	}

	/**
	 * FOLDER
	 */
	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\Folder
	 */
	public function getFolder() {
		return $this->folder;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Folder $folder
	 */
	public function setFolder(\TYPO3\CMS\Extbase\Domain\Model\Folder $folder) {
		$this->folder = $folder;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_Folder>
	 */
	public function getFolders() {
		return $this->folders;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_Folder> $folders
	 */
	public function setFolders(\TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage $folders) {
		$this->folders = $folders;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Folder $folder
	 */
	public function addFolder(\TYPO3\CMS\Extbase\Domain\Model\Folder $folder) {
		$this->folders->attach($folder);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Folder $folder
	 */
	public function removeFolder(\TYPO3\CMS\Extbase\Domain\Model\Folder $folder) {
		$this->folders->detach($folder);
	}

}


?>