<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

class ProcessVideo extends Command
{
    protected $signature = 'video:process {video_path}';
    protected $description = 'Process a video asynchronously';

    public function handle()
    {
        $videoPath = $this->argument('video_path');

        $ffmpeg = FFMpeg::create();

        $video = $ffmpeg->open($videoPath);
        $video->filters()->resize(new \FFMpeg\Coordinate\Dimension(320, 240));

        $format = new X264();
        $format->setAudioCodec("libmp3lame");

        $video->save($format, 'path/to/output/video.mp4');

        $this->info('Video processed successfully.');
    }
}
