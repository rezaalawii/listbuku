<?php 
$connect = mysqli_connect("localhost","root","","listbuku");

function read($data){
    global $connect;
    $result = mysqli_query($connect,$data);
    $buku = [];
    while ($bk = mysqli_fetch_array($result)){
        $buku[]=$bk;
    }
    return $buku;
}

function create($data){
    global $connect;
    $judul = htmlspecialchars($data['judul']);
    $pengarang = htmlspecialchars($data['pengarang']);
    $halaman = htmlspecialchars($data['halaman']);
    $tahun = htmlspecialchars($data['tahun']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $foto = $_FILES["foto"]["name"]; 
    $temp = $_FILES["foto"]["tmp_name"]; 
    $folder = "img/" . $foto; 
    move_uploaded_file($temp, $folder); 


    $query = "insert into bukureza values 
    (null, '$judul','$pengarang','$halaman','$tahun','$penerbit','$foto')";
    mysqli_query($connect,$query);
    return mysqli_affected_rows($connect);

}
?>