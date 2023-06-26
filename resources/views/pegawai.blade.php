@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">

        <h1> Pegawai </h1> 
         
        {{-- <button class="btn btn-primary">Add Data</button> --}}
        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-large" data-backdrop="static" data-keyboard="false">
          Tambah Data
        </a>
        <br>
        <div class="modal modal-blur fade"  data-bs-keyboard="false" data-bs-backdrop="static" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Form Tambah / Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="col-md-6 col-xl-12">
                  <form method="POST" enctype="multipart/form-data" id="my-form">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nopek</label>
                      <input type="text" name="nopek" id="nopek" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control onlytext" >
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nomor WA</label>
                      <input type="text" name="no_wa" id="no_wa" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                    </div>

                    <div class="mb-3">
                      <div class="form-label">Jenis Pekerjaan</div>
                      
                      <select class="form-select" name="id_jenis_pekerjaan" id="id_jenis_pekerjaan"> 
                        <option value="">--Pilih Jenis Pekerjaan</option>
                        @foreach($jenis_pekerjaan as $kjp => $vjp)
                        <option value="{{ $vjp->id }}"> {{ $vjp->nama_jenis_pekerjaan }} </option>
                        @endforeach 
                      </select>
                    </div>

                    <div class="mb-3">
                      <div class="form-label">Fungsi</div>
                      <select class="form-select" name="id_fungsi" id="id_fungsi"> 
                        <option value="">--Pilih Fungsi Pekerjaan</option>
                        {{-- {{ dd($fungsi_pekerjaan)n }} --}}
                        @foreach($fungsi_pekerjaan as $fjp => $vfp)
                        <option value="{{ $vfp->id }}"> {{ $vfp->nama_fungsi_pekerjaan }} </option>
                        @endforeach 
                      </select>
                    </div>

                    <div class="mb-3">
                      <div class="form-label">Lokasi Kerja</div>
                      <select class="form-select" name="id_lokasi_kerja" id="id_lokasi_kerja"> 
                        <option value="">--Pilih Lokasi Pekerjaan</option>
                        {{-- {{ dd($fungsi_pekerjaan)n }} --}}
                        @foreach($lokasi_pekerjaan as $lkp => $vkp)
                        <option value="{{ $vkp->id }}"> {{ $vkp->nama_lokasi_pekerjaan }} </option>
                        @endforeach 
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <div class="form-label">Kategori</div>
                      <select class="form-select" name="id_kategori" id="id_kategori"> 
                        <option value="">--Pilih Kategori</option>
                        {{-- {{ dd($fungsi_pekerjaan)n }} --}}
                        @foreach($kategori as $kpk => $vpk)
                        <option value="{{ $vpk->id }}"> {{ $vpk->nama_kategori }} </option>
                        @endforeach 
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Tinggi Badan (cm) </label>
                      <input type="text" name="tinggi_badan" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="tinggi_badan" class="form-control" >
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Berat Badan (kg) </label>
                      <input type="text" name="berat_badan" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="berat_badan" class="form-control" >
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Size Baju</label>
                      <select name="size_baju" id="size_baju" class="form-control">
                        <option value="">--Pilih Ukuran--</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                      </select>
                     {{-- <div class="mb-3">
                      <label class="form-label">Foto</label>
                      <input type="file" name="foto" id="foto">
                     </div> --}}
                  
                    </div>  
                   </form>
                </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="savebtn();" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        &nbsp;
        <div class="card">
          <div class="table-responsive">
            

            <table id="example" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>Nopek</th>
                      <th>Nama</th>
                      <th>Fungsi</th>
                      <th>Lokasi</th>
                      <th>Ukuran Baju</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  
                   
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
<script>
 

  $(document).ready(function () {
    $('#example').DataTable();
  });

  $(".onlytext").keypress(function(e) {
        var key = e.keyCode;
          if (key >= 48 && key <= 57) {
             e.preventDefault();
          } 
  });

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
  function savebtn(){  
    
    var formData = {
      // foto : $('#foto').prop('files')[0].name,
      nopek: $("#nopek").val(),
      nama: $("#nama").val(),
      id_jenis_pekerjaan: $("#id_jenis_pekerjaan").val(),
      id_fungsi: $("#id_fungsi").val(),
      id_lokasi_kerja: $("#id_lokasi_kerja").val(),
      id_kategori: $("#id_kategori").val(),
      no_wa: $("#no_wa").val(),
      tinggi_badan: $("#tinggi_badan").val(),
      berat_badan: $("#berat_badan").val(),
      size_baju: $("#size_baju").val(),
    }; 

    $.ajax({
      url: '{{ route('pegawai_save') }}',
      data: formData,
      type: 'POST',
      success: function(result){
        console.log(result);
      }
    });
    // console.log(formData); 
  }
</script>
@endsection
