<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "geopicker".
 *
 * Auto generated 04-02-2015 00:20
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'GeoPicker',
    'description' => 'BE extension that allows to handle GPS coordinate fields in your own extensions.
It will help you to manage your latitude, longitude and elevation fields via popup wizard which will allow you to geolocate the position on the Google Map.
Also there are ViewHelpers, format converters, TCA validations which will help you to point the point.
For more details check included manual',
    'category' => 'module',
    'version' => '0.0.2',
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
                    'typo3' => '6.2.0-6.2.99',
                ),
            'conflicts' =>
                array(),
            'suggests' =>
                array(),
        ),
);

