<?php
/**
 * Created by PhpStorm.
 * User: romangorbatko
 * Date: 7/21/17
 * Time: 2:54 PM
 */

namespace RG\Provider;

/**
 * Interface ProviderInterface
 * @package RG\Provider
 */
interface ProviderInterface
{
    public function convert(string $from, string $to, float $amount): float;
}