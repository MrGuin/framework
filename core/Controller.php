<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2019/7/10
 * Time: 19:43
 */

namespace Core;

use Smarty;

class Controller
{
    protected $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();

        // 设置Smarty
        $this->smarty->template_dir = VIEW_PATH;
        $this->smarty->caching = false;
        $this->smarty->cache_dir = ROOT_PATH . 'cache';
        $this->smarty->cache_lifetime = 120;
        $this->smarty->compile_dir = ROOT_PATH . 'template_c';
    }

    // 封装方法
    protected function assign($key, $value)
    {
        $this->smarty->assign($key, $value);
    }

    protected function display($file)
    {
        $this->smarty->display($file);
    }

    // 成功和错误跳转提示
    protected function success($msg, $jump_c = C, $jump_a = A, $wating_time = 3)
    {
        $refresh = 'Refresh:' . $wating_time . ';url=' . URL . '/index.php?c=' . $jump_c . '&a=' . $jump_a;
        header($refresh);
        echo $msg;
        exit;
    }

}