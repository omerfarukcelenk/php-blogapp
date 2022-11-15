
<?php foreach ($users as $key => $value) : ?>

<tr>
    <td scope="row"><?php echo $value['isim'] ?></td>
    <td><?php echo $value['meslek'] ?></td>
    <td><?php echo $value['yas'] ?></td>
</tr>


<?php endforeach; ?>