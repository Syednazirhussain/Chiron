<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class TrainingSessions extends Model
{
    public $table = 'training_sessions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'trainee_id',
        'trainer_id',
        'date',
        'start_time',
        'end_time',
        'training_session',
        'location',
        'status',
        'payable_amount',
        'payment_status',
        'cancelled_by',
        'trainingPreference',
        'reschedule',
        'completed_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    public function trainee () {

        return $this->belongsTo(\App\Models\User::class, 'trainee_id');
    }

    public function trainer () {

        return $this->belongsTo(\App\Models\User::class, 'trainer_id');
    }

    public function myTraineesNames()
    {
        return $this->hasMany(\App\Models\User::class, 'id', 'trainee_id');
    }

    public function myTrainersNames()
    {
        return $this->hasMany(\App\Models\User::class, 'id', 'trainer_id');
    }

    public function userPayments()
    {
        return $this->hasOne(UserPayments::class, 'session_id', 'id');
    }

    public function Reviews()
    {
        return $this->hasOne(Review::class, 'session_id', 'id');
    }

    public function TrainerLocation()
    {
        return $this->hasOne(Address::class, 'user_id', 'trainer_id');
    }

    public function TraineeLocation()
    {
        return $this->hasOne(Address::class, 'user_id', 'trainee_id');
    }

    public function appointmentCancelledBy()
    {
        return $this->hasOne(User::class, 'id', 'cancelled_by');
    }

}

