<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MediaCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:media-cleanup {--force : Force the operation} {--dry-run : Run without deleting}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up orphaned media files and database records to save disk space';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting comprehensive media cleanup...');
        $dryRun = $this->option('dry-run');

        // 1. Run Spatie's built-in cleanup (for orphaned files)
        if (!$dryRun) {
            $this->info('Running Spatie media-library:clean...');
            $this->call('media-library:clean', [
                '--delete-orphaned' => true,
                '--force' => $this->option('force') || true,
            ]);
        } else {
            $this->info('[Dry Run] Would run Spatie media-library:clean');
        }

        // 2. Clean up media records for non-existent models (orphaned DB records)
        $this->info('Checking for media records with missing models...');
        $orphanedMedia = Media::with('model')->get()->filter(function ($media) {
            return !$media->model;
        });

        if ($orphanedMedia->count() > 0) {
            $this->warn("Found {$orphanedMedia->count()} media records with missing models.");
            foreach ($orphanedMedia as $media) {
                if (!$dryRun) {
                    $media->delete();
                    $this->line("Deleted media record ID {$media->id} (Model missing)");
                } else {
                    $this->line("[Dry Run] Would delete media record ID {$media->id}");
                }
            }
        } else {
            $this->info('No media records with missing models found.');
        }

        // 3. Clean up records with missing physical files
        $this->info('Checking for media records with missing physical files...');
        Media::all()->each(function ($media) use ($dryRun) {
            if (!file_exists($media->getPath())) {
                $this->warn("Media record ID {$media->id} points to non-existent file: {$media->getPath()}");
                if (!$dryRun) {
                    $media->delete();
                    $this->line("Deleted broken record ID {$media->id}");
                } else {
                    $this->line("[Dry Run] Would delete broken record ID {$media->id}");
                }
            }
        });

        // 4. Special check for duplicate "singleFile" collection entries if any exist
        // (Sometimes manually adding media can bypass singleFile if not careful)
        // We'll trust Spatie for this, but could add manual check if needed.

        $this->info('Media cleanup complete!');
    }
}
