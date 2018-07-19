@extends('layout.main')

@section('title', 'Admin Rentbro')

@section('content')
   
   <div class="row bg-title">
       <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Category</h4>
       </div>

       <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
         <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>            
            <a href="{{ URL('category/create') }}" class="btn btn-success btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" target="_top"> <i class="fa fa-plus"></i> Tambah Category</a>
            <ol class="breadcrumb">
               <li><a href="{{ url('/') }}">Dashboard</a></li>
               <li class="active">Category</li>
            </ol>
         </div>
       <!-- /.col-lg-12 -->
    </div>

   <div class="row">
         <div class="col-sm-12">
            <div class="white-box">
            <h3 class="box-title">Data Category</h3>
            <div class="table-responsive">            
               <table class="table color-table info-table" id="category">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Other Name</th>
                            <th>Alias</th>
                            <th>Icon</th>
                            <th></th>
                        </tr>
                    </thead>
               </table>
            </div>
         </div>
      </div>
   </div>

@endsection

@section('script')
   <script>
      function remove()
      {
         $(".delete").click(function(){
            var id = $(this).data("id");

            swal({
               title: "Are you sure?",
               text: "Once deleted, you will not be able to recover this imaginary file!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  document.location = "{{ URL('category/destroy') }}/"+id;
               } else {
                  swal("Your Data file is safe!");
               }
            });

         })          
      }

      var table = $('#category').DataTable({
           processing: true,
           serverSide: true,
           ajax: '{{ URL::to("category/data") }}',
           initComplete: function( settings, json ) {
              remove();
         },
           columns: [
               { data: 'row', name: 'row' }
           ]
       });  
   </script>
@endsection