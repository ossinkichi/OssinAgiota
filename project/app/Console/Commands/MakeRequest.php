<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeRequest extends Command
{
    protected $signature = 'make:request {name}';
    protected $description = 'Cria uma classe Form Request em app/Http/Requests';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $directory = app_path('Http/Requests');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $path = $directory . '/' . $name . '.php';

        if (File::exists($path)) {
            $this->error('Request já existe!');
            return 1;
        }

        $template = <<<PHP
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class {$name} extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }

    public function toDTO()
    {
        // Retornar DTO com dados validados (opcional)
    }
}

PHP;

        File::put($path, $template);
        $this->info("Form Request {$name} criado com sucesso em app/Http/Requests/");
        return 0;
    }
}
