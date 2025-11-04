<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styleTugas3.css" rel="stylesheet">
</head>
<body>
    <nav>
        <a id="utama" href="index.php">Kabar Kampus</a>
        <a href="index.php"><button type="button" class="btn btn-danger">Kembali</button></a>
    </nav>
    <div class="form">
        <form action="./process/create_pendaftar.php" method="POST">
            <label class="judul">Formulir Pendaftaran Akun</label><hr>

            <div id="c">
                <div id="a">
                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                    <input name="nama" required class="form-control" type="text" id="namaLengkap" placeholder="Masukkan nama Anda">

                    <div class="mb-3">
                        <label for="noTelp" class="form-label mt-2">Nomor Telepon</label>
                        <input name="no_hp" required type="text" class="form-control" id="noTelp" placeholder="08xxxxxxxxxx">
                    </div>                     
                </div>

                <div id="b">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" required class="form-control" type="email" id="email" placeholder="contoh@email.com">

                    <div class="mb-3">
                        <label for="password" class="form-label mt-2">Password</label>
                        <input name="password" required type="password" class="form-control" id="password">
                    </div>                                       
                </div>  
            </div>

            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" id="jurusan" required class="form-select">
                <option selected disabled>Pilih Jurusan ...</option>
                <option value="if">Informatika</option>
                <option value="si">Sistem Informasi</option>
                <option value="ilkom">Ilmu Komputer</option>
                <option value="ti">Teknologi Informasi</option>
            </select>           

            <label class="form-label mt-3">minat_topik Topik (Bisa pilih lebih dari satu)</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="minat_topik[]" value="Event Kampus" id="check1">
                <label class="form-check-label" for="check1">Event Kampus</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="minat_topik[]" value="Teknologi" id="check2">
                <label class="form-check-label" for="check2">Teknologi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="minat_topik[]" value="Politik" id="check3">
                <label class="form-check-label" for="check3">Politik</label>
            </div>            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="minat_topik[]" value="Musik" id="check4">
                <label class="form-check-label" for="check4">Musik</label>
            </div>

            <label class="form-label mt-3">Gender</label>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="gender" value="Laki-Laki" id="gender1">
                <label class="form-check-label" for="gender1">Laki-Laki</label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="gender" value="Perempuan" id="gender2">
                <label class="form-check-label" for="gender2">Perempuan</label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="gender" value="Lainnya" id="gender3">
                <label class="form-check-label" for="gender3">Lainnya</label>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">Alasan Bergabung</label>
                <textarea required class="form-control" name="alasan" rows="3"></textarea>
            </div>

            <div id="d">
                <button type="submit" class="btn btn-primary" style="width: 80%;">Daftar Sekarang</button>
                <button type="reset" class="btn btn-danger" style="width: 20%;">Reset</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
</body>
</html>
