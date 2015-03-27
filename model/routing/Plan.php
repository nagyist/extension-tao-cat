<?php
/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2014 (original work) Open Assessment Technologies SA (under the project TAO-PRODUCT);
 *
 */

namespace oat\taoCat\model\routing;

use oat\oatbox\PhpSerializable;
use tao_models_classes_service_ServiceCall;

/**
 * A Plan describes how a IRT Test will take place. An implementation
 * of Plan will take care of the Route instantiation logic, and set up
 * all additional data describing specific IRT test needs.
 * 
 * An example of specific data would be the weights of each item
 * to be executed. In other words, meta-data.
 * 
 * 
 * @author Joel Bout <joel@taotesting.com>
 * @author Jérôme Bogaerts <jerome@taotesting.com>
 * @see \oat\taoCat\model\Route The Route interface.
 */
interface Plan extends PhpSerializable 
{
    /**
     * Instantiate a Route object to be used to determine
     * which item is the next one in the item flow with respect
     * to the Plan.
     * 
     * @return Route
     * @throws \oat\taoCat\model\PlanException If something goes wrong.
     */
    public function instantiateRoute();
    
    /**
     * Restore a Route object from a string representation of its state.
     * 
     * @param string $stateString The string defining the intrinsic state of the Route object to be restored.
     * @return \oat\taoCat\model\Route
     * @throws \oat\taoCat\model\PlanException If something goes wrong.
     */
    public function restoreRoute($stateString);
    
    /**
     * Persist a Route object into a string representation.
     * 
     * @param Route $route
     * @return string
     * @throws \oat\taoCat\model\PlanException If something goes wrong.
     */
    public function persistRoute(Route $route);
    
    /**
     * Restore the ServiceCall object bound to a given $itemIdentifier.
     * 
     * @return tao_models_classes_service_ServiceCall
     * @throws \oat\taoCat\model\PlanException If something goes wrong.
     */
    public function restoreItemRunner($itemIdentifier);
    
    /**
     * Get the number of items in the item pool.
     * 
     * @return int
     * @throws \oat\taoCat\model\PlanException If something goes wrong.
     */
    public function getItemCount();
}
