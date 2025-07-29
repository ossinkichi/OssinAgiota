<div class="border-2 border-white w-xl">
    <form action="" class="flex flex-col items-center gap-4 w-ful p-3">
        <div class="w-md">
            <x-input label-txt="Usúario" input-name="user" input-placeholder="Digite seu nome de usuário"></x-input>
        </div>
        <div class="w-md">
            <x-input label-txt="Senha" input-type="password" input-name="password" input-placeholder="Digite sua senha"></x-input>
        </div>
        <button class="bg-lime-600 p-3 font-semibold text-lg rounded w-md">Entrar</button>
        <p>Primeiro acesso? <a href="{{ url('#') }}">Cadastrar-se</a> </p>
    </form>
</div>
