<?php

namespace App\Http\TranslateInterface;

/**
 * Interface StringTranslateInterface
 *
 * @category App\Http\TranslateInterface
 * @package  Brainvire Inc.
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
interface StringTranslateInterface
{
    /**
     * Translate text into diffrent languages
     * @param String $content
     * @param String $sourceLang
     * @param String $targetLang
     * @return array
     */
    public function stringTranslate(String $content, String $sourceLang, String $targetLang): array;

}
