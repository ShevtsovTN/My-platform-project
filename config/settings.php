<?php

return [
    '0' => [
        'base' => [
            ['name' => 'AdminSetting1', 'type' => 'select', 'options' => [0 => 'off', 1 => 1, 2 => 2]],
            ['name' => 'AdminSetting2', 'type' => 'checkbox'],
            ['name' => 'AdminSetting3', 'type' => 'text'],
            ['name' => 'AdminSetting4', 'type' => 'number', 'format' => 'float'],
        ]
    ],
    '1' => [
        'base' => [
            ['name' => 'SuperagentBaseSetting1', 'type' => 'select', 'options' => [0 => 'off', 1 => 1, 2 => 2]],
            ['name' => 'SuperagentBaseSetting2', 'type' => 'checkbox'],
            ['name' => 'SuperagentBaseSetting3', 'type' => 'text'],
        ],
    ],
    '2' => [
        'base' => [
            ['name' => 'AgentSetting1', 'type' => 'checkbox'],
            ['name' => 'AgentSetting2', 'type' => 'checkbox'],
            ['name' => 'AgentSetting3', 'type' => 'checkbox'],
        ],
    ],
    '3' => [
        'base' => [
            ['name' => 'DillerSetting1', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3', 'type' => 'checkbox'],
        ],
        'autocreatehall' => [
            ['name' => 'DillerSetting1', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3', 'type' => 'checkbox'],
        ],
        'jackpots' => [
            ['name' => 'DillerSetting1', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3', 'type' => 'checkbox'],
        ],
        'casino' => [
            ['name' => 'DillerSetting1', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3', 'type' => 'checkbox'],
        ],
    ],
    '4' => [
        'base' => [
            ['name' => 'HallSetting1', 'type' => 'checkbox'],
            ['name' => 'HallSetting2', 'type' => 'checkbox'],
            ['name' => 'HallSetting3', 'type' => 'checkbox'],
        ],
        'bonuses' => [
            ['name' => 'HallSetting1', 'type' => 'checkbox'],
            ['name' => 'HallSetting2', 'type' => 'checkbox'],
            ['name' => 'HallSetting3', 'type' => 'checkbox'],
        ],
        'gamelabels' => [
            ['name' => 'HallSetting1', 'type' => 'checkbox'],
            ['name' => 'HallSetting2', 'type' => 'checkbox'],
            ['name' => 'HallSetting3', 'type' => 'checkbox'],
        ],
        'jackpots' => [
            ['name' => 'HallSetting1', 'type' => 'checkbox'],
            ['name' => 'HallSetting2', 'type' => 'checkbox'],
            ['name' => 'HallSetting3', 'type' => 'checkbox'],
        ]

    ],
    '5' => [
        'base' => [
            ['name' => 'TerminalSetting1', 'type' => 'checkbox'],
            ['name' => 'TerminalSetting2', 'type' => 'checkbox'],
            ['name' => 'TerminalSetting3', 'type' => 'checkbox'],
        ]
    ],
    'self' => [
        'base' => [
            ['name' => 'timezone','title' => 'Timezone', 'type' => 'select','options' => []],
            ['name' => 'email','title' => 'Email', 'type' => 'email'],
            ['name' => 'email_verified','title' => 'Confirmation of authorization by e-mail', 'type' => 'checkbox'],
            ['name' => 'password','title' => 'New Password', 'type' => 'password'],
            ['name' => 'password_confirmation','title' => 'Confirm Password', 'type' => 'password'],
        ]
    ]
];
