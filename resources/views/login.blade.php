<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login - Meu E-commerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-page">

    <nav class="login-nav">
        <div class="login-nav-inner">
            <a href="/" class="login-brand">Loja<span>Admin</span></a>
            <div class="login-nav-links">
                <a href="/">Voltar para loja</a>
            </div>
        </div>
    </nav>

    <main class="login-wrap">
        <section class="login-hero">
            <p class="login-kicker">Acesso restrito</p>
            <h1>Entre para gerenciar sua loja.</h1>
            <p class="login-subtitle">Cadastre produtos, monitore estoque e acompanhe pedidos em um so lugar.</p>

            <div class="login-highlight">
                <div class="stat">
                    <span class="stat-number">+2k</span>
                    <span class="stat-label">Produtos ativos</span>
                </div>
                <div class="stat">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Satisfacao</span>
                </div>
            </div>
        </section>

        <section class="login-card">
            <h2>Login</h2>
            <form method="POST" action="/login">
                @csrf
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="seu@email.com" required>

                <label for="password">Senha</label>
                <input id="password" type="password" name="password" placeholder="Sua senha" required>

                <div class="login-actions">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Lembrar de mim
                    </label>
                    <a class="forgot" href="/senha">Esqueceu a senha?</a>
                </div>

                <button type="submit" class="login-btn">Entrar</button>
            </form>
        </section>
    </main>

</body>
</html>
