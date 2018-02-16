<?php
return [
    // Register link wizard
    'wizard_geopicker' => [
        'path' => '/wizard/geopicker',
        'target' => \BIESIOR\Geopicker\Controller\GeopickerController::class . '::mainAction'
    ],
];
