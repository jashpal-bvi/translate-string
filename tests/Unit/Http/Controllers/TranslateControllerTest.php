<?php
/**
 * TranslateControllerTest
 * PHP version 7.3
 *
 * @category Test/Unit
 * @package  Tests\Unit\Http\Controllers
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Services\TranslationService;
use Mockery;

/**
 * Class TranslateControllerTest
 *
 * @category Test/Unit
 * @package  Tests\Unit\Http\Controllers
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
class TranslateControllerTest extends TestCase
{
    /**
     * @var TranslationService
     */
    private $mockTranslationService;
    /**
     * The setUp function that arranges the tests
     *
     * @author Brainvire Inc. <https://www.brainvire.com/>
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->mockTranslationService = Mockery::mock(TranslationService::class);
        $this->app->instance(TranslationService::class, $this->mockTranslationService);
    }

    /**
     * Tests that the translate method returns success
     *
     * @return void
     */
    public function testStringTranslate(): void
    {
        $response = ['success' => false, 'error' => true, 'message' => ''];
        $this->mockTranslationService->shouldReceive('stringTranslate')->andReturn($response);

        $data = ['content' => 'dog','source' => 'en','target' => 'es'];
        $response = $this->postJson('/api/translate', $data);
        $response->assertStatus(200);
    }
}
