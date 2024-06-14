<?php 

$operation = 'listing';

if(filter_has_var(INPUT_GET, 'M')){
    $local_operation = filter_input(INPUT_GET, 'M', FILTER_DEFAULT);
    if ($local_operation !== null && $local_operation !== false) {
        $local_operation = htmlspecialchars($local_operation, ENT_QUOTES, 'UTF-8');
    }

    if($local_operation == false) {
        header('Location:' .BASE_URL);
    }

    if(!function_exists($local_operation)){
        header('Location:' .BASE_URL);
    }

    $operation = $local_operation;
}
$operation();

function listing(){
    echo 'User listing';
    $file_path = FILES_DIR.'users.csv';
    $file = fopen($file_path,'r') or die ('No file exist !');

    $label = fgets($file);
    $label = explode(';', $label);

    $rows = [];
    while(!feof($file)){
        $row = fgets($file);
        $rows[] = explode(';', $row);
    }

    fclose($file);
    require USERS_DIR.'listAllUser.php';
    
}

function details(){

    if(!filter_has_var(INPUT_GET, 'P')){
        echo 'ERROR';
        die();
    }
    $id = filter_input(INPUT_GET, 'P', FILTER_VALIDATE_INT);
    if($id === FALSE){
        echo 'Id exist but wrong';
        die();
    }

    $file_path = FILES_DIR.'users.csv';
    $file = fopen($file_path,'r') or die ('No file exist !');

    $label = fgets($file);
    $label = explode(';', $label);

    $result = NULL;
    while(!feof($file)){
        $row = fgets($file);
        $fields = explode(';', $row);   
        if($fields[0] == $id) {
            $result = $fields;
            break;
        }
    }
    if($result == NULL){
        echo 'There is no user with that id';
        die();
    }

    fclose($file);

    require_once USERS_DIR.'detailsUser.php';

}

function delete(){

    if(!filter_has_var(INPUT_GET, 'P')){
        echo 'ERROR';
        die();
    }
    $id = filter_input(INPUT_GET, 'P', FILTER_VALIDATE_INT);
    if($id === FALSE){
        echo 'Id exist but wrong';
        die();
    }

    $file_path = FILES_DIR . 'users.csv';
    $file = fopen($file_path, 'r') or die('There is no file with that id!');
    
    $label = fgets($file);
    $label = explode(';', trim($label));
    
    $rows = [];
    while (!feof($file)) {
        $row = fgets($file);
        if (trim($row) !== '') {
            $rows[] = explode(';', trim($row));
        }
    }
    $deleteRowId= -1;
    $rowsCnt = count($rows);
    for ($i=0; $i < $rowsCnt; $i++) { 
    if($rows[$i][0] == $id){
        $deleteRowId = $i;
        }
    }
        
        if (isset($rows[$deleteRowId])) {
            unset($rows[$deleteRowId]);
            $rows = array_values($rows);
        
            $file = fopen($file_path, 'w') or die('It is no possible open that file for writing!');
                
                
            fwrite($file, implode(';', $label) . PHP_EOL);
        
                
            foreach ($rows as $index => $row) {
                    
                if ($index !== count($rows) - 1) {
                    fwrite($file, implode(';', $row) . PHP_EOL);
                } else {
                        
                    fwrite($file, implode(';', $row));
                }
            }
        
            fclose($file);
        
            echo 'Record succesfully deleted';
            header('Location:' .BASE_URL);
            } else {
                echo 'There is no record with that id';
            }
        

}
function modify(){
    if(!filter_has_var(INPUT_GET, 'P')){
        echo 'ERROR';
        die();
    }
    $id = filter_input(INPUT_GET, 'P', FILTER_VALIDATE_INT);
    if($id === FALSE){
        echo 'Id exist but wrong';
        die();
    }

    $file_path = FILES_DIR.'users.csv';
    $file = fopen($file_path,'r') or die ('No file exist !');

    $label = fgets($file);
    $label = explode(';', $label);

    $result = NULL;
    while(!feof($file)){
        $row = fgets($file);
        $fields = explode(';', $row);
        if($fields[0] == $id) {
            $result = $fields;
            break;
        }
    }
    if($result == NULL){
        echo 'There is no user with that id';
        die();
    }

    fclose($file);

    require_once USERS_DIR.'modifyUser.php';

}
function add(){

$file_path = FILES_DIR . 'users.csv';
$file = fopen($file_path, 'r') or die('There is no file with that name!');

$label = fgets($file);
$label = explode(';', trim($label));

$rows = [];
while (!feof($file)) {
    $row = fgets($file);
    if (trim($row) !== '') {
        $rows[] = explode(';', trim($row));
    }
}
fclose($file);

$maxId = -1;
$rowsCnt = count($rows);
for ($i = 0; $i < $rowsCnt; $i++) { 
    if ($rows[$i][0] > $maxId) {
        $maxId = $rows[$i][0];
    }
}

require USERS_DIR . 'addNewUser.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists('send', $_POST)) {
    $id = $maxId + 1;
    $fullname = str_replace(['"', "'"], '', $_POST["fullname"]);
    $dateofbirth = str_replace(['"', "'"], '', $_POST["dateofbirth"]);
    $placeofbirth = str_replace(['"', "'"], '', $_POST["placeofbirth"]);
    $children = str_replace(['"', "'"], '', $_POST["children"]);
    $gender = str_replace(['"', "'"], '', $_POST["gender"]);
    $language_exam = str_replace(['"', "'"], '', $_POST["language_exam"]);
    $role = str_replace(['"', "'"], '', $_POST["role"]);

    $newUser = [$id, $fullname, $dateofbirth, $placeofbirth, $children, $gender, $language_exam, $role];

    $rows[] = $newUser;
    $rows = array_values($rows);

    $file = fopen($file_path, 'w') or die('It is not possible to open that file for writing!');
    
    fwrite($file, implode(';', $label) . PHP_EOL);
    
    foreach ($rows as $index => $row) {
        if ($index !== count($rows) - 1) {
            fwrite($file, implode(';', $row) . PHP_EOL);
        } else {
            fwrite($file, implode(';', $row));
        }
    }
    
    fclose($file);
    exit; 
    } else {

    }

}

