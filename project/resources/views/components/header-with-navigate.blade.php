    <header class="{{ $styleHeader }} h-20 p-3 flex items-center justify-between">
        <span class="{{ $spanStyle }}">OssinAgiota</span>

        <nav>
            <ul class="flex space-x-4 gap-4">
                <li><a href="#" class="text-white p-2 hover:border-b-2 hover:border-b-gray-300">Inicio</a></li>
                <li><a href="#" class="text-white p-2 hover:border-b-2 hover:border-b-gray-300">Clientes</a></li>
                <li><a href="#" class="text-white p-2 hover:border-b-2 hover:border-b-gray-300">Despesas</a></li>
            </ul>
        </nav>

        {{ $slot }}
    </header>
