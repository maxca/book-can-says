<?php

namespace App\Services\Uploads;

/**
 * Class UploadSound
 * @package App\Services\Uploads
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class UploadSound extends BaseUploadFile
{
    /**
     * @var string
     */
    protected $filename = 'audio_data';

    /**
     * @var string
     */
    protected $path = 'sounds';


}