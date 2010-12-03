<?php
interface Cloud_Model_Widget_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Widget_CloudWidget $Widget);
	public function saveAll();
	public function updateAll();
	public function find($id, Cloud_Model_Widget_CloudWidget $Widget);
	public function fetchAll();
	public function getWidgetbyPage($pageId);
	public function getWidgetbyComponentPage($componentId, $pageName);
	public function checkUniqueWidgetName($componentId, $listPageId, $name, $widgetId = null);
	public function checkUniqueWidgetAlias($componentId, $pageId, $alias, $widgetId = null);
	public function getWidgetbyPageWidget($id);
	public function getWidgetByName($name, $widgetId);
	public function autoSuggestionWidget($alias);
	public function searchWidget($alias, $pageId);
	
}