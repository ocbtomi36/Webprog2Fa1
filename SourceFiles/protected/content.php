<?php 

/*
if(!array_key_exists('U',$_GET)){
    $_GET['U'] = START_CONTENT;
    
}
$unit = $_GET['U'];
$unitPath = CONTENT_DIR.$unit.'.php';

if(!file_exists($unitPath)){
    header('Location: '.BASE_URL);
}
*/
if(!filter_has_var(INPUT_GET,'U')){
    $unit = START_CONTENT;
} else {
    $unit = filter_input(INPUT_GET, 'U', FILTER_DEFAULT); 
        if ($unit !== null && $unit !== false) {
        $unit = htmlspecialchars($unit, ENT_QUOTES, 'UTF-8');
    }

}

$unitPath = CONTENT_DIR.$unit.'.php';

if(!file_exists($unitPath)){
    header('Location: '.BASE_URL);
}


require_once $unitPath;

?>