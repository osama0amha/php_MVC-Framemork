<?php $this->title("login");
/** @var  $Model */?>

<div class="container mt-5">

    <?php $form = \Os\MvcFramework\Forms\Form::begin("",'post') ;?>

    <?php echo $form->field($Model,'email')?>
    <?php echo $form->field($Model,'password')->password()?>

    <button type="submit" class="btn btn-primary">Submit</button>

    <?php \Os\MvcFramework\Forms\Form::end(); ?>

</div>
