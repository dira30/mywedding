<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestbookModel extends Model
{
    protected $table = 'guestbook';

    protected $allowedFields = [
        'name', 'ucapan','createdAt'
    ];
}
