@extends('instance.layout')
@section('instanceContent')

 <div class="col-md-12">
     <h4>Bewerk de Vestiging {{$store->name}}</h4>
 </div>
{{ Form::open(array('action' => array('StoreController@update', $store->id), 'class' => 'form-horizontal', 'role' => 'form')) }}
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Naam</label>
    <div class="col-lg-10">
      <input type="email" class="form-control" id="inputEmail1" placeholder="Naam Vestiging">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-lg-2 control-label">Description</label>
    <div class="col-lg-10">
      <textarea name="body" class="input-xxlarge pull-left" rows="5" id="inputTextarea" placeholder="Enter text ...">{{ stripslashes(Input::old('body', $store->description)) }}</textarea>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

@stop