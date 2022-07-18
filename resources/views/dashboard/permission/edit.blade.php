@extends('dashboard.master1')
@section('title','title')
@section('styles')

@endsection
@section('page-title','edit category')
@section('main-page-title','main category')
@section('small-page-title','small page category')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
    <div class="col-md-12">
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">category name</label>
                    <input type="text" class="form-control" value="{{$category->name}}"  id="name" placeholder="enter city name">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" @if($category->active) checked @endif value="{{$category->active}}" class="custom-control-input" id="active">
                      <label class="custom-control-label" for="active">active</label>
                    </div>
                  </div>
                  <button class="btn btn-primary" class="form-control" onclick="update({{$category->id}})">update</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
<script>
function update(id){
                axios.put('/admin/categories/'+id,{
                    name:document.getElementById('name').value,
                    active:document.getElementById('active').checked
                })
        .then(function (response) {
            toastr.success(response.data.message)
             window.location.href="/admin/categories"
            console.log(response);
        })
        .catch(function (error) {
            toastr.error(error.response.data.message)
            console.log(error);
        })
        .then(function () {
            // always executed
        });
            }
</script>
@endsection