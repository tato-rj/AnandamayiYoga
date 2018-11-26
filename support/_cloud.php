<?php

function cloudEnv() {
	return config('filesystems.disks.s3.env');
}

function cloud($path) {
	if (! $path)
		return asset('misc/no-image.png');
	
	return \Storage::disk('s3')->url($path);
}

function attachmentToS3($request, $folder)
{
    if (! $request->file('attachment')) return null;

    return $request->file('attachment')->store(cloudEnv()."{$folder}", 's3');
}

function coverToS3($request, $folder)
{
    if (! $request->file('cover')) return null;

    return $request->file('cover')->store(cloudEnv()."/{$folder}/covers", 's3');
}

function imageToS3($request, $folder)
{
	if (! $request->file('image')) return null;

	return $request->file('image')->store(cloudEnv()."/{$folder}/images", 's3');
}

function videoToS3($request, $folder)
{
	if (! $request->file('video')) return null;

	return $request->file('video')->store(cloudEnv()."/{$folder}/videos", 's3');
}

function fileToS3($request, $folder)
{
    if (! $request->file('file')) return null;

    return $request->file('file')->store(cloudEnv()."/{$folder}/files", 's3');
}
