<?php

namespace App\Http\Services\Translations;

use App\Http\TranslateInterface\StringTranslateInterface;
use App\Http\Traits\CurlTrait;
use Exception;

/**
 * @category Service
 * @package  App\Services\Translations\GoogleService
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
class GoogleService implements StringTranslateInterface
{
    use CurlTrait;

    /**
     * Translate string
     * @param String $content
     * @param String $sourceLang
     * @param String $targetLang
     * @return array
     * @throws Exception
     */
    public function stringTranslate(String $content, String $sourceLang, String $targetLang): array
    {
        try {
            $requestData = [
                'q' => $content,
                'source' => $sourceLang,
                'target' => $targetLang,
                'format' => "text"
            ];
            $url = env('GOOGLE_TRANSLATE_URL').'?key='.env('GOOGLE_TRANSLATE_KEY');
            $result = $this->sendHttpPostUsinGuzzel($url, $requestData);
            $messages = isset($result['error']['message']) ? $result['error']['message'] : '';
            $response = ['success' => false, 'error' => true, 'message' => $messages];
            if (isset($result['data']['translations'])) {
                $response = ['success' => true, 'error' => false, 'message' => $result['data']['translations'][0]['translatedText']];
            }
            return $response;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
