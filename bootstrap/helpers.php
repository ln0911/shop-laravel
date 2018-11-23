<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/11/26
 * Time: 11:23 AM
 */
function test_helper()
{
    return "test helper";
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}