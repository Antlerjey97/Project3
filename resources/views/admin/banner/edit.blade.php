@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quảng cáo
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <!-- <div class="col-lg-12" style="padding-bottom:120px"> -->
            <?php //if (isset($status)): ?>
            <!-- <div class="alert <?php
            //   echo $status ? 'alert-success' : 'alert-danger'?>">
                      <?php //echo $message ?>
                </div> -->
                <?php
                // $this->session->unset_userdata($status);
                ?>
                <?php// endif ?>
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{$item}} <br>
                            @endforeach
                        </div>

                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>

                    @endif

                    <form action="admin/banner/edit/<?php echo $banner['id'] ?>" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_Token" value="{{csrf_token()}}"/>
                        @csrf

                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="<?php
                            echo $banner['name']
                            ?>" name="name" placeholder="Nhập tên" required/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <p><img src="uploads/ImageBanner/<?php echo $banner['image'] ?>" width="300px" alt=""></p>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <input id="demo" name="content" class="form-control"
                                   value="<?php echo $banner['content']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn tới sản phẩm</label>
                            <input class="form-control" value="<?php echo $banner['link'] ?>" name="link"
                                   placeholder="Nhập đường dẫn" required/>
                        </div>
                        <div class="form-group">
                            <label>Kiểu quảng cáo</label>
                            <label class="radio-inline">
                                <input name="type" value="0"
                                       <?php if($banner['type'] == 0){?>
                                       checked <?php } ?>
                                       type="radio">Slide
                            </label>
                            <label class="radio-inline">
                                <input name="type" value="1"
                                       <?php if($banner['type'] == 1){?>
                                       checked <?php } ?>
                                       type="radio">Banner
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <label class="radio-inline">
                                <input name="status" value="0"
                                       <?php if($banner['status'] == 0){ ?>
                                       checked <?php } ?>
                                       type="radio">Không hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="1"
                                       <?php if($banner['status'] == 1){?>
                                       checked
                                       <?php } ?>
                                       type="radio">Hiển thị
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <button type="reset" class="btn btn-warning">Làm mới</button>
                        <form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
