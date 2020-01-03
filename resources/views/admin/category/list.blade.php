@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục sản phẩm
                        <small>Danh sách</small>
                    </h1>
                    <?php if (isset($status)): ?>
                    <div class="alert <?php echo $status ? 'alert-success' : 'alert-danger'?>">
                        <?php echo $message ?>
                    </div>
                    <?php endif ?>
                </div>
                <div class="col-lg-12">
                    @if (session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>


                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Vị trí</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($category as $key => $value):?>

                    <tr class="odd gradeX" align="center">
                        <td><?php echo $i ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['status'] == 1 ? 'Hoạt động' : 'Dừng hoạt động'; ?></td>
                        <td><?php echo $value['sort'] ?></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/category/edit/<?php echo $value['id'] ?>">Edit</a></td>

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                href="admin/category/delete/<?php echo $value['id'] ?>">Delete</a></td>
                    </tr>
                    <?php $i = $i + 1 ?>

                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection


