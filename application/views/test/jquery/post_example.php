<h2>POST JQuery Example</h2>

<div id="errors" style="display: none;"  >Form Errors</div>
<?= form_open('test/jquery/process_form', 'id="post_form"') ?>
<label>First Name : </label>
<?= form_input('first_name', set_value('first_name', 'First Name'), 'id="first_name"') ?>

<label>Last Name : </label>
<?= form_input('last_name', set_value('last_name', 'Last Name'), 'id="last_name"') ?>

<?= form_submit('submit', 'submit') ?>
<?= form_close() ?>