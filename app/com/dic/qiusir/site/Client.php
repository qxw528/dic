<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 3:53 PM
 */

namespace com\dic\qiusir\site;


interface Client
{
    function execute(Request $request):Response;
}