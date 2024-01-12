<?php

namespace App\Models;

require_once __DIR__ . '/CRUDBaseModel.php';

use App\Models\CRUDBaseModel;

class Post extends CRUDBaseModel
{
    public function __construct()
    {
        // Mengirimkan nama tabel 'users' ke constructor parent class CRUDBaseModel
        parent::__construct('posts');
    }
}
