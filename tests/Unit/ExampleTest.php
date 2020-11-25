<?php

namespace Tests\Unit;
use App\MyStorage\FileSystem;
use App\MyStorage\Keyword;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function testBasicTest()
    {
        $R = preg_replace('/[^\w\d\s]/', '_', 'Là@#m saotoo tôi biết');
       echo $R;


    }

}
