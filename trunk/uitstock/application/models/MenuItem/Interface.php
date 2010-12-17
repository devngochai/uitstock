<?php
interface Cloud_Model_MenuItem_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_MenuItem_CloudMenuItem $menuItem);
	public function updateOrdering($id, $parent_id, $catId);
	public function updateHome($id, $is_home, $catId);
	public function find($id, Cloud_Model_MenuItem_CloudMenuItem $menuItem);
	public function getItemByCat($id);
	public function fetchAllParent($id);
	public function fetchAllSub($id);
	public function getMinOrder($id);
	public function getMaxOrder($id);
	public function getItemByCategory($id);
	public function checkOrder($id, $catId, $type, $ordering);
	public function changeOrder($id, $catId, $type, $ordering);
}