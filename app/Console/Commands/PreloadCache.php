<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PreloadCache extends Command
{
    protected $signature = 'cache:preload';
    protected $description = 'Preload data into Redis cache';

    public function handle()
    {
        $this->info('Preloading cache...');

        // Cache all logos and categories
        Cache::rememberForever('logos.index', function () {
            return DB::table('posts')
                ->join('relationships', 'posts.id', '=', 'relationships.post_id')
                ->join('images', 'posts.id', '=', 'images.post_id')
                ->join('links', 'posts.id', '=', 'links.object_id')
                ->join('categories', 'categories.id', '=', 'relationships.category_id')
                ->select('posts.post_title', 'images.img', 'links.slug', 'categories.categories_slug', 'categories.categories_name')
                ->where('images.size', '=', 'small')
                ->inRandomOrder()
                ->paginate(24);
        });

        Cache::rememberForever('categories.all', function () {
            return DB::table('categories')->get();
        });

        $this->info('Cache preloaded successfully.');
    }
}
