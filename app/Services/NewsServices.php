<?php

namespace App\Services;

use App\Contract\NewsInterface;
use App\News;

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
        return $this->news::with('user')->where('user_id', 1)->get();
    }

    public function updateNews($request, $id)
    {
        // TODO: Implement updateNews() method.

        $news = $this->news::findorfail($id);
        return $news->update($request->all());
    }

    public function editNews($id)
    {
        // TODO: Implement editNews() method.

        return $this->news::findorfail($id);
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
        return $news->delete();
    }

}
