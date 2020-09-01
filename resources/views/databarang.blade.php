@extends('templates.master')

@push('css')
    
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('dkk')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('dkk')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@section('content')
@section('title', 'Toko Andreas | Data Barang')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Database Barang</h3>
              </div>
              <form method="POST" action="{{route('cekbox_delete')}}">
                <!-- /.card-header -->
                {{ csrf_field() }}
              <div style=" margin-left: 20px; margin-top: 15px">
                <button type="button" class="btn btn-normal far fa-plus-square btn-primary" 
                data-toggle="modal" data-target="#tambah_barang"> Tambah Data</button>
                <button type="submit" disabled name="hapus" class="btn btn-normal far fa-trash-alt btn-danger disabled hapus" onclick="return confirm('yakin ?, ingin menghapus datanya ?');"> Hapus</button>
                
              </div>
              <div class="card-body">
                <table id="databarang" class="table table-bordered table-striped text-center">
                  <thead>
                <tr>
                  <th >
                    No
                  </th>
                  <th class="no_order center">
                    <label>
                    <input type="checkbox" class="minimal" id="pilih_semua">
                  </label>
                </th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual kecil</th>
                  <th>Harga Jual Besar</th>
                  <th>Harga Jual Grosir</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($databarang as $barang)
                  <tr>
                    <td>{{$loop->iteration}}</td> <!-- tbody kudue dudu th, tapi td. wkwkwk -->
                    <td>
                      <label>
                      <input type="checkbox" name="id_barang[]" value="{{$barang->id}}" class="minimal pilih">
                      </label>
                    </-->
                    <td>{{$barang->barcode}}</td>
                    <td>{{$barang->nama_barang}}</td>
                    <td>{{$barang->stok}}</td>
                    <td>{{$barang->harga_beli}}</td>
                    <td>{{$barang->harga_jual_sedikit}}</td>
                    <td>{{$barang->harga_jual_banyak}}</td>
                    <td>{{$barang->harga_grosir}}</td>
                    <td class="no">
                      <a class="btn btn-xs btn-info" href="">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
              </form>

              <div class="modal fade" id="tambah_barang">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Barang</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('tambahbarang')}}" method="POST">
                        {{ csrf_field() }}
                        <!-- text input -->
                        <div class="form-group">
                          <label for="barcode">Barcode</label>
                          <input id="barcode"name="barcode" type="number" class="form-control" placeholder="Barcode" required>
                        </div>
                        <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input id="nama_barang"name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label for="stok">Stok</label>
                          <input id="stok" name="stok" type="number" class="form-control" placeholder="Stok" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_beli">Harga Beli</label>
                          <input id="harga_beli"name="harga_beli" type="number" class="form-control" placeholder="Harga Beli" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_jual_sedikit">Harga Jual Sedikit</label>
                          <input id="harga_jual_sedikit"name="harga_jual_sedikit" type="number" class="form-control" placeholder="Harga Jual Kecil" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_jual_banyak">Harga Jual Banyak</label>
                          <input id="harga_jual_banyak"name="harga_jual_banyak" type="number" class="form-control" placeholder="Harga Jual Besar" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_grosir">Harga Jual Grosir</label>
                          <input id="harga_grosir"name="harga_grosir" type="number" class="form-control" placeholder="Harga Jual Grosir" required>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button style="float:right" type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('js')
    

<script src="{{asset('dkk')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('dkk')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('dkk')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('dkk')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  // fungsi cekbox
	// fungsi saat ingin di check all atau dipilih semua
  $(document).on('click','.pilih',function(e){ //mulane nganggo document onclick class .pilih, dadi walaupun kena rwrite ng datatable teetep dienggo, karena selectore document
    let cbxlength = $('#databarang tbody input:checkbox:checked').length; //cari banyak cekbox yg di check pada tbody
    let allCbx = $('#databarang tbody input:checkbox').length; //cari semua checkbox pada tbody
    if (cbxlength == 0){ //jika banyak cekbox yg dicek adalalh 0
      $('.hapus').addClass('disabled').prop({'disabled':true}); //disable tombol hapus
    } else {
      $('.hapus').removeClass('disabled').prop({'disabled':false}); //enable tombol hapus
    }
    if (cbxlength == allCbx){ //jika banyak checkbox yg dicek sama dengan semua checkbox
      $('#pilih_semua').prop({'checked':true}); //check input cehckbox all
    } else {
      $('#pilih_semua').prop({'checked':false}); //uncheck input chekbox all
    }
  });

  $("#pilih_semua").change(function(){ //all cekbox
			$(".pilih").prop("checked", $(this).prop("checked"))
	});
</script>
{{--cekbox

fungsi datatable --}}
<script>
  $(function () {
    $('#databarang').DataTable({ //kenang menusa kien kih wkwkwk dadi ora kanggo tah ?
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "columnDefs": [ {
          "targets": 'no_order',
          "orderable": false,
          
    } ]
    });
  });
</script>
{{-- datatable

hapus data --}}
<script>
$("#").click(function(){
  Swal.fire({
  title: 'Hapus Data ?',
  text: "Apakah kamu yakin ingin menghapus barang ini",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
});
</script>
{{-- hapus data

tambah data --}}
@if(Session::has('tambah'))
<script>
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "Data berhasil ditambahkan !"
})
</script>
@endif
{{-- //tambah data --}}

@if(Session::has("hapus"))
<script>
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "Data berhasil dihapus !"
})
</script>
@endif

@endpush