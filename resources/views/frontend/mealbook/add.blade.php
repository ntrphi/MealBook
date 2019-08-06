@extends('layout.frontend_layout')
@section('content')
<form method="post" action="mealbook-add-save" enctype="multipart/form-data">
{{ csrf_field() }}   
    <input type="text" placeholder="name" name="name">
    <input type="checkbox" name="cookingrecipes[]" value="1" checked>
    <input type="checkbox" name="cookingrecipes[]" value="2" checked>            
    <input type="checkbox" name="cookingrecipes[]" value="3" checked>            
    <button type="submit">Save</button>
</form>
@endsection