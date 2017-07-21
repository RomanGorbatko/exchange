<?php
/**
 * Created by PhpStorm.
 * User: romangorbatko
 * Date: 7/21/17
 * Time: 2:44 PM
 */

require_once 'vendor/autoload.php';

use RG\Exchange;


try {
    echo Exchange::getProvider('google')->convert('USD', 'UAH', 800.00);
} catch (\Exception $exception) {
    echo 'Error: ' . $exception->getMessage();
}

//echo Exchange::convert('USD', 'UAH', 800.00);