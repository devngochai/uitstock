<?php
interface Cloud_Model_Template_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Template_CloudTemplate $template);
	public function find($id, Cloud_Model_Template_CloudTemplate $template);
	public function fetchAll();
	public function saveTemplate(Cloud_Model_Template_CloudTemplate $template, $component_id);
	public function getTemplateByComponent($component_id);
	public function searchTemplate($name, $component_id);
	public function getTemplateByName($name, $component_id, $currentTemplate);
	public function getTemplateByPath($path, $component_id, $currentTemplate);
	public function getIsDefault($component_id);
	public function getTemplateDefault($component_id);
	public function setDefaultTemplate($id, $component_id, $count = null);
	public function setDefaultTemplateByName($values);
	public function autoSuggestionTemplate($name, $component_id);
}