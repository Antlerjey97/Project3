@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                    @if (session('thongbao'))
            <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Chi tiết</th>
                        <th class="text-center">Thời gian bắt đầu</th>
                        <th class="text-center">Thời gian kết thúc</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($promotion as $key => $value): ?>
                        
                   
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $i; ?></td>
                        <td style="max-width: 200px"><?php echo $value['name'] ?></td>
                        <td style="max-width: 200px"><?php echo $value['detail'] ?></td>
                        <td><?php echo  $value['time_start']; ?></td>
                        <td><?php echo $value['time_end'];?></td>
                        <td><?php echo $value['status'] == 1 ? 'Hoạt động' : 'Tạm dừng'; ?></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                            <a href="admin/promotion/sua/<?php echo $value['id'] ?>">Edit</a>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a href="admin/promotion/xoa/<?php echo $value['id'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>

                    <?php endforeach ?>
                    
                </tbody>
            </table>
        {!!$promotion->links()!!}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
