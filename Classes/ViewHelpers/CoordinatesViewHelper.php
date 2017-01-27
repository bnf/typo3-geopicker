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

namespace BIESIOR\Geopicker\ViewHelpers;

use BIESIOR\Geopicker\Utils\GeopickerUtils;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Add the namespace to your view:
 *
 * {namespace geopicker=BIESIOR\Geopicker\ViewHelpers}
 *
 * Class CoordinatesViewHelper
 * @package BIESIOR\Geopicker\ViewHelpers
 */
class CoordinatesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * @param mixed $latitude
     * @param mixed $longitude
     *
     * @return string
     */
    public function render($latitude, $longitude) {
        if (!GeopickerUtils::areCoordinatesValid($latitude, $longitude)) {
            return LocalizationUtility::translate('validationError', 'geopicker');
        }

        return GeopickerUtils::decimalRounded($latitude, $longitude);
    }

}