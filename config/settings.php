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
            ['name' => 'terminal_balance','title' => 'Allow to change the balance of players', 'type' => 'checkbox'],
            ['name' => 'disable_edit_bonus_promo','title' => 'Disable editing bonus promotional codes', 'type' => 'checkbox'],
            ['name' => 'minimum_rtp','title' => 'Minimum RTP', 'type' => 'select', 'options' => [85 => 85, 90 => 90, 95 => 95]],
        ],
    ],
    '3' => [
        'base' => [
            ['name' => 'terminal_balance','title' => 'Allow to change the balance of players', 'type' => 'checkbox'],
            ['name' => 'disable_edit_bonus_promo','title' => 'Disable editing bonus promotional codes', 'type' => 'checkbox'],
        ],
        'autocreatehall' => [
            ['name' => 'cashout_in_game','title' => 'Allow write-offs while playing', 'type' => 'checkbox'],
            ['name' => 'cashout_all','title' => 'Allow full write-off only', 'type' => 'checkbox'],
        ],
        'jackpots' => [
            ['name' => 'one_jackpot','title' => 'Global JACKPOT', 'type' => 'checkbox'],
        ],
        'casino' => [
            ['name' => 'casino_out_payment_visa-mastercard','title' => 'Visa\MasterCard', 'type' => 'checkbox'],
            ['name' => 'casino_out_payment_qiwi','title' => 'QiWi', 'type' => 'checkbox'],
            ['name' => 'casino_out_payment_paykassa','title' => 'Paykassa', 'type' => 'checkbox'],
        ],
    ],
    '4' => [
        'base' => [
            ['name' => 'cashout_in_game','title' => 'Allow write-offs while playing', 'type' => 'checkbox'],
            ['name' => 'cashout_all','title' => 'Allow full write-off only', 'type' => 'checkbox'],
            ['name' => 'minimum_rtp','title' => 'Minimum RTP', 'type' => 'select', 'options' => [85 => 85, 90 => 90, 95 => 95]],
        ],
        'bonuses' => [
            ['name' => 'disable_bonus_promo','title' => 'Disable bonus promotional codes', 'type' => 'checkbox'],
        ],
        /*'gamelabels' => [
            ['name' => 'caleta','title' => 'Caleta', 'type' => 'checkbox'],
            ['name' => 'xgames','title' => 'Xgames', 'type' => 'checkbox'],
        ],*/
        /*'jackpots' => [
            ['name' => 'HallSetting1','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting2','title' => 'Title', 'type' => 'checkbox'],
            ['name' => 'HallSetting3','title' => 'Title', 'type' => 'checkbox'],
        ]*/
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
