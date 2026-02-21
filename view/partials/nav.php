<p>
<nav>
    <a href="/">
        <button>Index</button>
    </a>
    <a href="/about">
        <button>about</button>
    </a>
    <a href="/register">
        <button>register</button>
    </a>
    <a href="/products">
        <button>products</button>
    </a>
    <?php if (isset($_SESSION["user"])): ?>
        <a href="/logout">
            <button>Logout</button>
        </a>
        Hello <?= $_SESSION["user"]["userName"] ?>
    <?php endif; ?>
</nav>
</p>