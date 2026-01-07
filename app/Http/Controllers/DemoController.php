<?php

namespace App\Http\Controllers;

use Generator;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DemoController extends Controller
{
    public function __invoke(): StreamedResponse
    {
        $message = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dolore quo vero sunt magni voluptates esse facere voluptate neque laboriosam nisi eum, necessitatibus, maiores, a officia quas voluptatibus ea fugit.";
        $chunks = str_split($message, 6);
        return response()->stream(function () use ($chunks): Generator {
            foreach ($chunks as $chunk) {
                yield $chunk;
                usleep(100_000);
            }
        });
    }
}
