<?php /** @var  $Model */?>

<div class="container mt-5">

    <?php $form = \app\core\Forms\Form::begin("",'post') ;?>

    <?php echo $form->field($Model,'email')?>
    <?php echo $form->field($Model,'password')->password()?>

    <button type="submit" class="btn btn-primary">Submit</button>

    <?php \app\core\Forms\Form::end(); ?>

</div>
