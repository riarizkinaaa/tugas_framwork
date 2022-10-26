@extends('layouts.template')
@section('content')


<!-- modal tambah data -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/produk/tambah" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kategori_id">Nama kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control select2" style="width: 100%;">
                                        <option selected>--pilih kategori produk--</option>
                                        @foreach($kategori as $val)
                                        <option value="<?= $val->kategori_id ?>"><?= $val->kategori ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="nama produk">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" placeholder="dekripsi">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" class="form-control" placeholder="harga">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" class="form-control" placeholder="stok">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end-modal tambah data -->

<!-- modal edit data -->
@foreach($produk_join as $pj)
<div class="modal fade" id="modalEdit<?= $pj->produk_id ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/produk/update" method="post">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="hidden" name="produk_id" value="<?= $pj->produk_id ?>" class="form-control">
                                    <label for="kategori_id">Nama kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control select2" style="width: 100%;">
                                        <option value="<?= $pj->kategori_id ?>" selected><?= $pj->kategori ?></option>
                                        @foreach($produk_join as $row)
                                        <option value="<?= $row->kategori_id ?>"><?= $row->kategori ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="<?= $pj->nama ?>" class="form-control" placeholder="nama produk">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" value="<?= $pj->deskripsi ?>" class="form-control" placeholder="deskripsi">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" value="<?= $pj->harga ?>" class="form-control" placeholder="harga">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" value="<?= $pj->stok ?>" class="form-control" placeholder="stok">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- end-modal edit data -->

<!-- modal hapus data -->
@foreach($produk_join as $row)
<div class="modal fade" id="modalHapus<?= $row->produk_id ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" value="<?= $row->produk_id ?>" name="produk_id">
                <p>Yakin ingin menghapus data ini...?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                <a href="/produk/destroy/{{$row->produk_id}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- end-modal hapus data -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="text-center">Data produk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- modal add-data -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTambah">
                                <i class="fas fa-plus"></i>
                                <span class="ml-2">Tambah</span>
                            </button>
                            <!-- end-modal add-data -->
                        </div>
                        <!-- /.card-header -->
                        <div class="table-responsive">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama kategori</th>
                                            <th>Nama produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $i = 1 ?>
                                        @foreach($produk_join as $prdk)
                                        <tr>
                                            <td><b><?= $i++ ?></b></td>
                                            <td><?= $prdk->kategori ?></td>
                                            <td><?= $prdk->nama ?></td>
                                            <td><?= $prdk->deskripsi ?></td>
                                            <td><?= $prdk->harga ?></td>
                                            <td><?= $prdk->stok ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- modal add-data -->
                                                    <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#modalEdit<?= $prdk->produk_id ?>">
                                                        <i class="far fa-edit">Edit</i>
                                                    </button>
                                                    <!-- end-modal add-data -->
                                                    <!-- modal hapus data -->
                                                    <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#modalHapus<?= $prdk->produk_id ?>">
                                                        <i class="far fa-trash-alt">Delete</i>
                                                    </button>
                                                    <!-- end-modal hapus data -->
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- /.card -->
@endsection