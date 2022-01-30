<?php
include_once ("obj_project.php");
class Commuinty extends obj_project {
public static $table_name="commuinty";
protected static $db_table_fields =array("name");
public $id;
public $name;
}
?>