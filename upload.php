<?php

$upload_dir = array(
    'img'=> '/uploads/',
);

$imgset = array(
    'maxsize' => 20000,
    'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'),
);

/** If 0, will OVERWRITE the existing file **/
define('RENAME_F', 1);
$re = '';

if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) >1) {

    define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));
    /** get filename without extension **/
    /** get protocol and host name to send the absolute image path to CKEditor **/
    $site = $_SERVER['HTTP_ORIGIN'];
    $sepext = explode('.', strtolower($_FILES['upload']['name']));
    $type = end($sepext);    /** gets extension **/
    $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio'];
    $upload_dir = trim($upload_dir, '/') .'/';

    if($_FILES['upload']['size'] > $imgset['maxsize']*1000) {
        $re .= '\\n Maximum file size must be: '. $imgset['maxsize']. ' KB.';
    }

    /** set filename; if file exists, and RENAME_F is 1, set "img_name_I" **/
    /** $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename **/

    function setFName($p, $fn, $ex, $i){
        if(RENAME_F ==1 && file_exists($p .$fn .$ex)) return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1));
        else return $fn .$ex;
    }

    $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0);
    $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir . $f_name;  /** full file path **/

    /** If no errors, upload the image, else, output the errors **/
    if($re == '') {
        /** print_r($_FILES);exit; **/
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
            $url = $site .'/'. $upload_dir . $f_name;
        }
        else $re = 'alert("Unable to upload the file")';
    }
    else $re = 'alert("'. $re .'")';
}
@header('Content-type: text/html; charset=utf-8');
echo '{"uploaded": true,"url": "'.$url.'"}';