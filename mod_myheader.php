<?php

/**
 * @module	MY Header
 * @author	Chris Vaughan
 * @website	http://cevsystems.co.uk/
 * @copyright	Copyright (C) 2023 Chris Vaughan chris@cevsystems.co.uk All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined( "_JEXEC" ) or die( "Restricted access" );

$class = $params->get('moduleclass_sfx');
if ($class === null) {
    $class = '';
}
$moduleclass_sfx = htmlspecialchars($class);

require(JModuleHelper::getLayoutPath('mod_myheader', $params->get('layout', 'default')));

