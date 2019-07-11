<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2019/7/10
 * Time: 19:16
 */

namespace app\Controller;

use Core\Controller;

class IndexController extends Controller
{
    // 默认方法
    public function index()
    {
        var_dump($this->smarty);
        echo '欢迎来到Framework!';
    }

    // show方法
    public function show()
    {
        echo '你好';
    }
}