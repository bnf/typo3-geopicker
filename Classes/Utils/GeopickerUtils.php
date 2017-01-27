<?php
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marcus Biesioroff <marcus@biesioroff.com>, Marcus Biesioroff Group
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace BIESIOR\Geopicker\Utils;

define('DEGREES_CHAR', '°'); // Unicode Character 'DEGREE SIGN' (U+00B0)
define('MINUTES_CHAR', '′'); // Unicode Character 'PRIME' (U+2032)
define('SECONDS_CHAR', '″'); // Unicode Character 'DOUBLE PRIME' (U+2033)

class GeopickerUtils {

    /**
     * Converts decimal coordinates to DMS string
     *
     * @param float  $lat
     * @param float  $lon
     * @param int    $elevation Elevation
     * @param bool   $inFeet    If true feet unit will be used
     * @param string $format    Possible formats: display, iso
     *
     * @return string
     */
    public static function decimalToDMS($lat, $lon, $elevation = null, $inFeet = false, $format = 'display') {

        $spaceChar = ', ';
        if ($format == 'iso') $spaceChar = ' ';
        $latArray = self::decToDmsArray($lat, 'N', 'S');
        $lonArray = self::decToDmsArray($lon, 'E', 'W');
        $outArray = array(
            $latArray['deg'] . DEGREES_CHAR . ' ',
            $latArray['min'] . MINUTES_CHAR . ' ',
            $latArray['sec'] . SECONDS_CHAR . ' ',
            $latArray['sign'] . $spaceChar,
            $lonArray['deg'] . DEGREES_CHAR . ' ',
            $lonArray['min'] . MINUTES_CHAR . ' ',
            $lonArray['sec'] . SECONDS_CHAR . ' ',
            $lonArray['sign'],
        );

        $var = implode('', $outArray);
        if (!is_null($elevation)) {
            $elevationWithUnit = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate((($inFeet) ? 'elevationFeetShort' : 'elevationMetersShort'), 'geopicker', array(0 => $elevation));
            if ($format == 'iso') {
                $var .= ' ' . $elevationWithUnit;
            } else {
                $var .= ' (' . $elevationWithUnit . ')';
            }
        }

        return $var;
    }

    /**
     * Converts decimal coordinates to DMS string
     */
    public static function decimalRounded($lat, $lon) {
        $outArray = array(
            number_format($lat, 6),
            ', ',
            number_format($lon, 6)
        );

        return implode('', $outArray);
    }

    /**
     * Converts decimal coordinates to DM string
     */
    public static function decimalToDM($lat, $lon) {
        $latArray = self::decToDmArray($lat, 'N', 'S');
        $lonArray = self::decToDmArray($lon, 'E', 'W');
        $outArray = array(
            $latArray['deg'] . DEGREES_CHAR . ' ',
            $latArray['min'] . MINUTES_CHAR . ' ',
            $latArray['sign'] . ', ',
            $lonArray['deg'] . DEGREES_CHAR . ' ',
            $lonArray['min'] . MINUTES_CHAR . ' ',
            $lonArray['sign'],
        );

        return implode('', $outArray);

    }

    /**
     * Checks if coordinates are valid
     */
    public static function areCoordinatesValid($lat, $lon) {
        $latitude = (float)$lat;
        $longitude = (float)$lon;
        $isValid = (is_numeric($lat) && is_numeric($lon) && $latitude >= -90 && $latitude <= 90 && $longitude >= -180 && $longitude <= 180);

        return $isValid;
    }


    protected function decToDmsArray($floatDeg, $normalDir, $reverseDir) {

        $sign = $normalDir;
        if ($floatDeg < 0) {
            $sign = $reverseDir;
            $floatDeg = -1 * $floatDeg;
        }

        $deg = intval($floatDeg);
        $degDecimal = $floatDeg - $deg;
        $degDecimal = $degDecimal * 3600;
        $min = floor($degDecimal / 60);
        $sec = round($degDecimal - ($min * 60), 4);


        return array("deg" => $deg, "min" => $min, "sec" => $sec, 'sign' => $sign);
    }

    protected function decToDmArray($floatDeg, $normalDir, $reverseDir) {

        $sign = $normalDir;
        if ($floatDeg < 0) {
            $sign = $reverseDir;
            $floatDeg = -1 * $floatDeg;
        }

        $deg = intval($floatDeg);
        $degDecimal = $floatDeg - $deg;
        $degDecimal = $degDecimal * 3600;
        $min = round($degDecimal / 60, 6);


        return array("deg" => $deg, "min" => $min, "sec" => '', 'sign' => $sign);
    }

}