<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MoonShine\Models\MoonshineUser;
use MoonShine\Traits\Models\HasMoonShineChangeLog;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Commentable;

    protected $fillable = [
        'title',
        'published',
        'user_id',
        'description',
        'slug',
        'datajson',

    ];

    protected $casts = [
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)
            ->withTimestamps()
            ->withPivot(['is_published', 'priority']);
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(MoonshineUser::class, 'user_id', 'id');
    }


    public function cat(): belongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    public function registerAllMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width('200')
            ->height('200');
    }





}
