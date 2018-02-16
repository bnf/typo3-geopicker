<?php
namespace BIESIOR\Geopicker\Evaluation;

/**
 * LonEvaluator
 *
 * @author Benjamin Franzke <bfr@qbus.de>
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class LonEvaluator
{
    /**
     * @return int
     */
    protected function getLimit()
    {
        return 180;
    }
}
