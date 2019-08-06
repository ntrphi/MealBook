@extends('layout.frontend_layout')
@section('content')
<form method="post" action="mealbook-add-save" enctype="multipart/form-data">
{{ csrf_field() }}   
    <input type="text" placeholder="name" name="name">
    
    {{-- các id của món ăn đc nhận từ khi kéo thả vào mâm cơm --}}
    <label for="">món1</label><input type="checkbox" name="cookingrecipes[]" value="1" checked> 
    <label for="">món2</label><input type="checkbox" name="cookingrecipes[]" value="2" checked>            
    <label for="">món3</label><input type="checkbox" name="cookingrecipes[]" value="3" checked>  

    <button type="submit">Save</button>
</form>
@endsection