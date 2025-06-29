<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Registra comandos personalizados (como make:dto).
     */
    protected $commands = [
        \App\Console\Commands\MakeDTO::class,
        \App\Console\Commands\MakeRequest::class,
        \App\Console\Commands\MakeService::class,
        \App\Console\Commands\MakeEntity::class,
    ];

    /**
     * Agendamento de tarefas.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Aqui você pode agendar comandos (ex: backups)
    }

    /**
     * Registra comandos no sistema.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
