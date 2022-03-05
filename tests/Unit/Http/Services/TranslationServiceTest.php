<?php
/**
 * TranslationServiceTest
 * PHP version 7.3
 *
 * @category Test/Unit
 * @package  Tests\Unit\Http\Services
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
namespace Tests\Unit\Http\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Services\TranslationService;
use App\Http\Services\Translations\GoogleService;
use App\Http\ServiceFactory\StringTranslateFactory;
use Exception;
use Mockery;

/**
 * TranslationServiceTest
 * PHP version 7.3
 *
 * @category Test/Unit
 * @package  Tests\Unit\Http\Services
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
class TranslationServiceTest extends TestCase
{
    /**
     * @var StringTranslateFactory
     */
    private $mockStringTranslateFactory;
    /**
     * @var TranslationService
     */
    private $services;
    /**
     * @var GoogleService
     */
    private $mockInstance;
    /**
     * The setUp function that arranges the tests
     *
     * @author Brainvire Inc. <https://www.brainvire.com/>
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->services = $this->app->make(TranslationService::class);
        $this->services->serviceType = 'Google';

        $this->mockStringTranslateFactory = Mockery::mock(StringTranslateFactory::class);
        $this->app->instance(StringTranslateFactory::class, $this->mockStringTranslateFactory);

        $this->mockInstance = Mockery::mock(GoogleService::class);
    }

    /**
     * Tests that the translate method services
     *
     * @return void
     */
    public function testStringTranslate(): void
    {
        $this->mockStringTranslateFactory->shouldReceive('makeInstance')->andReturn($this->mockInstance);
        
        $content = 'dog';
        $sourceLang = 'en';
        $targetLang = 'es';
        $result = $this->services->stringTranslate($content, $sourceLang, $targetLang);
        
        $this->assertTrue(true);
        $this->assertIsArray($result);
    }
}
