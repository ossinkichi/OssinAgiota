<div class="w-xl">
    <form method="POST" id="form-login" class="flex flex-col items-center gap-6 w-ful p-3">
        <div class="w-md">
            <x-input input-class="focus:ring-2 focus:ring-lime-600 focus:border-lime-600" label-txt="Usúario" input-name="user" input-placeholder="Digite seu nome de usuário"></x-input>
        </div>
        <div class="w-md">
            <x-input input-class="focus:ring-2 focus:ring-lime-600 focus:border-lime-600" label-txt="Senha" input-type="password" input-name="password" input-placeholder="Digite sua senha"></x-input>
        </div>

        <button class="cursor-pointer block bg-lime-700 p-3 font-semibold text-lg rounded w-md hover:bg-lime-600">Entrar</button>

        <span>Primeiro acesso? Consulte o tecnico responsavel. </span>
    </form>
</div>
