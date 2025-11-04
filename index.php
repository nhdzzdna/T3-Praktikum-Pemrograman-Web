<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"/>

    <link rel="stylesheet" href="styleTugas3.css">
    <title>Utama</title>
</head>
<body style="margin: 0;">
    <nav>
        <a id="utama" href="index.php">Kabar Kampus</a>
        <a href="form.php"><button type="button" class="btn btn-success">Form Registrasi</button></a>
    </nav>
    <div class="isi">
        <h1>Dashboard Pendaftaran</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Gender</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                require "./process/koneksi.php";

                $query = "SELECT * FROM pendaftar";
                $result = mysqli_query($koneksi, $query);
                $no = 1;

                if(mysqli_num_rows($result) > 0){
                    while ($data = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jurusan'] ?></td>
                            <td><?= $data['gender'] ?></td>
                            <td style="display: flex; gap: 5px;">
                                <a href="view_pendaftar.php?id=<?= $data['id'] ?>"><button class="btn btn-primary"><i class="bi bi-eye"></i></button></a>                          
                                <a href="update_page.php?id=<?= $data['id'] ?>"<button class="btn btn-warning"><i class="bi bi-pencil"></i></button></a>
                                <a href="./process/delete_pendaftar.php?id=<?= $data['id'] ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            </td>
                        </tr>
                <?php }
                }else{?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data</td>
                    </tr>
            <?php }?>
            </tbody>
        </table>           
    </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>