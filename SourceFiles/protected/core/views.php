<?php 

function print_menu(&$menu, $return_html = FALSE){

    $menuResultString = '';

    $menuResultString .= '<ul>';
    foreach ($menu as &$menuItem) {
        $menuResultString = $menuResultString.'<li class="parent"><a href="'.$menuItem['href'].'"'.(array_key_exists('extra',$menuItem) ? generate_attributes($menuItem['extra']): ' ').'>'.$menuItem['menuTitle'].'</a>';
        if(array_key_exists('childs',$menuItem) && !empty($menuItem['childs'])){
            print_submenu($menuItem['childs'] ,$menuResultString);
        }
        $menuResultString .='</li>';
    }
    $menuResultString .= '</ul>';

    if ($return_html) {
        return $menuResultString;
    }
    else
        print $menuResultString;

}
/**
 * Builds a string, that responsible for the print the submenu if exist.
 * @param array $menu
 * @param string $menuResultStirng
 * 
 * @return string 
 */
function print_submenu(&$menu, &$menuResultString){
    $menuResultString .= '<div class="submenu"><ul class="child">';
    $hasAchild = false;
    foreach ($menu as $menuItem) {
        $hasAchild = false;
        if(array_key_exists('childs',$menuItem) && !empty($menuItem['childs'])){
            $hasAchild = true;
        }
        $menuResultString = $menuResultString.'<li '.($hasAchild?'class="parent"': ' ').'><a href="'.$menuItem['href'].'" '. ( array_key_exists('extra',$menuItem) ? generate_attributes($menuItem['extra']): ' ').'>'.$menuItem['menuTitle'].'</a>';
        
        if ($hasAchild) {
            print_submenu($menuItem['childs'] ,$menuResultString);
        }
        
        $menuResultString .='</li>';
    }
    $menuResultString .='</ul></div>';
}
/**
 * Generate attributes if exists.
 * @param array $menu
 * @param string $menuResultStirng
 * 
 * @return string 
 */

function generate_attributes($key_value_paar){
    $tagstring ='';
    foreach ($key_value_paar as $key => $value) {
        $tagstring .= $key.'="'.$value.'" ';
    }
    return $tagstring;
}





?>