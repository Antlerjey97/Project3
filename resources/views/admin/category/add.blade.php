@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục
                        <small>Thêm mới</small>
                    </h1>
                    <?php //if(isset($status)): ?>
                    <div class="alert <?php //echo $status ? 'alert-success' : 'alert-danger'?>">
                        <?php// echo $message ?>
                    </div>
                    <?php //endif ?>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="admin/category/add" method="POST" role="form" validate>
                        <input type="hidden" name="_Token" value="{{csrf_token()}}">
                        @csrf
                        <label>Tên danh mục</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Tên danh mục" required>
                        </div>
                        <label>Trạng thái</label>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="1">Hoạt động</option>
                                <option value="0">Ngừng hoạt động</option>
                            </select>
                        </div>
                        <label>Vị trí</label>
                        <div class="form-group">
                            <input type="number" class="form-control" name="sort" placeholder="Vị trí" min="1" max="10"
                                   required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection





