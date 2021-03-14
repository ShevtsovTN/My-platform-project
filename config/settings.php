<?php

return [
    '0' => [],
    '1' => [
        'base' => [
            ['name' => 'terminal_balance','title' => 'Allow to change the balance of players', 'type' => 'checkbox'],
            ['name' => 'disable_edit_bonus_promo','title' => 'Disable editing bonus promotional codes', 'type' => 'checkbox'],
        ],
    ],
    '2' => [
        'base' => [
            ['name' => 'AgentSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'AgentSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'AgentSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
    ],
    '3' => [
        'base' => [
            ['name' => 'DillerSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
        'autocreatehall' => [
            ['name' => 'DillerSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
        'jackpots' => [
            ['name' => 'DillerSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
        'casino' => [
            ['name' => 'DillerSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'DillerSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
    ],
    '4' => [
        'base' => [
            ['name' => 'HallSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
        'bonuses' => [
            ['name' => 'HallSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
        'gamelabels' => [
            ['name' => 'HallSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting3','title' => 'Title', 'type' => 'checkbox'],
        ],
        'jackpots' => [
            ['name' => 'HallSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting3','title' => 'Title', 'type' => 'checkbox'],
        ]

    ],
    '5' => [
        'base' => [
            ['name' => 'TerminalSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'TerminalSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'TerminalSetting3','title' => 'Title', 'type' => 'checkbox'],
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
