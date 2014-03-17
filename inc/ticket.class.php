<?php

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

class PluginSelfcloseticketTicket {

   static function getTypeName($nb=0) {
      return "";
   }



   /**
    * Display tab
    *
    * @param CommonGLPI $item
    * @param integer $withtemplate
    *
    * @return varchar name of the tab(s) to display
    */
   function getTabNameForItem(CommonGLPI $item, $withtemplate=0) {

      if ($item->getID() > 0) {
         if ($_SESSION['glpiactiveprofile']['interface'] == 'helpdesk') {
            if ($item->fields['status'] != Ticket::SOLVED
                    && $item->fields['status'] != Ticket::CLOSED) {
               return 'Clôturer le ticket';
            }
         }
      }
      return '';
   }



   /**
    * Display content of tab
    *
    * @param CommonGLPI $item
    * @param integer $tabnum
    * @param interger $withtemplate
    *
    * @return boolean TRUE
    */
   static function displayTabContentForItem(CommonGLPI $item, $tabnum=1, $withtemplate=0) {

      if ($item->getID() > 0) {
         $pfTicket = new self();
         $pfTicket->showForm($item->getID());
      }
      return true;
   }



   function showForm($tickets_id) {
      global $CFG_GLPI;

      echo "<form name=cas action='".$CFG_GLPI['root_doc']."/plugins/selfcloseticket/front/ticket.form.php' method='post'>";
      echo "<input type='hidden' name='id' value='".$tickets_id."'>";

      echo "<table class='tab_cadre_fixe'>";

      echo "<tr class='tab_bg_1'>";
      echo "<th colspan='2'>";
      echo "Clôturer le ticket";
      echo "</th>";
      echo "</tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td colspan='2' align='center'>";
      echo "<input type='submit' name='close' value='Clôturer le ticket' class='submit'>";
      echo "</td>";
      echo "</tr>";

      echo "</table>";

      Html::closeForm();

      return true;

   }

}

?>
