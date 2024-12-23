<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class header extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'header';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'path'
    ];


    /**
     * Get the full URL for the image.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }

}
