<?php

return [
    'uid-manager' => [
        'prefix' => sprintf('a%d', env('SERVER_NUMBER', 0)),
        'entropy' => false,
    ],
];
