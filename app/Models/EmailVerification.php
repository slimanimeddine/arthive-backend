<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    /** @use HasFactory<\Database\Factories\EmailVerificationFactory> */
    use HasFactory, HasUlids;

    protected $fillable = [
        'email',
        'code',
        'code_expires_at',
    ];
}
