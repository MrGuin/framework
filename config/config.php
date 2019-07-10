<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2019/7/10
 * Time: 15:31
 */

// 配置文件
return array(
    // 数据库配置
    'database'=> array(
        'type' => 'mysql',		//数据库产品
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pass' => 'root',
        'charset' => 'utf8',
        'dbname'  => 'my_database',
        'prefix'  => ''			//表前缀
    ),

    // 报错信息
    'system' => array(
        'error_reporting' => E_ALL,     // 错误报告级别，默认报告所有错误
        'display_errors' => 1           // 错误显示
    )
);