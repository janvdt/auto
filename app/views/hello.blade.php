@extends('instance.layout')
@section('instanceContent')
<div class="row menubar">
  <div class="span8 pull-right">
  <ul class="menuTemplate1 decor1_1" license="mylicense">
    <li><a href="#CSS-Menu">Auto onderdelen</a></li>
    <li class="separator"></li>
    <li><a href="#Horizontal-Menus" class="arrow">Reparaties</a>
        <div class="drop decor1_2" style="width: 640px;">
            <div class='left'>
                <b>CSS Menu</b>
                <div>
                    <a href="#">Html 5 menu</a><br />
                    <a href="#">Web menu CSS</a><br />
                    <a href="#">Css menus</a><br />
                    <a href="#">Nav element</a><br />
                    <a href="#">SEO menu</a>
                </div>
            </div>
            <div class='left'>
                <b>Menu Templates</b>
                <div>
                    <a href="#">Menu template</a><br />
                    <a href="#">Menu skin</a><br />
                    <a href="#">Web menu styles</a><br />
                    <a href="#">Best css menus</a>
                </div>
            </div>
            <div class='left'>
                <b>SEO Friendly</b>
                <div>
                    <a href="#">Search engine friendly</a><br />
                    <a href="#">Best css menu</a><br />
                    <a href="#">Most popular menus</a><br />
                    <a href="#">Best web menu designs</a><br />
                    <a href="#">E-Commerce sites</a><br />
                    <a href="#">CSS Templates</a><br />
                    <a href="#">Menu Design Templates</a><br />
                    <a href="#">Clean layout & alignment</a><br />
                    <a href="#">Favorite menus</a>
                </div>
            </div>
        </div>
    </li>
    <li class="separator"></li>
    <li><a href="#CSS">CSS</a></li>
    <li class="separator"></li>
    <li><a href="#Horizontal-Menu-CSS">Horizontal Menu CSS</a></li>
    <li class="separator"></li>
    <li><a href="#Web-Menu" class="arrow">Horizontal Web Menu</a>
        <div class="drop decor1_2 dropToLeft2" style="width: 500px;">
            <div class='left'>
                <b>SHOPPING TOOLS</b>
                <div>
                    <a href="#">Build your script</a><br />
                    <a href="#">Review current offers</a><br />
                    <a href="#">See All ...</a>
                </div>
                <b>RSS FEED</b>
                <div>
                    <a href="#">Find a location</a><br />
                    <a href="#">Request a test drive</a><br />
                    <a href="#">See All ...</a>
                </div>
            </div>
            <div class='left'>
                <b>BE CREATIVE</b>
                <div>
                    <a href="#">Build your script</a><br />
                    <a href="#">Review current offers</a><br />
                    <a href="#">See All ...</a>
                </div>
            </div>
            <div class='left' style="text-align:right; width:160px;">
                <img src="../img/demo/hd7.png" style="width:128px; height:128px;" /><br />
                Contact Us
            </div>
                
        </div>
    </li>
    <li class="separator"></li>
    <li><a href="#Web-Menus" class="arrow">Web Menus</a>
        <div class="drop decor1_2 dropToLeft" style="width: 460px;">
            <img src="../img/demo/css-menu-t3.jpg" style="float:left; width:98px;
                height:180px;margin:10px 80px 10px 40px;" />
            <div class='left'>
                <b>PURE CSS MENU</b>
                <div>
                    <a href="#">Build your script</a><br />
                    <a href="#">Review current offers</a><br />
                    <a href="#">See All ...</a>
                </div>
                <b>POPOUT MENU</b>
                <div>
                    <a href="#">Find a location</a><br />
                    <a href="#">Request a test drive</a><br />
                    <a href="#">See All ...</a>
                </div>
            </div>
        </div>
    </li>
</ul>
</div>
</div>
    <div class="vestigingen">
        <div class="textvestigingen">
            <h4>Ontdek onze Vestigingen</h4>
        </div>
        <div class="main row">
            <ul id="og-grid" class="og-grid">
            	@foreach($stores as $store)
            	<li>
                    <p class="winkels">{{$store->name}}
                    	@if(Auth::user())
                    	<button type="button" class="btn btn-default btn-small">
  						<span class="glyphicon glyphicon-pencil"></span> edit
						</button>
						@endif
					</p>
                    
                    <a href="http://cargocollective.com/jaimemartinez/" data-largesrc="{{$store->image}}" data-title="{{$store->name}}" data-description="{{$store->description}}">
                        <img src="{{$store->thumbnail}}"/>
                    </a>
                </li>
            	@endforeach
            </ul>
        </div>
    </div>
    <div class="thule">
        <div class="row">
            <div class="col-md-4">
                <img src="/assets/images/Thule.jpg"  />
            </div>
        </div>
    </div>
    <div class="thuledescription">
    	<div class="row">
    		<div class="col-md-4 col-md-offset-1">
    			<p class="thuledscr">{{$thule->title}}</p>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-4 col-md-offset-1">
    			<p>{{$thule->description}}</p>
    		</div>
    		<div class="col-md-4 col-md-offset-2">
    			<img src="{{$thule->image}}" width="350" height="225" />
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4 col-md-offset-7">
    			<button type="button" class="btn btn-default btntrekhaak">Plaats je trekhaak!</button>
    		</div>
    	</div>

    
    </div>
    <div class="autostyle">
        <div class="row">
            <div class="col-md-4">
                <img src="/assets/images/autostyle.png"  />
            </div>
        </div>
    </div>
    <div class="autostyledescription">
    	<div class="row">
    		<div class="col-md-4 col-md-offset-1">
    			<p class="thuledscr">{{$autostyle->title}}</p>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-4 col-md-offset-1">
    			<p>{{$autostyle->description}}</p>
    		</div>
    		</div>
    		<div class="col-md-4 col-md-offset-2">
    			
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4 col-md-offset-7">
    			
    		</div>
    	</div>

    
    </div>
@stop

