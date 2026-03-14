<?php

use Core\Sessions;
use Core\Validation;
?>
<p>
<nav style="display: flex; gap: 10px; justify-content:center;">
    <a href="/">
        <button>Index</button>
    </a>
    <!-- ==== -->
    <a href="/about">
        <button>about</button>
    </a>
    <!-- ==== -->
    <?php if (!Validation::isAuth()): ?>
        <a href="/register">
            <button>register</button>
        </a>
    <?php endif; ?>
    <!-- ==== -->
    <a href="/products">
        <button>products</button>
    </a>
    <!-- ==== -->
    <?php if (Validation::isAuth()): ?>
        <form action="/logout" method="POST">
            <input type="hidden" name="_method" value="DELETE" />
            <button>logout</button>
            Hello <?= htmlspecialchars(Sessions::get(["user", "userName"])) ?>
        </form>
    <?php endif; ?>
    <!-- ==== -->
    <?php if (!Validation::isAuth()): ?>
        <a href="/login">
            <button>login</button>
        </a>
    <?php endif; ?>
</nav>
</p>