<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ClearSiteRedisCache extends Command
{
    protected $signature = 'cache:clear-site-redis';
    protected $description = 'Clear Redis cache for the specific site';

    public function handle()
    {
        $keys = [
            'logos.index',
            'categories.all',
            // Здесь вы можете добавить другие ключи, которые хотите очистить
        ];

        foreach ($keys as $key) {
            Redis::del($key);
        }

        // Очистка всех ключей, связанных с логотипами
        $logoKeys = Redis::keys('logo.*');
        foreach ($logoKeys as $key) {
            Redis::del($key);
        }

        // Очистка всех ключей, связанных с related
        $relatedKeys = Redis::keys('related.*');
        foreach ($relatedKeys as $key) {
            Redis::del($key);
        }

        $this->info('Redis cache for the specific site cleared successfully.');
    }
}
