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

namespace BIESIOR\Geopicker\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * GeopickerController
 */
class GeopickerController {

    /**
     * @param ServerRequestInterface $request the current request
     * @return ResponseInterface the response with the content
     */
    public function mainAction(ServerRequestInterface $request)//: ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        if (!isset($queryParams['P']) || empty($queryParams['P'])) {
            return new Response('php://temp', 400);
        }
        $p = $queryParams['P'];

        $latField = $p['latField'];
        $lonField = $p['lonField'];
        $table = $p['table'];
        $uid = $p['uid'];
        $elevationField = $p['elevField'];
        $elevationUnit = $p['elevUnit'];
        if ($elevationUnit !== 'feet') $elevationUnit = 'meters';
        $apikey = $p['apikey'];

        $data = [];
        $data['latField'] = $latField;
        $data['lonField'] = $lonField;
        $data['elevationField'] = $elevationField;
        $data['dataLatField'] = "data[$table][$uid][$latField]";
        $data['dataLonField'] = "data[$table][$uid][$lonField]";
        $data['dataElevationField'] = "data[$table][$uid][$elevationField]";
        $data['table'] = $table;
        $data['elevationUnit'] = $elevationUnit;
        $data['apikey'] = $apikey;

        $funcs = "
            window.opener.typo3form.fieldGet('data[$table][2][lat]', 'trim', '', 1, '');
            window.opener.typo3form.fieldGet('data[$table][2][lon]', 'trim', '', 1, '');
            window.opener.TBE_EDITOR.fieldChanged('$table', '$uid', 'lat', 'data[$table][$latField][lat]');
            window.opener.TBE_EDITOR.fieldChanged('$table', '$uid', 'lon', 'data[$table][$latField][lon]');
        ";
        $data['funcs'] = $funcs;

        $template = 'EXT:geopicker/Resources/Private/Standalone/GeoPickerWizard.html';
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName($template));
        $view->assign('data', $data);
        $rendered = $view->render();

        // Use HtmlResponse once we drop support for TYPO3 v7/v8
        $response = new Response;
        $response->getBody()->write($view->render());

        return $response;
    }
}
