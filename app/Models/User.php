<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    //Billable;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstName',
        'MiddleName',
        'LastName',
        'email',
        'confirmation_code',
        'email_verified_at',
        'password',
        'remember_token',
        'dob',
        'role_id',
        'profile_pic',
        'address',
        'location',
        'crp_training_prof_url',
        'goverment_identification',
        'city_id',
        'profile_image',
        'cover_image',
        'approved',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstName' => 'string',
        'MiddleName' => 'string',
        'LastName' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'dob' => 'date',
        'role_id' => 'integer',
        'profile_pic' => 'string',
        'address' => 'string',
        'location' => 'string',
        'crp_training_prof_url' => 'string',
        'goverment_identification' => 'string',
        'city_id' => 'integer',
        'profile_image' => 'string',
        'cover_image' => 'string'
    ];

    public function role() {

        return $this->belongsTo(Roles::class, "role_id");
    }

    public function getAddress()
    {
        return $this->hasOne(\App\Models\Address::class, 'user_id', 'id');
    }

    public function getDocuments()
    {
        return $this->hasMany(Documents::class, 'user_id', 'id');
    }

    public function getProfile()
    {
        return $this->hasOne(\App\Models\Profile::class, 'user_id', 'id');
    }

    public function getImages()
    {
        return $this->hasMany(\App\Models\Images::class, 'user_id', 'id');
    }

    public static function get_quickRandom($length = 16)
    {
        $data_pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@(-_){}[]';
        return substr(str_shuffle(str_repeat($data_pool, $length)), 0, $length);
    }

    public function training_sessions()
    {
        return $this->belongsTo(TrainingSessions::class, 'trainer_id', 'id');
    }

    public function trainerTrainingSessionCount()
    {
        return $this->hasMany(TrainingSessions::class, 'trainer_id', 'id')
            ->where('status','completed');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'send_from');
    }

    public function transferredTo()
    {
        return $this->belongsTo(\App\Models\TransferPayment::class, 'transferred_to', 'id');
    }
    
    public function transferredBy()
    {
        return $this->belongsTo(\App\Models\TransferPayment::class, 'transferred_by', 'id');
    }

    public function session()
    {
        return $this->belongsTo(\App\Models\TrainingSessions::class, 'session_id', 'id');
    }
}
