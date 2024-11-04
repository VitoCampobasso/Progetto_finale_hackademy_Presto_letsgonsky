<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Unit;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

     private $w, $h, $fileName, $path;
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        Image::load($srcPath)
             ->crop($w, $h, CropPosition::Center)
             ->watermark(
                base_path('public/media/watermark2.png'),
                width: 500,
                height: 500,
                paddingX: 0,
                paddingY:0,    
                // paddingUnit: Unit::Percent,
               
                )
             ->save($destPath);
    }
}
