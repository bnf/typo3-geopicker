<?php


/*                                                                        *
 * This script is backported from the TYPO3 Flow package "TYPO3.Fluid".   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */


namespace BIESIOR\Geopicker\ViewHelpers;
use BIESIOR\Geopicker\Utils\GeopickerUtils;

/**
 *  Add the namespace to your view:
 *
 * {namespace geopicker=BIESIOR\Geopicker\ViewHelpers}
 *
 * Validates if latitude is in range: -90° to 90° and longitude is in range -180° to 180°
 *
 * It's based on <f:if> VH, so you can use <f:then> and <f:else> blocks inside
 *
 */
class IfValidViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper {

    /**
     * renders <f:then> child if coordinates are valid, otherwise renders <f:else> child.
     *
     * @param mixed $latitude
     * @param mixed $longitude
     *
     * @return string the rendered string
     * @api
     */
    public function render($latitude, $longitude) {
        if (GeopickerUtils::areCoordinatesValid($latitude, $longitude)) {
            return $this->renderThenChild();
        } else {
            return $this->renderElseChild();
        }
    }
}
