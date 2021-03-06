<?php
/**
 * Created by PhpStorm.
 * User: romangorbatko
 * Date: 7/21/17
 * Time: 2:54 PM
 */

namespace RG\Provider;

/**
 * Class YahooProvider
 * @package RG\Provider
 */
class YahooProvider implements ProviderInterface
{
    /**
     * @param string $from
     * @param string $to
     * @param float $amount
     * @return float
     */
    public function convert(string $from, string $to, float $amount): float
    {
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$from. $to.'")';
        $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
        $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
        $yql_session = file_get_contents($yql_query_url);
        $yql_json =  json_decode($yql_session, true);

        return (float) $amount * $yql_json['query']['results']['rate']['Rate'];
    }
}