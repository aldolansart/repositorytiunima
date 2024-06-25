<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Laporan</h4>
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


    <div class="panel">

        <div class="panel-body">

            <form method="get" action="">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Filter Laporan</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih Pembimbing KP</option>
                                <?php 
                                $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                                while($k = mysqli_fetch_array($kategori)){
                                    ?>
                                    <option <?php if(isset($_GET['kategori'])){if($_GET['kategori'] == $k['kategori_id']){echo "selected='selected'";}} ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div>

                </div>

            </form>

        </div>

    </div>



    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Laporan</h3>
        </div>
        <div class="panel-body">

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
               <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nomor Induk Mahasiswa</th>
                        <th>Laporan</th>
                        <th>Mahasiswa</th>
                        <th>Pembimbing KP</th>
                        <th>Keterangan/Tempat KP</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $no = 1;
                    if(isset($_GET['kategori'])){
                        $kategori = $_GET['kategori'];
                        $laporan = mysqli_query($koneksi,"SELECT * FROM laporan,kategori,mahasiswa WHERE laporan_mahasiswa=mahasiswa_id and laporan_kategori=kategori_id and laporan_kategori='$kategori' ORDER BY laporan_id DESC");
                    }else{
                        $laporan = mysqli_query($koneksi,"SELECT * FROM laporan,kategori,mahasiswa WHERE laporan_mahasiswa=mahasiswa_id and laporan_kategori=kategori_id ORDER BY laporan_id DESC");
                    }
                    while($p = mysqli_fetch_array($laporan)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>

                             <td>
                           <!--     <?php echo date('H:i:s  d-m-Y',strtotime($p['laporan_waktu_upload'])) ?>
                                <b>Tempat KP</b> :--> <?php echo $p['laporan_kode'] ?><br>
                            </td>
                            <td>

                                
                                <b>Proyek</b> : <?php echo $p['laporan_nama'] ?><br>
                                <!--<b>Jenis</b> : <?php echo $p['laporan_jenis'] ?><br> -->

                            </td>
                            
                            <td><?php echo $p['mahasiswa_nama'] ?></td>
                            <td><?php echo $p['kategori_nama'] ?></td>
                            <td><?php echo $p['laporan_keterangan'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <!-- <a target="_blank" class="btn btn-default" href="../laporan/<?php echo $p['laporan_file']; ?>"><i class="fa fa-download"></i></a> -->
                                    <a target="_blank" class="btn btn-default" href="laporan_download.php?id=<?php echo $p['laporan_id']; ?>"><i class="fa fa-download"></i></a>
                                    <a target="_blank" href="laporan_preview.php?id=<?php echo $p['laporan_id']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
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