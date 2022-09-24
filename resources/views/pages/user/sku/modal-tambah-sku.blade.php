<!-- Modal -->
<div class="modal fade" id="skuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Keterangan Usaha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('sku.store') }}" method="POST" enctype="multipart/form-data"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">NIK</label>
                                <input type="number" class="form-control" id="no_nik" name="no_nik"
                                    placeholder="Masukkan nomor nik" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Nama Usaha</label>
                                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                    placeholder="Masukkan nama usaha" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    placeholder="Masukkan tempat lahir" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    placeholder="Masukkan tanggal lahir" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    placeholder="Masukkan pekerjaan" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Status Perkawinan</label>
                                <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan"
                                    placeholder="Masukkan status perkawinan" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Agama</label>
                                <select class="form-control" id="agama" name="agama" required>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    placeholder="Masukkan kecamatan" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                    placeholder="Masukkan kelurahan" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">RT / RW</label>
                                <input type="text" class="form-control" id="rt_rw" name="rt_rw"
                                    placeholder="Masukkan RT/RW" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Masukkan alamat" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Foto KTP</label>
                                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Foto KK</label>
                                <input type="file" class="form-control" id="foto_kk" name="foto_kk" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Surat Keterangan RT/RW</label>
                                <input type="file" class="form-control" id="foto_surat_rt_rw" name="foto_surat_rt_rw"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-4">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>