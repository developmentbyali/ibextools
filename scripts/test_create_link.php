<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->handle(
    $input = new Symfony\Component\Console\Input\ArgvInput(),
    new Symfony\Component\Console\Output\ConsoleOutput()
);

use App\Link;
use Illuminate\Database\Capsule\Manager as Capsule;

try {
    // Bootstrap the framework fully
    $app->make('db');
    $link = Link::create(['uuid' => 'abcde', 'url' => 'https://example.com/test']);
    echo "Created link id: {$link->id} uuid: {$link->uuid}\n";
} catch (Throwable $e) {
    echo "Exception: " . get_class($e) . " - " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}

$kernel->terminate($input, $status);
