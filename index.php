<?php

use Patient\QueuePatient;

include_once "vendor/autoload.php";

$queue= new QueuePatient();
$queue->enqueue("A",2);
$queue->enqueue("B",1);
$queue->enqueue("C",1);
$queue->enqueue("D",1);
$queue->enqueue("E",3);
$queue->enqueue("F",2);
$queue->enqueue("G",2);
$queue->enqueue("H",8);
$queue->enqueue("J",5);
$data = $queue->getData();
?>

<table style="border: 1px solid red">
    <tr>
        <td>Name</td>
        <td>Code</td>
    </tr>
    <?php foreach ($data as $key => $value): ?>
    <tr>
        <td><?php echo $key ?></td>
        <td><?php echo $value?></td>
    </tr>
    <?php endforeach;?>
</table>
