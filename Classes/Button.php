<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 16.01.2015
 * Time: 18:51
 */

namespace BIESIOR\Geopicker;


use TYPO3\CMS\Backend\Utility\BackendUtility;

class Button {
    public function render($PA, $fObj) {
        $table = $PA['table'];
        $field = $PA['field'];
        $uid = $PA['row']['uid'];
        $latFieldName = $PA['params']['latField'];
        $lonFieldName = $PA['params']['lonField'];

        $elevationField = $PA['params']['elevation']['field'];
        $elevationUnit = $PA['params']['elevation']['unit'];
        if ($elevationUnit !== 'feet') $elevationUnit = 'meters';
        $apikey = $PA['params']['apikey'];

        $pickFunctionName = "geoPicker('$table', '$uid', '$latFieldName', '$lonFieldName', '$elevationField', '$elevationUnit', '$apikey')";

        $formField = '<div>';
        $formField .= '<input type="button" class="btn btn-default" name="' . $PA['itemFormElName'] . '"';
        $formField .= ' value="Pick"';
        $formField .= " onclick=\"$pickFunctionName\";";
        $formField .= $PA['onFocus'];
        $formField .= ' /></div>';

        // This will include script in non-inline
        $formField .= $this->js($PA, $fObj);

        return $formField;
    }

    public function js($PA, $fObj) {

        $moduleUrl = BackendUtility::getModuleUrl(
            'wizard_geopicker'
        );

        $formField = '

<script>
    if(typeof geoPicker != "function"){
        window.geoPicker= function(table, uid, latField, lonField, elevationField, elevationUnit, apikey){
            var url = "' . $moduleUrl . '";
            url += "&P[table]="+table;
            url += "&P[uid]="+uid;
            url += "&P[latField]="+latField;
            url += "&P[lonField]="+lonField;
            url += "&P[elevField]="+elevationField;
            url += "&P[elevUnit]="+elevationUnit;
            url += "&P[apikey]="+apikey;
            window.open(url, "geoPickerWindow", "width=900,height=600");
        }
    }

</script>

';

        return $formField;
    }

    public function header($PA, $fObj) {
        return $GLOBALS['LANG']->sL($PA['parameters']['description']);
    }


}
