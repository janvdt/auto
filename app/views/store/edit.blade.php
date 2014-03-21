@extends('instance.layout')
@section('instanceContent')

 <div class="col-md-12">
     <h4>Bewerk de Vestiging {{$store->name}}</h4>
 </div>
{{ Form::open(array('action' => array('StoreController@update', $store->id), 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'Myform')) }}
	<input type="hidden" name="_method" value="PUT">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Naam</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="inputname" name="name" placeholder="Naam Vestiging" value="{{$store->name}}">
    </div>
  </div>
  <div class="form-group">
	<label for="description" class="col-lg-2 control-label">Description</label>
	<div class="col-lg-10">
		<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
			<div class="btn-group">
				<a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font">
					<i class="icon-font"></i>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a>
					</li>

					<li>
						<a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a>
					</li>

					<li>
						<a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a>
					</li>

					<li>
						<a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a>
					</li>

					<li>
						<a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a>
					</li>

					<li>
						<a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a>
					</li>

					<li>
						<a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a>
					</li>

					<li>
						<a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a>
					</li>

					<li>
						<a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a>
					</li>

					<li>
						<a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a>
					</li>

					<li>
						<a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a>
					</li>

					<li>
						<a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a>
					</li>

					<li>
						<a data-edit="fontName Times" style="font-family:'Times'">Times</a>
					</li>

					<li>
						<a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a>
					</li>

					<li>
						<a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a>
					</li>
				</ul>
        	</div>
     		 <div class="btn-group">
        		<a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
    </div>
		<div id="editor" contenteditable="true">
      	{{$store->description}}
    </div>
    <textarea id="MyTextArea" name="body" style="display:none;"></textarea>
  </div>
  	<div class="form-group">
    	<div class="col-lg-offset-2 col-lg-10">
    	@if ($store->image)
			<p><img class="avatar img-polaroid" src="/{{ $store->image->getSize('medium')->getPathname() }}" alt=""></p>
			<p><label><input type="checkbox" name="delete_image"> Remove from page</label></p>
		@else
  		@include('file.page.upload')
  		@endif
		<span class="help-inline">{{ $errors->first('image_id') }}</span>
		</div>
	</div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10 buttonsform">
    	<a href="/" class="btn btn-default">Cancel</a>
		<button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>



@stop