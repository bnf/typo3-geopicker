<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'GeoPicker',
    'description' => 'BE extension that allows to handle GPS coordinate fields in your own extensions.
It will help you to manage your latitude, longitude and elevation fields via popup wizard which will allow you to geolocate the position on the Google Map.
Also there are ViewHelpers, format converters, TCA validations which will help you to point the point.
For more details check included manual',
    'category' => 'module',
    'version' => '1.3.1',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearcacheonload' => false,
    'author' => 'Marcus Biesioroff',
    'author_email' => 'marcus@biesioroff.com',
    'author_company' => 'Marcus Biesioroff Group',
    'constraints' =>
        array(
            'depends' =>
                array(
                    'typo3' => '7.6.0-8.7.99',
                ),
            'conflicts' =>
                array(),
            'suggests' =>
                array(),
        ),
);

