<?php

/**
 * Controller
 * PHP version 7.3
 *
 * @category App\Http\Controllers
 * @package  Brainvire
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TranslationService;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\ResponseTrait;
use Validator;

/**
 * Class TranslateController
 *
 * @category App\Http\Controllers
 * @package  Brainvire Inc.
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
class TranslateController extends Controller
{
    use ResponseTrait;

    /**
     * @var TranslationService
     */
    private $translationService;
    /**
     * Create a new controller instance.
     */
    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    /**
     * Display a listing of the resource done.
     * @param \Illuminate\Http\Request $request
     * @author   Brainvire Inc. <https://www.brainvire.com/>
     * @return \Illuminate\Http\Response
     */
    public function stringTranslate(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), config('validations.translate'));
        if ($validation->fails()) {
            return $this->validationError($validation);
        }
        $serviceType = 'Google';
        if (!empty($request->get('service_type'))){
            $serviceType = $request->get('service_type');
        }
        $content = $request->get('content');
        $sourceLang = $request->get('source');
        $targetLang = $request->get('target');
        
        try {
            $this->translationService->serviceType = $serviceType;
            $response = $this->translationService->stringTranslate($content, $sourceLang, $targetLang);
            return $this->response($response['message'], $response['success'], $response['error']);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
