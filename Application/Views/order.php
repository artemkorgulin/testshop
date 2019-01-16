<h1>Оформление заказа</h1>
<a href="/cart"><<< Назад в корзину</a>
<br/>
<?php if($error){ echo $error; }?><br/>
<?php
if($dislpay_form){?>
<form action="" method="post">
<table class="table_order_form"> 
<tr bgcolor="#F2F2F2"><td>Ф.И.О.</td><td><input type="text" name="fio" value="<?=$_REQUEST['fio']?>"/></td></tr>
<tr bgcolor="lightgray"><td>E-mail<span style="color: red;">*</span></td><td><input type="text" name="email" value="<?=$_REQUEST['email']?>"/></td></tr>
<tr bgcolor="#F2F2F2"><td>Телефон</td><td><input type="text" name="phone" value="<?=$_REQUEST['phone']?>"/></td></tr>
<tr bgcolor="lightgray"><td>Адрес</td><td><textarea name="adres"><?=$_REQUEST['adres']?></textarea></td></tr>
</table>
<br/>
<input type="submit" name="to_order" value="Оформить заказ">
</form>
<?php }
else{ echo $message; };
?>
