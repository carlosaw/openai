<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Muskai</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="/assets/css/style.css"
</head>
<body>
    <header>
        <h1> Muskai - 🧔 </h1>
    </header>
    <main>
        <h2>Gerador de receitas</h2>
        <p>Seu Chefe de Cozinha: Crie Receitas Únicas e Saborosas Com Os Ingredientes que Você Possui na Geladeira!</p>
        <article>
            <label> Ingredientes </label>
            <form method="POST" action="{{ route('ingredientesAction') }}">
                @csrf
                <input type="text" name="ingredientes"/>
                <input type="submit" value="Senta o dedo nesta coisa" />
            </form>
        </article>
    </main>
    <footer>
        Aw2Web - 2023
    </footer>
</body>
</html>