<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu E-commerce</title>
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

    <h1>Painel de Produtos</h1>

<div class="admin-dashboard">
    <div class="form-container">
        <h2>Cadastrar Novo</h2>
        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <input type="number" name="preco" step="0.01" placeholder="Preço" required>
            <input type="number" name="estoque" placeholder="Quantidade">
            <input type="file" name="foto" accept="image/*">
            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>

    <div class="table-container">
        <h2>Produtos Cadastrados</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Foto" class="thumb">
                    </td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="actions">
                        <a href="/admin/produtos/{{ $produto->id }}/editar" class="btn-edit">Editar</a>

                        <form action="/admin/produtos/{{ $produto->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</html>
