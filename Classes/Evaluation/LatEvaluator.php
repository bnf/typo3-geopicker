<?php
namespace BIESIOR\Geopicker\Evaluation;

/**
 * LatEvaluator
 *
 * @author Benjamin Franzke <bfr@qbus.de>
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class LatEvaluator
{
    /**
     * @return int
     */
    protected function getLimit()
    {
        return 90;
    }
}
