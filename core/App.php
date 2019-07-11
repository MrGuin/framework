<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2019/7/6
 * Time: 19:36
 */

namespace Core;

require '../vendor/autoload.php';

// 安全验证
if (!ACCESS) {
//    echo '跳转至index';
//    define('REDIRECT', TRUE);
    header('location:../public/index.php');
    exit;
}

class App
{
    public static function run()
    {
        // 设置目录常量
        self::set_path();
        // 加载配置文件
        self::set_config();
        // 错误处理
        self::set_error();
        // url解析
        self::set_url();
        // 自动加载
        self::set_autoload();
        // 分发请求
        self::set_dispatch();

//        echo '加载成功';
//        echo __DIR__;
    }

    // 设置各目录常量
    private static function set_path()
    {
        // 定义路径常量
        define('CORE_PATH', ROOT_PATH . 'core/');
        define('APP_PATH', ROOT_PATH . 'app/');
        define('CONTROLLER_PATH', APP_PATH . 'Controller/');
        define('MODEL_PATH', APP_PATH . 'Model/');
        define('VIEW_PATH', APP_PATH . 'View/');
        define('CONFIG_PATH', ROOT_PATH . 'config/');
        define('VENDOR_PATH', ROOT_PATH . 'vendor/');
        define('URL', 'http://www.framework.com');
    }

    // 加载配置文件
    private static function set_config()
    {
        // 全局变量$config保存配置文件
        global $config;
        $config = include CONFIG_PATH . 'config.php';
//        var_dump($config);
    }

    // 错误控制
    private static function set_error()
    {
        // 读配置
        global $config;
//        var_dump($config);
        @ini_set('error_reporting', $config['system']['error_reporting']);
        @ini_set('display_errors', $config['system']['displat_errors']);
    }

    // 解析url
    private static function set_url()
    {
        // 解析请求的controller、action
        $c = $_REQUEST['c'] ?? 'Index';     // 默认IndexController
        $a = $_REQUEST['a'] ?? 'Index';     // 默认Index方法

        // 保存为常量
        define('C', $c);
        define('A', $a);
    }

    // 自动加载
    private static function set_autoload_function($class)
    {
        $class = basename($class);

        // 核心类加载
        $path = CORE_PATH . $class . '.php';
        if (file_exists($path)) include_once $path;

        // 控制器和模型加载
        $path = CONTROLLER_PATH . $class . '.php';
        if (file_exists($path)) include_once $path;

        $path = MODEL_PATH . $class . '.php';
        if (file_exists($path)) include_once $path;

        // 外部类加载
        $path = VENDOR_PATH . $class . '.php';
        if (file_exists($path)) include_once $path;
    }

    // 注册自动加载
    private static function set_autoload()
    {
        spl_autoload_register(array(__CLASS__, 'set_autoload_function'));
    }

    // 分发请求
    private static function set_dispatch()
    {
        // 获取请求的控制器和方法
        $c = C;
        $action = A;

        // 补全
        $controller = '\\app\\Controller\\' . $c . 'Controller';

        // 调用控制器执行方法处理请求
        if (!class_exists($controller)) {
            die('Controller ' . $controller . ' 不存在');
        }

        if (!method_exists($controller, $action)) {
            die('Action ' . $action . '() in ' . $controller . ' 不存在');
        }

        $controller_inst = new $controller();
        $controller_inst->$action();
    }

}