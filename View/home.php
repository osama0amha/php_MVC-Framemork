<?php ?>

<div class="container mt-4">

    <?php if (\app\core\Application::$app->session->getSession('secss')): ?>
           <div class="alert alert-success" role="alert">
               <?php echo \app\core\Application::$app->session->getSession('secss')?>
           </div>
    <?php endif; ?>

    <h1>home</h1>
</div>
