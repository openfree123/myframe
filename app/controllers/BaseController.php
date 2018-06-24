<?php
/**
 * File: BaseController.php
 * Author: frame@it163.org
 * Date: 18/6/23 14:57
 * Link: http://www.it163.org/
 */

namespace app\controllers;

use Smarty;


class BaseController
{

    private $smarty;

    public function __construct()
    {
        $this->initSmarty();

    }

    public function initSmarty()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(APP_ROOT . '/app/storage/views');
        $this->smarty->setCacheDir(APP_ROOT . '/app/storage/views');
        $this->smarty->setCompileDir(APP_ROOT . '/app/storage/views');

    }

    public function assign($name, $value)
    {
        $this->smarty->assign($name, $value, $nocache = false);
    }

    public function render($template, array $parameters)
    {
        $tplFile = APP_ROOT . '/app/views/' . $template;
        foreach ($parameters as $parameter => $value)
        {
            $this->assign($parameter, $value);
        }
        $this->smarty->display("{$tplFile}.tpl");
    }

    public function redirect($path)
    {
        $url = sprintf("%s://%s/%s", $_SERVER['REQUEST_SCHEME'], $_SERVER['HTTP_HOST'], $path);
        header("Location: {$url}");
        exit();
    }

}