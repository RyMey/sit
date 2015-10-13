<?php
    //header untuk format xml, jk dihilangkan maka akan berbentuk data string
    header('Content-Type: text/xml; charset=ISO-8859-1');
    include "koneksi.php";

    //cek key di array server
    if(array_key_exists('PATH_INFO',$_SERVER))
    {
        $path = $_SERVER['PATH_INFO'];
    }
    else
    {
        $path = null;
    }

    if($path!=null)
    {
        $path_params = spliti("/",$path);
    }
    else
    {
        $path_params = null;
    }

    //metode request GET
    if($_SERVER['REQUEST_METHOD']=='GET')
    {
        if($path_params[1]!=null)
        {
            $query = "select * from mahasiswa where nim= $path_params[1]";
        }
        else
        {
            $query = "select * from mahasiswa";
        }
        $result = mysql_query($query) or die ('Query Failed : '.mysql_error());
        echo "<data>";
        while ($line = mysql_fetch_array($result,MYSQL_ASSOC))
        {
            echo "<mahasiswa>";
            foreach ($line as $key => $col_value)
            {
                echo "<$key>$col_value</$key>";
            }
            echo "</mahasiswa>";
        }
        echo "</data>";



        mysql_freeresult($result);
    }
    //metode request untuk get
    else if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //$input = file_get_contents("php://input");
        //echo $_POST['nim'];

        $querycek = "select * from mahasiswa where nim=".$_POST['nim'];
        $result = mysql_query($querycek);
        $num_rows = mysql_num_rows($result);
        if($num_rows==0)
        {
            $query = "insert into mahasiswa (nim,nama,alamat,prodi) VALUES(
                      ".$_POST['nim'].",
                      '".$_POST['nama']."',
                      '".$_POST['alamat']."',
                      '".$_POST['prodi']."')";
        }
        else if($num_rows==1)
        {
            $query = "update mahasiswa set
                      nama='".$_POST['nama']."',
                      alamat='".$_POST['alamat']."',
                      prodi='".$_POST['prodi']."'
                      where nim =".$_POST['nim'];
        }
        $result = mysql_query($query) or die('Query failed : '.mysql_error());

        header('Location: view_mahasiswa.php');
    }

    mysql_close($link);
?>