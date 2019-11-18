
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tin tức công nghệ</title>
@include('layout.link')
</head>
<body>
@include('layout.header')
<?php foreach ($tintuc as $val): ?>


    <!-- Page Content -->
    <div style="padding-top: 100px;" class="container">
        <div class="col-lg-8 col-lg-push-2">
            <h2><?php echo $val['title'] ?></h2>
            <small class="timeDetail"><?php echo date('d/m/Y H:i:s A', $val['time_created']) ?></small>
            <div class="content" style="line-height: 30px;">
             <?php echo $val['content'] ?>
            </div>
        </div>
    </div>
    <!-- end Page Content -->
    <?php endforeach ?>

@include('layout.footer')

</body>
</html>