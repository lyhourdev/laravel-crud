@php
    $float_right_ = isset($float_right)?$float_right:true;
@endphp
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$title}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @if($float_right_)
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url($url)}}/#">{{$url_title}}</a></li>
                        <li class="breadcrumb-item active">{{$active_title}}</li>
                    </ol>
                @endif
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
