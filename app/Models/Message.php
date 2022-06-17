<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'send_from',
        'send_to',
        'trainer_id',
        'trainee_id',
        'message',
        'created_at'
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function trainee()
    {
        return $this->belongsTo(User::class, 'trainee_id');
    }

    public function msgSendFromTrainee()
    {
        return $this->belongsTo(User::class,'send_from');
    }
}
