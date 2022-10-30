<?php
/**
 * autoloader array for Crystal Bootstrap Observer 
 *
 * @package initSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author brittainmark
 */
$autoLoadConfig[200][] = [
    'autoType'=>'class',
    'loadFile'=>'observers/CrystalBootstrapObserver.php',
    ];
$autoLoadConfig[200][] = [
    'autoType'=>'classInstantiate',
    'className'=>'CrystalBootstrapObserver',
    'objectName'=>'CrystalBootstrapObserver',
    ];