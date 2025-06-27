<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeDTO extends Command
{
    protected $signature = 'make:dto {name} {--fields=*}';
    protected $description = 'Cria uma classe DTO em app/DTOs';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $fields = $this->option('fields');

        $directory = app_path('DTOs');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $path = "$directory/{$name}.php";

        if (File::exists($path)) {
            $this->error('DTO já existe!');
            return 1;
        }

        // Processa os campos: name:string → public string $name
        $props = [];
        foreach ($fields as $field) {
            [$nome, $tipo] = explode(':', $field);
            $props[] = "        public {$tipo} \${$nome},";
        }

        $propsStr = implode("\n", $props);

        $template = <<<PHP
<?php

namespace App\DTOs;

class {$name}
{
    public function __construct(
{$propsStr}
    ) {}
}
PHP;

        File::put($path, $template);
        $this->info("DTO {$name} criado com sucesso em app/DTOs/");
        return 0;
    }
}
