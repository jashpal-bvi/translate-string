<?php
/**
 * Trait
 * PHP version 7.3
 *
 * @category App\Http\Traits
 * @package  Brainvire Inc.
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */

namespace App\Http\Traits;

/**
 * Trait CurlTrait
 *
 * @category App\Http\Traits
 * @package  Brainvire Inc.
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
trait CurlTrait
{
    /**
     * Send Post Request Using Guzzel Method
     * @param string $url request url
     * @param array $params request parameter
     * @param array $headers request headers detail
     * @return array $result
     */
    public function sendHttpPostUsinGuzzel($url, $params, $headers = []) : array
    {
        $http = new \GuzzleHttp\Client(['http_errors' => false]);

        if (empty($headers)) {
            $headers = ['Accept' => 'application/json'];
        }

        $response = $http->post($url, ['headers' => $headers,'body' => json_encode($params)]);
        $result = json_decode((string) $response->getBody(), true);
        return !empty($result) ? $result : array();
    }
}
