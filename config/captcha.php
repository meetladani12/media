<?php

return [
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z'],
    'default' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => false,
    ],
    'math' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
    ],

    'flat' => [
        'length' => 5,
        'width' => 160,
        'height' => 46,
        'quality' => 90,
        'lines' => 1,
        'bgImage' => false,
        'bgColor' => '#ecf2f4',
        'fontColors' => ['#330019', '#001933', '#330000', '#000000', '#003333'],
        'contrast' => -5,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 30,
    ],
    'inverse' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 0,
        'invert' => true,
        'contrast' => -5,
    ]
];
