<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>{{ $produto->nome }} - Meu E-commerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <nav class="admin-nav">
        <div class="nav-container">
            <a href="/" class="brand">Loja<span>Admin</span></a>
            <ul class="nav-links">
                <li><a href="/">Ver Loja</a></li>
                <li><a href="/admin/cadastro">Produtos</a></li>
                <li><a href="/admin/pedidos">Pedidos</a></li>
                <li><a href="/admin/configuracoes" class="btn-settings">⚙ Configurações</a></li>
            </ul>
        </div>
    </nav>

    <div class="produto-detalhes">
        <div class="produto-imagem">
            @if($produto->imagem)
                <img src="/storage/{{ $produto->imagem }}" alt="{{ $produto->nome }}">
            @else
                <div class="sem-imagem">Sem imagem</div>
            @endif
        </div>

        <div class="produto-info">
            <h1>{{ $produto->nome }}</h1>
            <p class="preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p class="estoque">Estoque: {{ $produto->estoque }} unidades</p>

            <form action="/carrinho/adicionar" method="POST">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
            </form>

            <a href="/" class="btn-voltar">← Voltar para a loja</a>
        </div>
    </div>

</body>
</html>
