@extends('instance.layout')
@section('instanceContent')
<div class="section " id="section0">
<h1 id="welkomsttitel">Welkom bij de Keyser <br>Kijk gerust even rond</h1>
    
</div>
<div class="section" id="section1">
    @foreach($stores as $store)
    <div class="slide" style="background-image: url({{$store->image}}); background-size: cover">
        <div class="intro">
            <h1 id="titelvestiging">{{$store->name}}</h1>
            <div id="vestigingbeschrijving">
                <p>{{$store->description}}</p>
            </div>
           
        </div>
    </div>
    @endforeach
</div>

<div class="section" id="section2">
    <div class="thule">
        <div class="row">
            <div class="col-md-2">
                <img src="/assets/images/Thule.jpg"  />
            </div>
            @if(Auth::user())
                <button type="button" class="btn btn-default btn-small brandbtn">
                    <a href="{{ URL::action('BrandController@edit', array($thule->id)) }}">
                        <span class="glyphicon glyphicon-pencil"></span> edit
                    </a>
                </button>
            @endif
        </div>
        
        <div class="intro">
            
            <div class="row">
                <h1 id="titelthule" class="pull-right">{{$thule->title}}</h1>
            </div>

            <div class="row">
                <div id="thulebeschrijving" class="pull-right">
                    <p>{{$thule->description}}</p>
                </div>
            </div>

            <div class="row">
                <div id="buttontrekhaak" class="pull-right">
                    <a type="button" class="btn btn-default btntrekhaak" href="{{ URL::action('BullbarController@index') }}">Laat je trekhaak door ons plaatsen!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section3">
    <div class="autostyle">
        <div class="row">
            <div class="col-md-2">
                <img src="/assets/images/autostyle.png"  />
            </div>

            <div class="col-md-1 col-md-offset-7">
                @if(Auth::user())
                    <button type="button" class="btn btn-default btn-small brandbtn">
                        <a href="{{ URL::action('BrandController@edit', array($autostyle->id)) }}">
                            <span class="glyphicon glyphicon-pencil"></span> edit
                        </a>
                    </button>
                @endif
            </div>
        </div>
    </div>
    <div class="intro">
        <div class="row">
            <h1 id="titelautostyle" class="pull-left">{{$autostyle->title}}</h1>
        </div>

        <div class="row">
            <div id="autostylebeschrijving" class="pull-left">
                <p>{{$autostyle->description}}</p>
            </div>
        </div>

        
    </div>
   
</div>

@stop

