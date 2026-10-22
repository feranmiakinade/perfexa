```php
<?php

$sourceDir = __DIR__ . '/test-images';
$targetWidth = 1080;
$targetHeight = 1350;
$backgroundColor = [245, 245, 245];

$extensions = ['jpg', 'jpeg', 'png', 'webp'];

function loadImage(string $path, string $extension)
{
    return match ($extension) {
        'jpg', 'jpeg' => @imagecreatefromjpeg($path),
        'png' => @imagecreatefrompng($path),
        'webp' => function_exists('imagecreatefromwebp')
            ? @imagecreatefromwebp($path)
            : false,
        default => false,
    };
}

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceDir, FilesystemIterator::SKIP_DOTS)
);

$processed = 0;
$skipped = 0;

foreach ($files as $file) {
    if (!$file->isFile()) {
        continue;
    }

    $extension = strtolower($file->getExtension());

    if (!in_array($extension, $extensions, true)) {
        $skipped++;
        continue;
    }

    $path = $file->getPathname();
    $source = loadImage($path, $extension);

    if (!$source) {
        echo "Skipped (could not read): {$file->getFilename()}\n";
        $skipped++;
        continue;
    }

    $originalWidth = imagesx($source);
    $originalHeight = imagesy($source);

    $scale = min(
        $targetWidth / $originalWidth,
        $targetHeight / $originalHeight
    );

    $newWidth = (int) round($originalWidth * $scale);
    $newHeight = (int) round($originalHeight * $scale);

    $canvas = imagecreatetruecolor($targetWidth, $targetHeight);
    $background = imagecolorallocate(
        $canvas,
        $backgroundColor[0],
        $backgroundColor[1],
        $backgroundColor[2]
    );

    imagefill($canvas, 0, 0, $background);

    $x = (int) (($targetWidth - $newWidth) / 2);
    $y = (int) (($targetHeight - $newHeight) / 2);

    imagecopyresampled(
        $canvas,
        $source,
        $x,
        $y,
        0,
        0,
        $newWidth,
        $newHeight,
        $originalWidth,
        $originalHeight
    );

    $tempPath = $path . '.tmp';

    $saved = match ($extension) {
        'jpg', 'jpeg' => imagejpeg($canvas, $tempPath, 92),
        'png' => imagepng($canvas, $tempPath, 6),
        'webp' => function_exists('imagewebp')
            ? imagewebp($canvas, $tempPath, 92)
            : false,
        default => false,
    };

    imagedestroy($source);
    imagedestroy($canvas);

    if (!$saved) {
        @unlink($tempPath);
        echo "Failed: {$file->getFilename()}\n";
        $skipped++;
        continue;
    }

    if (!rename($tempPath, $path)) {
        @unlink($tempPath);
        echo "Could not replace: {$file->getFilename()}\n";
        $skipped++;
        continue;
    }

    echo "Resized: {$file->getFilename()}\n";
    $processed++;
}

echo "\nFinished. Resized: {$processed}; skipped: {$skipped}.\n";
