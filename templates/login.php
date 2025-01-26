<main class="login-main">
    <h1>Войти</h1>
        <form action="/login" method="POST" class="login-form">
            <div>
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Войти</button>
        </form>
</main>