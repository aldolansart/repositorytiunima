<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview Laporan</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Laporan</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Preview Laporan</h3>
                </div>
                <div class="panel-body">

                    <a href="laporan.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM laporan,kategori,mahasiswa WHERE laporan_mahasiswa=mahasiswa_id and laporan_kategori=kategori_id and laporan_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>NIM</th>
                                        <td><?php echo $d['laporan_kode']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Upload</th>
                                        <td><?php echo date('H:i:s  d-m-Y',strtotime($d['laporan_waktu_upload'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama File</th>
                                        <td><?php echo $d['laporan_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pembimbing KP</th>
                                        <td><?php echo $d['kategori_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis File</th>
                                        <td><?php echo $d['laporan_jenis']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Pengupload</th>
                                        <td><?php echo $d['mahasiswa_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan/Tempat KP</th>
                                        <td><?php echo $d['laporan_keterangan']; ?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-lg-8">

                                <?php 
                                if($d['laporan_jenis'] == "png" || $d['laporan_jenis'] == "jpg" || $d['laporan_jenis'] == "gif" || $d['laporan_jenis'] == "jpeg"){
                                    ?>
                                    <img src="../laporan/<?php echo $d['laporan_file']; ?>">
                                    
                                    <?php
                                }elseif($d['laporan_jenis'] == "pdf"){
                                    ?>

                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../laporan/<?php echo $d['laporan_file']; ?>"></a>
                                    </div>

                                    <?php
                                }else{
                                    ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../laporan/<?php echo $d['laporan_file']; ?>">Download di sini.</a></p>.
                                    <?php
                                }
                                ?>

                            </div>
                        </div>







                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>



<?php include 'footer.php'; ?>