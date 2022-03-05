<?php

namespace App\Http\Services;

use App\Http\TranslateInterface\StringTranslateInterface;
use App\Http\ServiceFactory\StringTranslateFactory;
use Exception;

/**
 * @category Service
 * @package  App\Services\TranslationService
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
class TranslationService implements StringTranslateInterface
{
    /**
     * @var ServiceType
     */
    public $serviceType;
    /**
     * @var StringTranslateFactory
     */
    private $stringTranslateFactory;
    /**
     * Create a new controller instance.
     */
    public function __construct(StringTranslateFactory $stringTranslateFactory)
    {
        $this->stringTranslateFactory = $stringTranslateFactory;
    }
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
            $instance = $this->stringTranslateFactory->makeInstance($this->serviceType);
            return $instance->stringTranslate($content, $sourceLang, $targetLang);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
