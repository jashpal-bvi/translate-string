<?php
/**
 * Class StringTranslateFactoryTest
 *
 * @category Test/Unit
 * @package  Tests\Unit\Http\ServiceFactory
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
namespace Tests\Unit\Http\ServiceFactory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\ServiceFactory\StringTranslateFactory;
use App\Http\TranslateInterface\StringTranslateInterface;
use Exception;

/**
 * Class StringTranslateFactoryTest
 *
 * @category Test/Unit
 * @package  Tests\Unit\Http\ServiceFactory
 * @author   Brainvire Inc. <https://www.brainvire.com/>
 * @license  https://brainvire.com N/A
 * @link     https://brainvire.com
 */
class StringTranslateFactoryTest extends TestCase
{
    /**
     * @var StringTranslateFactory
     */
    private $factory;
    /**
     * @var String
     */
    private $service;
    /**
     * Bootstrap, setup and initialisation
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->factory = $this->app->make(StringTranslateFactory::class);
        $this->service = 'Google';
    }

    /**
     * Test String Translate Instance
     *
     * @return void
     */
    public function testMakeInstance(): void
    {
        $result = $this->factory->makeInstance($this->service);
        $this->assertInstanceOf(StringTranslateInterface::class, $result);
        $this->assertTrue(true);
    }

    /**
     * Test if makeinstance method return exception
     * @return void
     * @throws Exception
     */
    public function testMakeInstanceException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('No translate service found.');
        $this->factory->makeInstance('test');
    }
}
