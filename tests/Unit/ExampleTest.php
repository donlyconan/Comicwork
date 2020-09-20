<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function testBasicTest()
    {
        $file = Storage::get('/user');
        dd($file);
    }

}
