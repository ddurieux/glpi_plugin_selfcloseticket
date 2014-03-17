<?php

/*
   ------------------------------------------------------------------------
   Selfcloseticket
   Copyright (C) 2009-2014 by the Selfcloseticket plugin Development Team.

   https://
   ------------------------------------------------------------------------

   LICENSE

   This file is part of selfcloseticket plugin project.

   Plugin Selfcloseticket is free software: you can redistribute it and/or modify
   it under the terms of the GNU Affero General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   Plugin Selfcloseticket is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
   GNU Affero General Public License for more details.

   You should have received a copy of the GNU Affero General Public License
   along with Plugin Selfcloseticket. If not, see <http://www.gnu.org/licenses/>.

   ------------------------------------------------------------------------

   @package   Plugin Selfcloseticket
   @author    David Durieux
   @co-author
   @copyright Copyright (c) 2009-2014 Selfcloseticket plugin Development team
   @license   AGPL License 3.0 or (at your option) any later version
              http://www.gnu.org/licenses/agpl-3.0-standalone.html
   @link      https://forge.indepnet.net/projects/barscode
   @since     2014

   ------------------------------------------------------------------------
 */

define ("PLUGIN_SELFCLOSETICKET_VERSION", "0.84+1.0");

// Init the hooks of the plugins -Needed
function plugin_init_selfcloseticket() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['selfcloseticket'] = true;

   // Params : plugin name - string type - ID - Array of attributes
   Plugin::registerClass('PluginSelfcloseticketTicket',
              array('addtabon' => array('Ticket')));

}


// Get the name and the version of the plugin - Needed
function plugin_version_selfcloseticket() {

   return array('name'           => 'Selfcloseticket',
                'shortname'      => 'selfcloseticket',
                'version'        => PLUGIN_SELFCLOSETICKET_VERSION,
                'license'        => 'AGPLv3+',
                'author'         => '<a href="mailto:d.durieux@siprossii.com">David DURIEUX</a>',
                'homepage'       => 'https://',
                'minGlpiVersion' => '0.84');// For compatibility / no install in version < minGlpiVersion
}


// Optional : check prerequisites before install : may print errors or add to message after redirect
function plugin_selfcloseticket_check_prerequisites() {


   if (version_compare(GLPI_VERSION,'0.84','lt') || version_compare(GLPI_VERSION,'0.85','ge')) {
      echo __('GLPI version not compatible need 0.84.x', 'barcode');
      return false;
   }
   return true;
}


// Check configuration process for plugin : need to return true if succeeded
// Can display a message only if failure and $verbose is true
function plugin_selfcloseticket_check_config($verbose=false) {
   return true;
}

?>
