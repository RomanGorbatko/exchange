<?php
/**
 * Created by PhpStorm.
 * User: romangorbatko
 * Date: 7/21/17
 * Time: 2:53 PM
 */

namespace RG\Provider;

/**
 * Class GoogleProvider
 * @package RG\Provider
 */
class GoogleProvider implements ProviderInterface
{
    /**
     * @param string $from
     * @param string $to
     * @param float $amount
     * @return float
     */
    public function convert(string $from, string $to, float $amount): float
    {
        $url  = 'https://www.google.com/finance/converter?a=' . $amount . '&from=' . $from . '&to=' . $to;
        $data = file_get_contents($url);

        preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
        $converted = preg_replace("/[^0-9.]/", "", $converted[1]);

        return round($converted, 3);
    }
}