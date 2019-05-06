<?php

namespace App\Services\Uploads;

use Illuminate\Http\Request;

/**
 * Class BaseUploadFile
 * @package App\Services\Uploads
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class BaseUploadFile implements BaseUploadFileInterface
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var string
     * setting path to save file
     */
    protected $path;

    /**
     * @var string
     * setting filename
     */
    protected $filename;

    /**
     * BaseUploadFile constructor.
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return false|mixed|string
     */
    public function upload()
    {
        if ($this->request->has($this->filename)) {
            return $this->request->file($this->filename)->store($this->path);
        }
    }
}