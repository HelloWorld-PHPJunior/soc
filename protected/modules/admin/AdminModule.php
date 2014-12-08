<?php
/**
 * Created by PhpStorm.
 * User: danya
 * Date: 01.12.14
 * Time: 21:34
 */

class AdminModule extends  CWebModule
{
    public function init()
    {
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
    }
} 