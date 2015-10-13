<?php
	
	//1.Koneksi ke database
	$konek = mysql_connect("localhost","root","");
	$db = mysql_select_db("mhs");

	if($konek)
	{
		echo("1. Selamat Database telah terkoneksikan<br>");
	}
	else
	{
		echo("1. Maaf Database tidak terkoneksi<br>");
	}

	if($db)
	{
		echo("2. Selamat Database yang dicari ditemukan<br>");
	}
	else
	{
		echo("2. Maaf database tidak ada");
	}

	//2.query ke database
	$query="select * from mhs";
	$hasil=mysql_query($query);
	$data_mahasiswa=array();

	while($data=mysql_fetch_array($hasil))
	{
		$data_mahasiswa[] = array(
			'nim' => $data['nim'],
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'prodi'=>$data['prodi']
			);
		//echo $data['nim']."<br>";
	}

	//3.parsing data XML
	$document = new DOMDocument();
	$document->formatOutput=true;
	$root=$document->createElement("data");
	$document->appendChild($root);

	foreach ($data_mahasiswa as $mahasiswa)
	{
		$block=$document->createElement("mahasiswa");

		//membuat element nim
		$nim=$document->createElement("nim");
		//createElement untuk membuat element baru
		$nim->appendChild($document->createTextNode($mahasiswa['nim']));
		//createTextNode untuk menampilkan isi/value
		$block->appendChild($nim);
		//appendChild untuk mempersiapkan nilai dari element diatasnya

		//membuat element nama
		$nama=$document->createElement("nama");
		$nama->appendChild($document->createTextNode($mahasiswa['nama']));
		$block->appendChild($nama);

		//membuat element alamat
		$alamat=$document->createElement("alamat");
		$alamat->appendChild($document->createTextNode($mahasiswa['alamat']));
		$block->appendChild($alamat);

		//membuat element prodi
		$prodi=$document->createElement("prodi");
		$prodi->appendChild($document->createTextNode($mahasiswa['prodi']));
		$block->appendChild($prodi);

		$root->appendChild($block);
	}

	//4.Menyimpan data dalam bentuk file XML
		$generatorXML=$document->save("mahasiswa.xml");
		if($generatorXML)
		{
			echo ("3. Data Mahasiswa berhasil di generate<br>");
		}
		else
		{
			echo ("3. Data Mahasiswa gagal di generate<br>");
		}

	//5.Membaca file XML
		//a.membuka file
	$url="http://localhost/sit/mahasiswa.xml";
	$client=curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	$response=curl_exec($client);
	curl_close($client);
		//b.membaca file

	//6.Ditampilkan dalam entuk HTML
	$datamahasiswaxml = simplexml_load_string($response);
	//print_r($datamahasiswaxml); //mengeluarkan isi[kolom]

	echo "4. Tampilan Daftar Mahasiswa :<br>";
	//perulangan
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