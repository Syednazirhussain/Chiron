<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferPayment extends Model
{
    use HasFactory;

    public function transferredTo()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'transferred_to');
    }
    
    public function transferredBy()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'transferred_by');
    }

    public function session()
    {
        return $this->hasOne(\App\Models\TrainingSessions::class, 'id', 'session_id');
    }

}
