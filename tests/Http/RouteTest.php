<?php

namespace Tests\Http;

use Illuminate\Foundation\Application;
use ModuleBeta\Beta\Providers\BetaServiceProvider;
use Orchestra\Testbench\TestCase;

class RouteTest extends TestCase
{
    /**
         * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BetaServiceProvider::class,
        ];
    }
    /**
     * @test
     */
    public function get_beta()
    {
        $response = $this->get(route('beta'));

        $response->assertDontSee('alpha');
        $response->assertSee('beta');
        $response->assertSee(config('module_beta.text'));
    }
}
