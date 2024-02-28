<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'displayName',
        'email',
        'password',
        'photoURL',
        'role',
        'type',
    ];
}

?>