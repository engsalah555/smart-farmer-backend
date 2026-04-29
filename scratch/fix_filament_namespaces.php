<?php

$files = glob('app/Filament/Resources/*/Tables/*Table.php');
foreach ($files as $file) {
    $content = file_get_contents($file);
    // Replace Filament\Actions\ with Filament\Tables\Actions\
    $newContent = str_replace('Filament\\Actions\\', 'Filament\\Tables\\Actions\\', $content);

    // Also fix some specific classes that might have been imported from App\Models accidentally by Larastan if I missed them
    // But for now let's stick to the namespace fix.

    if ($content !== $newContent) {
        file_put_contents($file, $newContent);
        echo "Fixed: $file\n";
    }
}
