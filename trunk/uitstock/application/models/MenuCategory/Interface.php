<?php
interface Cloud_Model_MenuCategory_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_MenuCategory_CloudMenuCategory $menuCategory);
	public function find($id, Cloud_Model_MenuCategory_CloudMenuCategory $menuCategory);
	public function fetchAll();
	public function getMenuCategoryByName($name, $currentMenutCategory);
}