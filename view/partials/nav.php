<p>
<nav style="display: flex; gap: 10px; justify-content:center;">
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
        <form action="/logout" method="POST">
            <input type="hidden" name="_method" value="DELETE" />
            <button>logout</button>
            Hello <?= $_SESSION["user"]["userName"] ?>
        </form>
    <?php endif; ?>
    <?php if (!isset($_SESSION["user"])): ?>
        <a href="/login">
            <button>login</button>
        </a>
    <?php endif; ?>
</nav>
</p>