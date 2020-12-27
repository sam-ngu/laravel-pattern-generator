<?php

namespace Acadea\Boilerplate\Tests\Features\Controller;

use Acadea\Boilerplate\Tests\Helpers\StringHelper;
use Acadea\Boilerplate\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ControllerTest extends TestCase
{
    // test controller generated is ok
    public function setUp(): void
    {
        parent::setUp();
        // generate a test controller based on fake model

        Artisan::call('boilerplate:controller PostController --api --force');
    }

    public function test_generated_controller_is_correct()
    {
        // get controller instance
        $path = __DIR__ . '/../../../vendor/orchestra/testbench-core/laravel/app/Http/Controllers/Api/V1/PostController.php';
        $file = File::get($path);

        $sourceOfTruth = File::get(self::TEST_ASSERT_FILES_PATH . '/PostController.php');
        // verify generated file is the same as source of truth
        $this->assertEquals(StringHelper::clean($sourceOfTruth), StringHelper::clean($file), 'not the same as known truth');
    }

}
