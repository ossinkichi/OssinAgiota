<div>
    <form action="">
        <div>
            <x-label label="Usúario">
                <x-input name="user"></x-input>
            </x-label>
        </div>
        <div>
            <x-labe label="Senha">
                <x-input type="password" name="password"></x-input>
            </x-labe>
        </div>

        <button>Entrar</button>
        <p>Primeiro acesso? <a href="{{ url('#') }}">Cadastrar-se</a> </p>
    </form>
</div>
