<?php
interface Cloud_Model_Utli_Interface
{
	public static function showDate($date);
	public static function showDay($date);
	public static function showTime($date);
	public static function stripUnicode($str);
	public static function setPublish($dbTable, $listid);
	public static function setUnPublish($dbTable, $listid);
	public static function setPublishAjax($dbTable, $id);
}