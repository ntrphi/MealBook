@extends('layout.admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Cooking Recipes
            {{-- <small>Preview</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Cooking Recipes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements disabled -->
                <div class="box box-warning">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                           @foreach($errors->all() as $err)
                           {{ $err }}<br>
                           @endforeach
                       </div>
                       @endif
                    <div class="box-header with-border">
                        <h3 class="box-title">General Elements</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{route('managerCookingStore')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}                   
                        <!-- text input -->
                            <div class="form-group">
                            <input type="hidden" name="id" id="" value="{{$recipe->id}}">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$recipe->name}}">
                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Ingredient</label>
                                
                                @foreach($recipe->ingredientDetail as $detail)
                                <div class="form-group">
                                        <input type="hidden" name="idDetail[]" value="{{$detail->id}}" >
                                        <input type="text" name="ingredient[]" value="{{$detail->ingredient}}" class="cooking-ingredient-manager">
                                        <input type="text" name="amount[]" value="{{$detail->amount}}" class="amount-ingredient-manager">
                                        </div>
                                @endforeach
                            
                                <!-- <textarea class="form-control" rows="3" placeholder="Enter ..." name="ingredient">{{$recipe->ingredient}}</textarea> -->
                            </div>
                            <div class="form-group">
                                <label>Recipe</label>
                                <!-- ckeditor -->
                                <textarea class=" form-control" rows="3" placeholder="Place some text here" name="recipe">{{$recipe->recipe}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Select dish types</label>
                                <select class="form-control" style="width: 100%;" name="dish_type_id">
                                    @foreach ($dish_types as $type)
                                <option @if ($type->id==$recipe->dish_type_id)selected="selected" @endif value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Short Desc</label>
                             <textarea class=" form-control" rows="3" placeholder="Place some text here" name="short_desc">{{$recipe->short_desc}}</textarea>
                                  
                            </div>
                            <div class="form-group">
                                <label for="">Avatar</label>
                                <input type="file" class="form-control" name="avatar" id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">Save</button>
                            <a href="{{route('manageCookingRecipes')}}" class="btn btn-lg btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </section>
</div>
<script type="text/javascript" language="javascript" src="admin/ckeditor/ckeditor.js" ></script>

@endsection