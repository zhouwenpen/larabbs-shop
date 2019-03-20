<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/20
 * Time: 16:37
 */

function test_helper()
{
    return 'OK';
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}