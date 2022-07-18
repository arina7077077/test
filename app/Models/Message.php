<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

	/**
	 * @return Attribute
	 */
	public function isNew(): Attribute
	{
		return Attribute::make(
			get: fn () => $this->created_at->diffInHours(Carbon::now('Europe/Moscow')) < 24,
		);
	}

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
