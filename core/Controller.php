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
        var_dump(class_exists('Smarty'));

        if (class_exists('Smarty')) {
            $this->smarty = new Smarty();
        }

        // 设置Smarty
//        $this->smarty->template_dir = VIEW_PATH;
//        $this->smarty->caching = false;
//        $this->smarty->cache_dir = ROOT_PATH . 'cache';
//        $this->smarty->cache_lifetime = 120;
//        $this->smarty->compile_dir = ROOT_PATH . 'template_c';
    }


}