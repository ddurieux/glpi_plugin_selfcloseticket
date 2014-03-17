<?php

include ("../../../inc/includes.php");

// Close the ticket
if (!isset($_POST['id'])) {
   Html::back();
}

$ticket = new Ticket();
$ticketFollowup = new TicketFollowup();
if ($ticket->getFromDB($_POST['id'])) {
   $input = array(
       'tickets_id' => $_POST['id'],
       'content'    => "Fermé par le demandeur"
   );
   $ticketFollowup->add($input);

   $input = array(
       'id'     => $_POST['id'],
       'status' => Ticket::CLOSED
   );
   $ticket->update($input);
}
Html::back();

?>
