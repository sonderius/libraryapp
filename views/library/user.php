<?php //here you can choose user ?>
<label for="user-select">Vyberte uživatela:</label>


<select id="user-select" name="userId">
    <option value="">Nikto</option>
    <?php foreach ($users as $user): ?>
        <option value="<?= $user->user_number ?>"><?= $user->name ?></option>
    <?php endforeach; ?>
</select>