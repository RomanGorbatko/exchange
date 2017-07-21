<?php
/**
 * Created by PhpStorm.
 * User: romangorbatko
 * Date: 7/21/17
 * Time: 2:43 PM
 */

namespace RG;

use RG\Provider\ProviderInterface;

/**
 * Class Exchange
 * @package RG
 */
class Exchange
{
    /**
     * @param string $name
     * @return ProviderInterface
     */
    public static function getProvider(string $name)
    {
        $provider = '\\RG\\Provider\\' . strtoupper($name) . 'Provider';

        if (!self::checkProviderExists($provider)) {
            throw new \RuntimeException('Provider not Found');
        }

        return new $provider;
    }

    /**
     * @param string $name
     * @return bool
     */
    private static function checkProviderExists(string $name): bool
    {
        return class_exists($name);
    }
}