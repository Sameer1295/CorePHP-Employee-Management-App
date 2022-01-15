<?php

include 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['file_content'])){
    $temporary_html_file = './tmp_html'.time().'.html';
    file_put_contents($temporary_html_file,$_POST['file_content']);
    $reader = IOFactory::createReader('Html');
//    print_r($_POST['file_content']);
    //load html file content
    $spreadsheet = $reader->load($temporary_html_file);

    $writer = IOFactory::createWriter($spreadsheet,'Xlsx');

    $filename = time();

    $writer->save($filename);
    header('Content-Type:application/x-www-form-urlencoded');
    header('Content-Transfer-Encoding: Binary');
    header('Content-disposition: attachement;filename="'.$filename.'.xlsx"');
    readfile($filename);
    unlink($temporary_html_file);
    unlink($filename);
    exit();
}else if(!isset($_POST['file_content']))
{
    echo "No html data";
}