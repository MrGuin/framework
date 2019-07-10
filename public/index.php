<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2019/7/5
 * Time: 16:44
 */

// 入口标记
define('ACCESS', TRUE);

// 定义根目录
define('ROOT_PATH', getDir(dirname(__DIR__)));
//echo ROOT_PATH;

// 加载初始化文件
include ROOT_PATH . 'core/App.php';

//echo 'Hello World';

// 自动加载
Core\App::run();


function getDir($dir)
{
    return str_replace('\\', '/', $dir) . '/';
}