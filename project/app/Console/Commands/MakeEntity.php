<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeEntity extends Command
{
    protected $signature = 'make:entity {name}';
    protected $description = 'Cria uma classe de Entity em app/Entities';

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));

        $directory = app_path('Entities');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $path = $directory . '/' . $name . '.php';

        if (File::exists($path)) {
            $this->error("A entidade {$name} já existe.");
            return 1;
        }

        $content = <<<PHP
<?php

namespace App\Entities;

class {$name}
{
    // Propriedades e comportamentos da entidade {$name}

    public function __construct() {}

    public function make(array \$data):self {
        return new self();
    }

    public function jsonSerialize():array {
        return [];
    }

}
PHP;

        File::put($path, $content);
        $this->info("Entity {$name} criada com sucesso!");
        return 0;
    }
}
