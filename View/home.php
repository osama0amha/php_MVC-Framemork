<?php  $this->title("home")?>

<div class="container mt-4">

    <?php if (\Os\MvcFramework\Application::$app->session->getSession('secss')): ?>
           <div class="alert alert-success" role="alert">
               <?php echo \Os\MvcFramework\Application::$app->session->getSession('secss')?>
           </div>
    <?php endif; ?>

    <h1>home</h1>
</div>
