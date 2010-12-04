<?php
interface Cloud_Model_Component_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Component_CloudComponent $Component);
	public function find($id, Cloud_Model_Component_CloudComponent $Component);
	public function findComponentDetail($id);
	public function fetchAll();
	public function fetchAllByOrder();
	public function fetchAllByFront();
	public function getAllComponent();		
	public function getComponentById($id);	
	public function getComponentByName($name, $currentComponent);
	public function getMaxOrder();
	public function getMinOrder();	
	public function autoSuggestionComponent($name);
	public function searchComponent($name);
}