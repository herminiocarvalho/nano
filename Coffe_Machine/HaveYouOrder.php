<?php
$order = file_get_contents('order.txt');
file_put_contents('order.txt', '');

echo $order ;
?>