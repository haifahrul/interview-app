<p>Berikut ini adalah informasi akun Anda untuk login ke aplikasi <?= \Yii::$app->name ?></p>
<table>
    <tbody>
        <tr>
            <th>Nama</th>
            <td><?= $params['nama'] ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?= $params['email'] ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?= $params['password'] ?></td>
        </tr>
    </tbody>
</table>