<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CopyImagesToStorage extends Command
{
    protected $signature = 'copy:images {sourceFolder}';
    protected $description = 'Copy images from a specified folder to the images storage disk';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sourceFolder = $this->argument('sourceFolder');

        // Check if the source folder exists
        if (!is_dir($sourceFolder)) {
            $this->error("The folder '{$sourceFolder}' does not exist.");
            return;
        }

        // Get all files in the source folder
        $files = scandir($sourceFolder);

        foreach ($files as $file) {
            $filePath = $sourceFolder . DIRECTORY_SEPARATOR . $file;

            // Skip directories, only copy files
            if (is_file($filePath)) {
                Storage::disk('images')->put($file, file_get_contents($filePath));
                $this->info("Copied: {$file}");
            }
        }

        $this->info('All files have been copied successfully.');
    }
}
