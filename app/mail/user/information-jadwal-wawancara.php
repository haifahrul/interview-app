<?php


?>

<?php if ($params['is_pelamar']) { ?>
    <p>Halo <b><?= $params['kandidat'] ?>,</b></p>    

    <p>Berikut ini adalah jadwal wawancara Anda:</p>
    <table>
        <tbody>
            <tr>
                <th>Tanggal : </th>
                <td><?= \Yii::$app->formatter->asDate($params['tanggal']) ?></td>
            </tr>
    <!--            <tr>
                <th>Lokasi</th>
                <td><?= $params['lokasi'] ?></td>
            </tr>-->
        </tbody>
    </table>
    <p>
        Terima kasih <br>
        <b>HRD Yarsi</b>
    </p>
<?php } else { ?>
    <p>Dear <b><?= $params['interviewer'] ?></b>,</p>

    <p>Berikut ini adalah jadwal wawancara Anda:</p>
    <table>
        <tbody>
            <tr>
                <th>Tanggal : </th>
                <td><?= \Yii::$app->formatter->asDate($params['tanggal']) ?></td>
            </tr>
    <!--            <tr>
                <th>Lokasi</th>
                <td><?= $params['lokasi'] ?></td>
            </tr>-->
            <tr>
                <th>Nama Kandidat : </th>
                <td><?= $params['kandidat'] ?></td>
            </tr>
            <tr>
                <th>No. Telp/HP : </th>
                <td><?= $params['phone'] ?></td>
            </tr>
    <!--            <tr>
                <th>File CV</th>
                <td><a href="">Download</a></td>
            </tr>-->
        </tbody>
    </table>
    <p>Untuk informasi data kandidat yang lebih lengkapnya, silahkan login ke aplikasi.</p>
<?php } ?>
