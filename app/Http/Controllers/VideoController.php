<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use FFMpeg\FFMpeg;

class VideoController extends Controller
{
    public function uploadForm()
    {
        return view('video.upload-form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4,mov,avi|max:10240', // Adjust the allowed video formats and size
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        // Convert video to MP3
        $audioPath = storage_path('app/public/audios/') . pathinfo($videoPath, PATHINFO_FILENAME) . '.mp3';

        $ffmpeg = FFMpeg::create();

        $video = $ffmpeg->open($videoPath);

        $format = new \FFMpeg\Format\Audio\Mp3();

        $video->export()
            ->inFormat($format)
            ->toDisk('public')
            ->save($audioPath);

        // Save video details to the database
        \App\Models\Video::create([
            'title' => $request->input('title'),
            'file_path' => $videoPath,
        ]);

        return redirect()->back()->with('success', 'Video uploaded successfully.');
    }

    public function index()
    {
        $videos = \App\Models\Video::all();
        return view('videos.index', compact('videos'));
    }
}