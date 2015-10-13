<html>
    <head>
        <title> View Data Bukti</title>
    </head>
    <body>
    <h1><a href="tambah.php">Klik di Sini Untuk Tambah/Update Data</a> </h1>
    <?php
        //include "koneksi.php"
        //resources
        $url = 'http://localhost/sit/mhs.php';

        //mengambil data string resources
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);

        $datamahasiswaxml = simplexml_load_string($response);

        echo "<table border='1'>
                <tr>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Prodi</td>
                </tr>";

        foreach($datamahasiswaxml->mahasiswa as $mahasiswa)
        {
            echo "
                  <tr>
                      <td>".$mahasiswa->nim."</td>
                      <td>".$mahasiswa->nama."</td>
                      <td>".$mahasiswa->alamat."</td>
                      <td>".$mahasiswa->prodi."</td>
                   </tr>";
        }
        echo "</table>";
    ?>
    </body>
</html>