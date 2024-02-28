<?php

namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = "replies";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'ticket_id',
        'replyBy',
        'message',
        'messageAt',
    ];
    protected $returnType = 'App\Entities\ReplyEntity';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    // Relationships
    protected $belongsTo = [
        'ticket' => [
            'model' => 'TicketModel',
            'foreign_key' => 'ticket_id',
        ],
        'user' => [
            'model' => 'UserModel',
            'foreign_key' => 'replyBy',
        ],
    ];
}

?>