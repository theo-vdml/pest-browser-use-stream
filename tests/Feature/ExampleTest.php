<?php

test('browser testing on page that use useStream composable', function () {

    visit('/')
        ->click('Click to Start Streaming')
        ->waitForText('Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dolore quo vero sunt magni voluptates esse facere voluptate neque laboriosam nisi eum, necessitatibus, maiores, a officia quas voluptatibus ea fugit.')
        ->debug();
});
