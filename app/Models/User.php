<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'fname', 'lname', 'contact_number', 'birthdate', 'address', 'profile_photo', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getMemberSinceAttribute()
    {
        $created_at = $this->created_at; 
        return Carbon::parse($created_at)->format('M Y');
    }

    public function getDisplayPhotoAttribute()
    {
        $photo = $this->profile_photo;
        $fullname = $this->fname . ' ' . $this->lname;

        if($photo) {
            return url('storage/' . $photo);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode(trim($fullname));
    }

    public function getFullnameAttribute()
    {
        if($this->fname && $this->lname) {
            return $this->fname . ' ' . $this->lname;
        }
        return $this->name;
    }

    public function getDisplayBirthdateAttribute()
    {
        if($this->birthdate) {
            return Carbon::parse($this->birthdate)->format('F d, Y');
        }
        
        return '';
    }

    // --- NEW HELPER METHODS ---

    public function isAdmin(): bool
    {
        return strtolower($this->role) === 'admin';
    }

    public function isUser(): bool
    {
        return strtolower($this->role) === 'user';
    }
}