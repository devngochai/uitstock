<?php
interface Cloud_Model_PageWidget_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_PageWidget_CloudPageWidget $PageWidget);
	public function saveAll($widgetId);
	public function updateAll();
	public function find($id, Cloud_Model_PageWidget_CloudPageWidget $PageWidget);
	public function fetchAll();
	public function getPageWidgetbyPage($pageId);
	public function getMinOrder($pageId,$position);
	public function getMaxOrder($pageId, $position);
	public function getOrderByPage($pageId, $position = null);
	public function getIdByPage($pageId, $position, $ordering);
	public function setPublish($listid);
	public function setUnPublish($listid);
	public function deleteAll($listid);
	public function setPublishAjax($id);
	public function checkOrder($type, $id, $pageId, $position, $ordering);
	public function changeOrder($type, $id, $pageId, $position, $ordering);
	
}