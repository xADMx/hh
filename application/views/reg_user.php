<?php
defined('BASEPATH') OR exit('No direct script access allowed');
form_open('registration/reguser/reg');
?>
<label for="Login">Логин</label>
<input type="text" name="login" value="<?php echo set_value('login'); ?>", 'placeholder' => 'Введите ваш логин'/>
<label for="FIO">ФИО</label>
<input type="text" name="fio" value="<?php echo set_value('fio'); ?>", 'placeholder' => 'Введите ваше ФИО'/>
<label for="Phone">Телефон</label>
<input type="text" name="phone" value="<?php echo set_value('phone'); ?>", 'placeholder' => 'Введите ваш телефон'/>
<label for="Email">E-mail</label>
<input type="text" name="email" value="<?php echo set_value('email'); ?>", 'placeholder' => 'Введите ваш E-Mail'/>
<div><input type="submit" value="Зарегистрироваться" /></div>
</form>