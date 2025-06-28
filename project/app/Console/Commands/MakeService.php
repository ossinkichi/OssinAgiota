<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Cria uma classe de Service em app/Services';

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));

        $directory = app_path('Services');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $path = $directory . '/' . $name . '.php';

        if (File::exists($path)) {
            $this->error("O service {$name} já existe.");
            return 1;
        }

        $content = <<<PHP
<?php

namespace App\Services;

class {$name}
{
    //
}
PHP;

        File::put($path, $content);
        $this->info("Service {$name} criado com sucesso!");
        return 0;
    }
}
