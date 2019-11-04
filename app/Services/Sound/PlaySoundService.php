<?php

namespace App\Services\Sound;

use App\BookAudio;
use App\Books;

class PlaySoundService
{
    public function getJsonDataForPlugin($bookId)
    {
        $data = Books::where('id', $bookId)->with(['audio', 'authors'])->first();

        $response = [];
        foreach ($data->audio as $key => $audio) {

            $response['albums'][$key] = $data->name;
            $response['trackNames'][$key] = $data->authors->first()->name;
            $response['albumArtworks'][$key] = '_' . $key;
            $response['albumArtworksLink'][$key] = route('render.img', ['file_name' => 'public/images/' . $data->cover_page]);
            $response['trackUrl'][$key] = route('render.img', ['file_name' => $audio->path]);
        }

        return $response;
    }

    public function getPlaylist($bookId)
    {
        $data = Books::where('id', $bookId)->with(['audio' => function($query) {
            $query->with('user');
        }])->first();

        $response = [];
        foreach ($data->audio as $key => $audio) {
            $response[$key]['track'] = $key;
            $response[$key]['name'] = $audio->chatper_name . ' - ' . $audio->user->name;
            $response[$key]['duration'] = $audio->duration;
            $response[$key]['file'] = str_replace('.wav', '', $audio->path);
        }
        return $response;
    }
}
