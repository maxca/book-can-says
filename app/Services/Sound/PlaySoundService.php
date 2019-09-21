<?php

namespace App\Services\Sound;

use App\Books;

class PlaySoundService
{
    public function getJsonDataForPlugin($bookId)
    {
        $data     = Books::where('id', $bookId)->with('audio')->first();
        $response = [];
        foreach ($data->audio as $key => $audio) {
            $response['albums'][$key]        = $data->name;
            $response['trackNames'][$key]    = $data->authors->name;
            $response['albumArtworks'][$key] = $data->cover_page;
            $response['trackUrl'][$key]      = $audio->path;
        }

    }
}