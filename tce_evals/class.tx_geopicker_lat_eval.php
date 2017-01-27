<?php

class tx_geopicker_lat_eval {
    function returnFieldJS() {

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
    if (theVal < -90 || theVal > 90) theVal = "";
    return theVal;
';
    }

    function evaluateFieldValue($value, $is_in, &$set) {
        if ($value < -90 || $value > 90) $value = null;
        if ($value == '') $value = null;
        return $value;
    }
}