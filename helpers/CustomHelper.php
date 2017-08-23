<?php 
define('ROLE_MODERATOR', 500);
define('ROLE_ADMIN', 900);
define('ROLE_UPLOADER', 100);
/**
 * Slug Constant
 */
define('ENTITY_TYPE_CATEGORY', 100);
define('ENTITY_TYPE_POST', 500);



if(!function_exists('get_options')){

  function get_options($array, $parent=0, $indent="", $forget = null) {
      
      // Return variable
      $return = [];
      for ($i=0; $i < count($array); $i++) {
          $val = $array[$i];

        	if($val->parent_id == $parent && $val->id != $forget) {
          	$return["x".$val->id] = $indent.$val->cate_name;
          	$return = array_merge($return, get_options($array, $val->id, "--".$indent, $forget));
          }
      }

      return $return;
  }
}

if(!function_exists('get_in_array')){
  function get_in_array($id, $arr, $indent = ""){
    $result = null;
    for ($i=0; $i < count($arr); $i++) { 
      if($id == $indent.$arr[$i]->id){
        $result = $arr[$i];
        break;
      }
    }
    return $result;
  }
}

if(!function_exists('slug_generate')){
  function slug_generate($name){
    $slug = null;
    $slug = str_slug(trim($name), '-');
    $slug .= "-" . date('YmdHis', time());
    return $slug;
  }
}


 ?>