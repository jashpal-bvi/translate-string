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

use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseTrait
 *
 * @category App\Http\Traits
 * @package  Brainvire Inc.
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
trait ResponseTrait
{

    /**
     * purpose Response
     * @param array $data
     * @param boolean $success
     * @param boolean $error
     * @param int $code
     * @author Brainvire Inc. <https://www.brainvire.com/>
     * @return string \Illuminate\Http\Response
     */
    public function response($data = null, $success = true, $error = false, $code = 200): JsonResponse
    {
        $meta = [
            'success' => $success,
            'error' => $error,
            'translation' => $data
        ];
        return response()->json($meta, $code);
    }

    /**
     * purpose Response - Server side validation error message
     * @param object $validation
     * @param string $message
     * @param int $code
     * @author Brainvire Inc. <https://www.brainvire.com/>
     * @return string \Illuminate\Http\Response
     */
    public function validationError($validation, $message = 'VALIDATION_ERROR', $code = 422): JsonResponse
    {
        $fieldMessages = $validation->errors();
        $meta = [
            'status' => false,
            'error' => $fieldMessages,
            'message' => $message,
            'status_code' => 422
        ];
        return response()->json($meta, $code);
    }
}
