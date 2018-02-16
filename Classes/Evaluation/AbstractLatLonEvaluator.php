<?php
namespace BIESIOR\Geopicker\Evaluation;

/**
 * AbstractLatLonEvaluator
 *
 * @author Benjamin Franzke <bfr@qbus.de>
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
abstract class AbstractLatLonEvaluator
{
    /**
     * @return int 90 or 180
     */
    abstract protected function getLimit();

    /*
     * @return string JavaScript code for evaluating the
     */
    public function returnFieldJS()
    {
        $limit = $this->getLimit();
        return '
    var theVal = "" + value;
    theVal = theVal.replace(/[^0-9,\.-]/g, "");
    var negative = theVal.substring(0, 1) === "-";
    theVal = theVal.replace(/-/g, "");
    theVal = theVal.replace(/,/g, ".");
    if (theVal.indexOf(".") == -1) {
        theVal += ".0";
    }
    var parts = theVal.split(".");
    var dec = parts.pop();
    var maybeNumber = parts.join("") + "." + dec;
    if (maybeNumber === ".0") return "";
    theVal = Number(maybeNumber);
    if (negative) {
        theVal *= -1;
    }
    theVal = theVal.toFixed(6);
    if (theVal < -' . $limit . ' || theVal > ' . $limit . ') theVal = "";
    return theVal;
';
    }

    /**
     * @param mixed $value The value that has to be checked.
     * @param string $is_in Is-In String
     * @param bool $set Determines if the field can be set (value correct) or not, e.g. if input is required but the value is empty, then $set should be set to FALSE. (PASSED BY REFERENCE!)
     * @return string The new value of the field
     */
    public function evaluateFieldValue($value, $is_in, &$set) {
            $limit = $this->getLimit();
        if ($value < -$limit || $value > $limit) $value = null;
        if ($value == '') $value = null;
        return $value;
    }
}
