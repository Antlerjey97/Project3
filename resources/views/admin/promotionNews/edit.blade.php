@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                <?php// if (isset($status)): ?>
                <!-- <div class="alert <?php //echo $status ? 'alert-success' : 'alert-danger'?>">
                      <?php// echo $message ?>
                    </div> -->
                    <?php
                    // $this->session->unset_userdata($status);
                    ?>
                    <?php //endif ?>


                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{$item}}<br>
                            @endforeach</div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>

                    @endif

                    <form action="admin/promotionNews/edit/<?php echo $promotionNews['id'] ?>" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_Token " value="{{csrf_token()}}"/>
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" value="<?php echo $promotionNews['title'] ?>" name="title"
                                   placeholder="Nhập tiêu đề" required/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea id="demo" name="summary" class="form-control ckeditor" rows="3"
                                      required><?php echo $promotionNews['summary'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" name="content" class="form-control ckeditor" rows="5"
                                      required><?php echo $promotionNews['content'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh tiêu biểu</label>
                            <p><img src="uploads/ImagePromotionNews/{{$promotionNews['image']}} ?>" width="400"></p>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <label class="radio-inline">
                                <input name="status" value="0"
                                       <?php if($promotionNews['status'] == 0){ ?>
                                       checked="" <?php } ?>
                                       type="radio">Không hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="1"
                                       <?php if($promotionNews['status'] == 1){?>
                                       checked="" <?php } ?>
                                       type="radio">Hiển thị
                            </label>
                        </div>
                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
