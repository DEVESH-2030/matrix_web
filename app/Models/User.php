<?php

namespace App\Models;

use App\Models\Role;
use App\Models\PaperClip;
use App\Models\UploadImage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements \Czim\Paperclip\Contracts\AttachableInterface
{   
    use \Czim\Paperclip\Model\PaperclipTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * paperclip image upload 
     */
    public function __construct(array $attributes = [])
    {
        $this->hasAttachedFile('image', [
            'variants' => [
                'medium' => [
                    'auto-orient' => [],
                    'resize'      => ['dimensions' => '300x300'],
                ],
                'thumb' => '100x100',
            ],
            'attributes' => [
                'variants' => true,
            ],
        ]);

        parent::__construct($attributes);
    }

    /* Relation with Upload image */
    public function image()
    {
            return $this->hasOne(UploadImage::class);
    }

    /**
     * Relation with role model
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
