<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Dosen</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Dosen</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Dosen</h3>
        </div>
        <div class="panel-body">

            <div class="pull-right">
                <a href="dosen_tambah.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Dosen</a>
            </div>
            <br>
            <br>
            <br>

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="5%">Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $dosen = mysqli_query($koneksi,"SELECT * FROM dosen ORDER BY dosen_id DESC");
                    while($p = mysqli_fetch_array($dosen)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <?php 
                                if($p['dosen_foto'] == ""){
                                    ?>
                                    <img class="img-dosen" src="../gambar/sistem/dosen.png">
                                    <?php
                                }else{
                                    ?>
                                    <img class="img-user" src="../gambar/dosen/<?php echo $p['dosen_foto']; ?>">
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $p['dosen_nama'] ?></td>
                            <td><?php echo $p['dosen_username'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="dosen_edit.php?id=<?php echo $p['dosen_id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                    <a href="dosen_hapus.php?id=<?php echo $p['dosen_id']; ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>