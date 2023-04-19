<h1>Create An Account</h1>

<?php $form = app\core\form\Form::begin('', "post") ?>
<?= $form->field($model, 'firstName') ?>
<?= $form->field($model, 'lastName') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>
<?= $form->field($model, 'passwordConfirm')->passwordField() ?>

<button type="submit" class="btn btn-primary my-3">Register</button>
<? \app\core\form\Form::end() ?>