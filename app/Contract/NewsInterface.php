<?php

namespace App\Contract;

use App\Http\Requests\NewsRequest;

interface NewsInterface
{
    public function getNews();

    public function updateNews(NewsRequest $request, $id);

    public function editNews($id);

    public function createNews($request);

    public function deleteNews($id);
}
