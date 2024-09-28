<?php

namespace App\Http\Controllers;

use App\Services\ShortUrls;
use Illuminate\Http\Request;

class UrlShorterController extends Controller
{
    protected $shortUrl;
    public function __construct(ShortUrls $shortUrl)
    {
        $this->shortUrl = $shortUrl;
    }

    //ShortUrls lists
    public function index()
    {
        $shortUrls =  $this->shortUrl->shortUrls(auth()->id());
        return view('user.short_urls.index', compact('shortUrls'));
    }

    // create a ShortUrls
    public function create()
    {
        return view('user.short_urls.create');
    }

    //ShortUrls store with shorten
    public function store(Request $request)
    {
        $request->validate(['url' => 'required|url']);
        $this->shortUrl->createShortUrl($request->all() , null);
        return redirect()->route('short-urls.index')->with('Short Url Created Successfully');
    }

    //ShortUrls delete
    public function destroy(string $id)
    {
        $this->shortUrl->deleteShortUrl($id);
        return redirect()->route('short-urls.index')->with('error', 'Short Url Deleted Successfully');
    }

    //shortUrl redirect and click count
    public function redirect($shortUrl)
    {
        $url = $this->shortUrl->redirectShortUrl($shortUrl);
        return redirect($url->url);
    }

    // for api generateUrl
    public function generateUrl(Request $request){
        if($request->isMethod('post')){
            $request->validate(['url' => 'required|url']);
            $url = $this->shortUrl->createShortUrl($request->all());
            return response()->json([
                "status" => "success",
                "code" => 201,
                "message" => "Successfully Generate",
                "original_url" => $url->url,
                "short_url" => $url->short_url,
            ]);
        }

        return response()->json([
            "status" => "success",
            "code" => 200,
            "message" => "Successfully Fatch",
            'lists' => $this->shortUrl->shortUrls($request->user_id)
        ]);
    }
}
