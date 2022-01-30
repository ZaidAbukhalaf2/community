<?php
include_once ("obj_project.php");

class Skills extends obj_project {
public static $table_name="skills";
protected static $db_table_fields =array("skills_name","user_id");
public $id;
public $skills_name;
public $user_id;


}
?>