<?php

namespace App\Controllers;

use App\Models\ReplyModel;
use App\Models\TicketsModel;
use App\Models\UserModel;

class Tickets extends BaseController
{
    public function getTickets()
    {
        try {
            $ticketModel = new TicketsModel();
            $replyModel = new ReplyModel();
            $userID = $this->request->getVar('userID');

            $tickets = $ticketModel
                ->where('openBy', $userID)
                ->get()
                ->getResultArray();

            foreach ($tickets as &$ticket) {
                $ticket['replies'] = $replyModel
                    ->join('Tickets', 'replies.ticket_id = Tickets.id')
                    ->where('Tickets.id', $ticket['id'])
                    ->get()
                    ->getResultArray();
            }

            $data = ["tickz" => $tickets, "success" => true];
            return $this->response->setJSON($data);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->response->setJSON(['error' => $th]);
        }
    }


}
