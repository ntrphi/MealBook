@extends('layout.admin_layout')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $recipe_count}}</h3>

                        <p>Cooking Recipes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('manageCookingRecipes')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $mealbook_count}}</h3>

                        <p>Meal Book</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $user_count}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('list-author')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $dishtype_count}}</h3>

                        <p>Dish types</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('list-dishtype')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
<!-- script cho datatable -->
<!-- @section('script')
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({'iDisplayLength': '50',"order": [[ 0, "desc" ]]});
        @if(Auth::user()->role=='admin')
        $('.status').css('cursor', 'pointer');
         $('.hot').css('cursor', 'pointer');
        /*Changer Status */
        $('.status').click(function(event) {
            id = $(this).parent().find("td:eq(0)").text();
            var status = $(this).find('i.fa-ban').text();
            var div = $(this);
            if(status){
                status = 1;
            } else status = 0;
            $.ajax({
                url: 'admin/post/updateStatus',
                type: 'Put',
                data: {"id": id,"status":status,"_token": "{{ csrf_token() }}"},
            })
            .done(function(data) {
                if(data=='ok'){
                    $.alert("Thay đổi thành công.",{
                        autoClose: true,  closeTime: 3000, type: 'success',
                        position: ['top-right', [45, 30]],
                        withTime: 200,
                        title: 'Thành Công',
                        icon: 'glyphicon glyphicon-ok',
                        animation: true,
                        animShow: 'fadeIn',
                        animHide: 'fadeOut',
                    });
                    if(status == 1){
                        div.html('<i class="fa fa-check-square-o true" aria-hidden="true"> On</i>');
                    } else  div.html('<i class="fa fa-ban false" aria-hidden="true"> Off</i>');
                } else {
                    $.alert(data,{
                        autoClose: true,  closeTime: 3000, type: 'danger',
                        position: ['top-right', [45, 30]],
                        withTime: 200,
                        title: 'Lỗi',
                        icon: 'glyphicon glyphicon-ok',
                        animation: true,
                        animShow: 'fadeIn',
                        animHide: 'fadeOut',
                    });
                }
            })
            .fail(function() {
                console.log("error");
            })
        });

        /* Changer hot*/
        $('.hot').click(function(event) {
            id = $(this).parent().find("td:eq(0)").text();
            var hot = $(this).find('i.fa-ban').text();
            var divn = $(this);
            $('.hot').css('cursor', 'pointer');
            if(hot){
                hot = 1;
            } else hot = 0;
            $.ajax({
                url: 'admin/post/updateHot',
                type: 'Put',
                data: {"id": id,"hot":hot,"_token": "{{ csrf_token() }}"},
            })
            .done(function(data) {
                if(data=='ok'){
                    $.alert("Thay đổi thành công.",{
                        autoClose: true,  closeTime: 3000, type: 'success',
                        position: ['top-right', [45, 30]],
                        withTime: 200,
                        title: 'Thành Công',
                        icon: 'glyphicon glyphicon-ok',
                        animation: true,
                        animShow: 'fadeIn',
                        animHide: 'fadeOut',
                    });
                    if(hot == 1){
                        divn.html('<i class="fa fa-check-square-o true" aria-hidden="true"> On</i>');
                    } else  divn.html('<i class="fa fa-ban false" aria-hidden="true"> Off</i>');
                } else {
                    $.alert(data,{
                        autoClose: true,  closeTime: 3000, type: 'danger',
                        position: ['top-right', [45, 30]],
                        withTime: 200,
                        title: 'Lỗi',
                        icon: 'glyphicon glyphicon-ok',
                        animation: true,
                        animShow: 'fadeIn',
                        animHide: 'fadeOut',
                    });
                }
            })
            .fail(function() {
                console.log("error");
            })
        });
        @endif
        $('#modal-delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var iddel = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #del-id').html(iddel);
          modal.find('.modal-body #delete').attr('href', 'admin/post/delete/'+iddel);
        })
    });   
 </script>
<script src="admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap-flash-alert.js"></script>
@endsection -->