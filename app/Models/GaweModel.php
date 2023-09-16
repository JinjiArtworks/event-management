<?php

namespace App\Models;

use CodeIgniter\Model;

class GaweModel extends Model
{
    protected $table = 'gawe';
    protected $useTimeStamps = true;
    protected $allowedFields = ['name', 'date', 'info']; // kasitau ini aja yg boleh diisi
    
}
