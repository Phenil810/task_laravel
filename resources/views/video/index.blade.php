<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video List</title>
</head>
<body>
    <h1>Video List</h1>

    @foreach($videos as $video)
        <p>{{ $video->title }}</p>
        <video width="320" height="240" controls>
            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <br>
        <audio controls>
            <source src="{{ asset('storage/audios/' . pathinfo($video->file_path, PATHINFO_FILENAME) . '.mp3') }}" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
        <hr>
    @endforeach
</body>
</html>
