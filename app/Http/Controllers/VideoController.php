<?php

namespace App\Http\Controllers;

use App\Video;

class VideoController extends Controller
{
    public function index()
    {
        $query = Video::query();

        $query->whereHas('translations', function ($query) {
            $query->where('locale', 'es');
        });

        $query->with(['translations' => function ($query) {
            $query->where('locale', 'es');
        }]);

        $query->with(['user']);

        //$query->orderBy('video_translations.name');
        $videos = $query->get()->sortBy(function ($video, $key) {
            return $video->translations->first()->name;
        });

        return view('videos.list', compact('videos'));
    }
}

