<main class="login-main">
    <h1>Вход</h1>
        <form action="/login/auth" method="POST" class="login-form">
            <div>
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="login" class="login-input" required>
            </div>

            <div>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" class="login-input" required>
            </div>
            <button type="submit" class="login-button-entry">Войти</button>
        </form>
</main>