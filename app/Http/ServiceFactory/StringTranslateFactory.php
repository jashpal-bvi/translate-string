<?php

namespace App\Http\ServiceFactory;

use App\Http\TranslateInterface\StringTranslateInterface;
use App\Http\Services\Translations\GoogleService;
use Illuminate\Foundation\Application;
use Exception;

/**
 * Class StringTranslateFactory
 * @package App\ServiceFactory
 */
class StringTranslateFactory
{
    /**
     * @var Application
     */
    private $app;
    /**
     * StringTranslateFactory constructor.
     * @param Application $app
     */
    public function __construct(Application $app) {
        $this->app = $app;
    }

    /**
     * Create dynamic instance based on given services type
     * @param string $services
     * @return StringTranslateInterface
     * @throws Exception
     */
    public function makeInstance(String $services): StringTranslateInterface
    {
        $class = null;
        switch ($services) {
            case 'Google':
                $class = GoogleService::class;
                break;
            default:
                break;
        }
        if (empty($class)) {
            throw new Exception('No translate service found.');
        }
        $instance = $this->app->make($class);
        return $instance;
    }
}
