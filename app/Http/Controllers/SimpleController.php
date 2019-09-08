<?php

namespace App\Http\Controllers;


use App\Http\Requests\UploadSoundRequest;
use App\Services\Uploads\UploadSound;
use App\SimpleBooks;

/**
 * Class SimpleController
 * @package App\Http\Controllers
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class SimpleController extends Controller
{
    /**
     * @var \App\Services\Uploads\UploadSound
     */
    protected $upload;

    /**
     * SimpleController constructor.
     * @param \App\Services\Uploads\UploadSound $upload
     */
    public function __construct(UploadSound $upload)
    {
        $this->upload = $upload;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testRenderViewViaHasMany()
    {
        $data['books'] = SimpleBooks::with(['category', 'publisher', 'author', 'chapter'])
            ->orderBy('updated_at', 'desc')
            ->paginate(12);
        return view('test.hasmany', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testRecord()
    {
        return view('test.test-record');
    }

    /**
     * @param \App\Http\Requests\UploadSoundRequest $request
     * @return false|mixed|string
     */
    public function upload(UploadSoundRequest $request)
    {
        return $this->upload->upload();
    }
}