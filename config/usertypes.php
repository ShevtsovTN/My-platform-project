<?php
return [
    0 => [
        [
            'name' => 'Superagents',
            'group' => 1,
            'relation' => 'App\Models\SuperAgent'
        ],
    ],
    1 => [
        [
            'name' => 'agents',
            'group' => 2,
            'relation' => 'App\Models\Agent'
        ]
    ],
    2 => [
        [
            'name' => 'dillers',
            'group' => 3,
            'relation' => 'App\Models\Diller'
        ]
    ],
    3 => [
        [
            'name' => 'halls',
            'group' => 4,
            'relation' => 'App\Models\Hall'
        ]
    ],
    4 => [
        [
            'name' => 'terminals',
            'group' => 5,
            'relation' => 'App\Models\Terminal'
        ]
    ],
];
