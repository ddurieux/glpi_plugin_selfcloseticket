<?php

include ("../../../inc/includes.php");

// Close the ticket
if (!isset($_POST['id'])) {
   Html::back();
}

$ticket = new Ticket();
if ($ticket->getFromDB($_POST['id'])) {
   $input = array(
       'id'     => $_POST['id'],
       'status' => Ticket::CLOSED
   );
   $ticket->update($input);
}
Html::back();

?>
