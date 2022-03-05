<?php

namespace App\Http\TranslateInterface;

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
