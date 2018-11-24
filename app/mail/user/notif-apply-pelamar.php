<?php

use \yii\helpers\HtmlPurifier;
?>

<p>Berikut ini adalah informasi data yang telah Anda masukkan ke aplikasi <?= \Yii::$app->name ?></p>
<table>
    <tbody>
        <tr>
            <th>Nama Pelamar</th>
            <td><?= $params['nama'] ?></td>
        </tr>
        <tr>
            <th>Usia</th>
            <td><?= $params['usia'] ?></td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td><?= HtmlPurifier::process($params['pendidikan']) ?></td>
        </tr>
        <tr>
            <th>Jabatan yang dilamar</th>
            <td><?= HtmlPurifier::process($params['jabatan']) ?></td>
        </tr>
        <tr>
            <th>No. Telp/HP</th>
            <td><?= $params['no_telp'] ?></td>
        </tr>
        <tr>
            <th>Berkas File CV</th>
            <td><a href="<?= $params['cv'] ?>">Download</a></td>
        </tr>
    </tbody>
</table>