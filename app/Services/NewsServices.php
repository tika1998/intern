<?php

namespace App\Services;

use App\Contract\NewsInterface;
use App\News;
use Illuminate\Support\Facades\Auth;

class NewsServices implements NewsInterface
{
    private $news;

    public function __construct()
    {
        $this->news = new News();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * geting all News
     */

    public function getNews()
    {
        // TODO: Implement getNews() method.
        $id = Auth::id();
//        $news = $this->news::with(['user'])->get();
        $name = 'tik';
//        $news = $this->news::whereHas('user',function ($query) use ($name){
//            $query->where('email', 'Like','%'.$name.'%');
//        })->with('user')->get();
        $news = $this->news->join('user', function ($query) use ($name){
            $query->on('email','Like','%'.$name.'%');
        })->get();
        $news = DB::table('news')->join('user', function ($query) use ($name){
            $query->on('email','Like','%'.$name.'%');
        })->get();
        dd($news);
        if (count($news) > 0) {
            return $news;
        } else {
            return redirect('/news/hello')->with('message', 'you have no news yet');
        }
    }

    public function updateNews($request, $id)
    {
        // TODO: Implement updateNews() method.

        $news = $this->news::findorfail($id);
        if (!$news) {
            return abort(404);
        } else {
            return $news->update($request->all());
        }
    }

    public function editNews($id)
    {
        // TODO: Implement editNews() method.
        if (!$id) {
            return abort(404);
        } else {
            return $this->news::findorfail($id);
        }
    }

    public function createNews($request)
    {
        // TODO: Implement createNews() method.
        return $this->news::create($request->all());
    }

    public function deleteNews($id)
    {
        // TODO: Implement deleteNews() method.
        $news = $this->news::find($id);
        if (!$news) {
            return abort(404);
        } else {
            return $news->delete();
        }
    }

}
