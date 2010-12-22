<?php
interface Cloud_Model_Theme_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Theme_CloudTheme $Theme);
	public function saveTheme(Cloud_Model_Theme_CloudTheme $theme, $component_id);
	public function find($id, Cloud_Model_Theme_CloudTheme $Theme);
	public function fetchAll();
	public function getThemeByComponent($component_id);
	public function searchTheme($name, $component_id);
	public function getThemeById($id);
	public function getThemeByName($name, $component_id, $currentTheme);
	public function getThemeByPath($path, $component_id, $currentTheme);
	public function getIsDefault($component_id);
	public function getThemeDefault($component_id);
	public function setDefaultTheme($id, $component_id, $count = null);
	public function autoSuggestionTheme($name, $component_id);
	public function checkThemeStock();
	public function checkThemeNews();
}