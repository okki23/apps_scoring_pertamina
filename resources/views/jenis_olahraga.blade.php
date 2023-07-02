@extends('layouts.app')

@section('content')

<div class="card card-statistics widget-blog-contant">
  <div class="card-header">
      <div class="card-heading">
          <h4 class="card-title">Jenis Olahraga</h4>
      </div>
  </div>
  <div class="card-body">
    <button class="btn btn-primary" onclick="openModal();">Tambah Data</button>
    {{-- <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modal-large" data-backdrop="static" data-keyboard="false">
      Tambah Data
    </a> --}}
    <br>
    &nbsp;

    <div class="modal modal-blur fade"  data-bs-keyboard="false" data-bs-backdrop="static" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Form Tambah / Ubah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal-large" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-md-6 col-xl-12">
              <form method="POST" enctype="multipart/form-data" id="my-form">
                @csrf
                <input type="hidden" name="id" id="id"> 
                <div class="mb-3">
                  <label class="form-label">Nama Jenis Olahraga</label>
                  <input type="text" name="nama_jenis_olahraga" id="nama_jenis_olahraga" class="form-control onlytext" >
                </div>
                
               </form>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal" onclick="closeModal();">Tutup</button>
            <button type="button" onclick="savebtn();" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
          </div>
        </div>
      </div>
    </div>


    <div class="table-responsive"> 
      <table id="example" class="table table-bordered table-hovered" style="width:100%">
        <thead>
            <tr> 
                <th>Nama Jenis Olahraga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
        </tbody>
      </table>
        
  </div>
</div>

{{--  
Route::get('/jenisor',[JenisOlahragaController::class,'index'])->name('jenisor');
Route::post('jenisor_save',[JenisOlahragaController::class,'save'])->name('jenisor_save');
Route::get('/jenisor_all',[JenisOlahragaController::class,'jenisor_all_data'])->name('jenisor_all_data');
Route::post('/jenisor_destroy',[JenisOlahragaController::class,'jenisor_destroy'])->name('jenisor_destroy');
Route::post('/jenisor_put',[JenisOlahragaController::class,'jenisor_put'])->name('jenisor_put'); --}}

<script> 
  
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

  function clearinput(){
        $("input").val("");
  }

  function closeModal(){
     $('#modal-large').modal('hide'); 
  }

  function openModal(){
    clearinput();
    $('#modal-large').modal({ show: true });
  }


  function savebtn(){   
        var form = $('#my-form')[0]; 
        var data = new FormData(form);    
            $.ajax({ 
            type: "POST", 
            enctype: 'multipart/form-data', 
            url:"{{ route('jenisor_save') }}", 
            data: data, 
            processData: false, 
            contentType: false, 
            cache: false, 
            timeout: 800000, 
            success: function (data) { 
                console.log("SUCCESS : ", data);  
                closeModal();
                $('#example').DataTable().ajax.reload(); 
                clearinput();
            },

            error: function (e) { 
                console.log("ERROR : ", e);   
                closeModal();
                $('#example').DataTable().ajax.reload();
                clearinput();
            } 
        });   
  }

  function DeleteData(id){ 
        let token = $('meta[name="csrf_token"]').attr('content');
        $.ajax({ 
        url: "{{ route('jenisor_destroy') }}",
        data: {_token: token, id: id},
        type: "POST",
        dataType:"json",
        success: function(res){ 
          console.log("SUCCESS : ", data);  
          $('#example').DataTable().ajax.reload();
        },
        error: function (e) { 
          console.log("ERROR : ", e);   
          $('#example').DataTable().ajax.reload() 
        } 
       });
    }
    function UbahData(id){
        
        $.ajax({
          url:  "{{ route('jenisor_put') }}",
          data: {id:id},
          type: "POST",
          success: function(result){
            console.log(result);
            $("#id").val(result.id);
            $("#nama_jenis_olahraga").val(result.nama_jenis_olahraga);   
          }
        })
        $('#modal-large').modal({ show: true });
    }
  
  $(function () { 
      var table = $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('jenisor_all_data') }}",
          columns: [
              {data: 'nama_jenis_olahraga', name: 'nama_jenis_olahraga'},
              {data: 'action', name: 'action', orderable: false, searchable: false}, 
          ]
      });  
      
  });
  
</script>
@endsection
