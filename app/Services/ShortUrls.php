<?php

namespace App\Services;

use App\Models\User;
use App\Models\UrlShorter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ShortUrls
{
    public function shortUrls($id)
    {

        try {
            return $urls = UrlShorter::with('user')->where('user_id', $id)->latest()->get(['id', 'user_id', 'url', 'short_url', 'click_count', 'created_at']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function createShortUrl($data)
    {
        try {
            $url['user_id'] = $data['user_id'] ?? Auth::id();
            $url['url'] = $data['url'] ?? '';
            $url['short_url'] = Str::random(8) ?? '';
            $url = UrlShorter::create($url);
            return $url;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteShortUrl($id)
    {
        try {
            UrlShorter::findOrFail($id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function urlClickCount($id)
    {
        try {
            $urlClick = UrlShorter::findOrFail($id);
            $urlClick->click_count = $urlClick->click_count + 1;
            $urlClick->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function redirectShortUrl($shortUrl){
        try{

            $url = UrlShorter::where('short_url', $shortUrl)->firstOrFail();
            $this->urlClickCount($url->id);
            return $url;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
