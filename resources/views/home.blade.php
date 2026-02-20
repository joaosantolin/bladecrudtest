<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meu E-commerce</title>
    @vite (['resources/css/app.css', 'resources/js/app.js'])
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

    <h1>Bem-vindo à Loja</h1>
    <p>O melhor do e-commerce universitário.</p>

<div class="produtos-container">
    @foreach ($produtos as $produto)
        <div class="card-produto">
            @if($produto->imagem)
                <img src="/storage/{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="imagem-produto">
            @endif
            <h3>{{ $produto->nome }}</h3>
            <p class="preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p class="estoque">Estoque: {{ $produto->estoque }} unidades</p>

            <a href="{{ route('produtos.show', $produto->id) }}" class="btn-comprar">Ver Detalhes</a>
        </div>
    @endforeach
</div>
</body>
</html>
