<?php
defined('BASEPATH') OR exit('No direct script access allowed');
form_open('registration/reguser/reg');
?>
<label for="Login">�����</label>
<input type="text" name="login" value="<?php echo set_value('login'); ?>", 'placeholder' => '������� ��� �����'/>
<label for="FIO">���</label>
<input type="text" name="fio" value="<?php echo set_value('fio'); ?>", 'placeholder' => '������� ���� ���'/>
<label for="Phone">�������</label>
<input type="text" name="phone" value="<?php echo set_value('phone'); ?>", 'placeholder' => '������� ��� �������'/>
<label for="Email">E-mail</label>
<input type="text" name="email" value="<?php echo set_value('email'); ?>", 'placeholder' => '������� ��� E-Mail'/>
<div><input type="submit" value="������������������" /></div>
</form>