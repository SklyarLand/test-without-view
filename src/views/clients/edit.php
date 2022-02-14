<?php
/**
 * @var $client array
 */
?>
<h1>Редактирование клиента <?= $client['id'] ?></h1>
<input type="hidden" name="id" value="<?= $client['id'] ?>">
<div class="container-fluid mt-3 px-0">
    <label for="fio">Введите ФИО:</label><br>
    <input name='fio' class="w-100" id='fio' type="text" placeholder='имя' value="<?= $client['fio'] ?>" required>
</div>
<div class="container-fluid mt-3 px-0">
    <label for="phone">Введите Телефон:</label><br>
    <input name='phone' class="w-100" id='phone' type="phone" size='50' value="<?= $client['phone'] ?>" required>
</div>
<div class="container-fluid mt-3 px-0">
    <label for="desc">Введите Кем приходится:</label><br>
    <input name='desc' class="w-100" id='desc' type="text" size='50' value="<?= $client['desc'] ?>" required>
</div>
<div class="container-fluid mt-5 px-0" >
    <input type="submit" value='Обновить' class="btn btn-primary" >
</div>
