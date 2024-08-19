<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        $logos = Cache::rememberForever('logos.index', function () {
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

        $categories = Cache::rememberForever('categories.all', function () {
            return DB::table('categories')->get();
        });

        return view('index', compact(['logos', 'categories']));
    }

    public function showLogo($slug)
    {
        $result = DB::table('links')->where('slug', $slug)->get();

        if ($result->isNotEmpty()) {
            $logo = Cache::rememberForever("logo.{$slug}", function () use ($result) {
                return DB::table('posts')
                    ->join('relationships', 'posts.id', '=', 'relationships.post_id')
                    ->join('categories', 'categories.id', '=', 'relationships.category_id')
                    ->join('images', 'posts.id', '=', 'images.post_id')
                    ->join('links', 'posts.id', '=', 'links.object_id')
                    ->select('posts.id', 'posts.post_title', 'images.img', 'links.slug', 'categories.categories_name', 'categories.categories_slug')
                    ->where('images.size', '=', 'full')
                    ->where('relationships.post_id', '=', $result[0]->object_id)
                    ->where('posts.id', '=', $result[0]->object_id)
                    ->get();
            });

            if ($logo === null) {
                return redirect()->route('/');
            }

            $categories = Cache::rememberForever('categories.all', function () {
                return DB::table('categories')->get();
            });

            $related = Cache::rememberForever("related.{$slug}", function () use ($result) {
                return DB::table('posts')
                    ->join('relationships', 'posts.id', '=', 'relationships.post_id')
                    ->join('categories', 'categories.id', '=', 'relationships.category_id')
                    ->join('images', 'posts.id', '=', 'images.post_id')
                    ->join('links', 'posts.id', '=', 'links.object_id')
                    ->select('posts.id', 'posts.post_title', 'images.img', 'links.slug', 'categories.categories_name', 'categories.categories_slug')
                    ->where('images.size', '=', 'small')
                    ->where('relationships.post_id', '!=', $result[0]->object_id)
                    ->where('posts.id', '!=', $result[0]->object_id)
                    ->inRandomOrder()
                    ->paginate(9);
            });

            return view('logo', compact(['logo', 'categories', 'related']));
        } else {
            abort(404);
        }
    }

    public function showCategory($slug)
    {
        $category = DB::table('categories')->where('categories_slug', $slug)->get();

        if ($category->isNotEmpty()) {

            $logos = DB::table('posts')
                ->join('relationships', 'posts.id', '=', 'relationships.post_id')
                ->join('categories', 'categories.id', '=', 'relationships.category_id')
                ->join('images', 'posts.id', '=', 'images.post_id')
                ->join('links', 'posts.id', '=', 'links.object_id')
                ->select('posts.id', 'posts.post_title', 'images.img', 'links.slug', 'categories.categories_name', 'categories.categories_slug')
                ->where('images.size', '=', 'small')
                ->where('relationships.category_id', '=', $category[0]->id)
                ->paginate(18);


            $categories = DB::table('categories')
                ->get();

            return view('category', compact(['logos', 'categories', 'category']));
        } else {
            abort(404);
        }

    }

    public function contact(Request $request)
    {
        if(isset($request['send_a_message'])){
            if ($request['send_a_message'] == TRUE) {

                // Send message
                $request['email'] = "shoppincode@gmail.com";
                $request['subject'] = "Message from DesignWalls.com";
                $request['message'] =
                    "Name: " . $request['name'] . ", "
                    . "E-mail: " . $request['email'] . ", "
                    . "Text: " . $request['text'];

                $headers = "From: Logo-Logos.com <no-reply@logo-logos.com>\r\nContent-type: text/plain; charset=UTF-8 \r\n";
                mail($request['email'], $request['subject'], $request['message'], $headers);

                echo "<p style='color: #3d9301'><b>Thank you for getting in touch!</b><br> We appreciate you contacting us logo-logos.com. One of our colleagues will get back in touch with you soon! Have a great day!</p>";
            } else {
                echo "<p style='color: #e61919'>Error: Message not sent.</p>";
                header('Refresh: 5; url=/');
                exit();
            }
        }

        return view('contact-form');
    }

}
