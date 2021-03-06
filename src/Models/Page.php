<?php

namespace Aldrumo\Core\Models;

use Aldrumo\Blocks\Concerns\HasBlocks;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSlug, HasBlocks;

    protected $fillable = [
        'title',
        'slug',
        'template',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        $slugOptions = SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(250);

        if ($this->slug === '/') {
            $slugOptions = $slugOptions->doNotGenerateSlugsOnUpdate();
        }

        return $slugOptions;
    }

    public function delete(): bool
    {
        $this->blocks()->delete();

        return parent::delete();
    }
}
