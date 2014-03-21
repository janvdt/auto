@extends('instance.layout')
@section('instanceContent')




<div class="control-group carbrand">
	<form class="form-horizontal" method="POST" id="formthule" action="{{ URL::action('BullbarController@getArticles') }}?brand={{Input::get('brand')}}&model={{Input::get('model')}}" >

		<input type="hidden" name="brand" id="brandinput" value="">
		<input type="hidden" name="model" id="modelinput" value="">

		<select id="brands" name="brands">
			
			<option value="none">Select Brand </option>
			@foreach($brands as $brand)
			<option value="{{$brand}}">{{$brand}}</option>
			@endforeach
		</select>

		<select id="models" name="models">
		
		</select>

		<select id="years" name="years">
		
		</select>

		<select id="types" name="types">
		
		</select>

		<input type="submit" class="btn btn-primary" value="Save">
	</form>
							
</div>
<div class="row">
    <div class="towbar span10 ">
        <h2>Searching Towbars</h2>
            <div class="info">
                <div id="pricenumber" class="pull-left">

                </div>
                
                <div id="specifications"  class="col-md-4">

                </div>

                <div id="towbarimages" class="col-md-4">
                   <div id="images">
        
                   </div>
    <div id="full"></div>
    <p id="caption"></p>

                </div>
                
            </div>
                
            
    </div>
</div>

<div class="row">
    <div class="wiringkit span8 col-md-2">
        <h2>Searching Wiringkit</h2>
        <div class="infowiring">
            <div id="pricenumberwiring" class="pull-left">

            </div>
            
            <div id="specificationswiring"  class="col-md-4">

            </div>
        </div>
        
    </div>
</div>

@stop

@section('scripts')


        $("#brands").change(function() {


        	var brandinput = $( "#brands option:selected" ).text();

            

            $.getJSON("bullbar/getModels/" + $("#brands").val(), function(data) {
                var models = [];
                console.log(data);
                $.each(data.model, function(key, val) {
                    models.push('<option value="">' + val + '</option>');
                });

                
                $("select#models").html(models.join(''));
                $("select#models").change();

            });
        });

        $("#models").change(function () {

        var modelinput = $( "#models option:selected" ).text();

        var brand = $( "#brands option:selected" ).text();

        var model =  $( "#models option:selected" ).text();

        document.getElementById('formthule').setAttribute('action','bullbar/getArticles?brand='+ brand +'&model='+ model +'');

        $( "#types").empty();

        console.log(brand);
        console.log(model);

        

        $.getJSON("bullbar/getYears/"+ brand +"?model="+ model, function(data) {
                
                $.each(data, function(key, val) {
                    $( "#years").append('<option value="">' + val + '</option>');
                });
                
			});

		$.getJSON("bullbar/getTypes/"+ brand +"?model="+ model, function(data) {
                
                for(var key in data[1]) {
    				
    				$( "#types").append('<option value="">' + data[1][key] + '</option>');

    				
				}
            });

            
        });

$( "#formthule" ).click(function() {
var square1 = new Sonic({
 
    width: 100,
    height: 100,
 
    fillColor: '#000',
 
    path: [
        ['line', 10, 10, 90, 10],
        ['line', 90, 10, 90, 90],
        ['line', 90, 90, 10, 90],
        ['line', 10, 90, 10, 10]
    ]
 
});

var square2 = new Sonic({
 
    width: 100,
    height: 100,
 
    fillColor: '#000',
 
    path: [
        ['line', 10, 10, 90, 10],
        ['line', 90, 10, 90, 90],
        ['line', 90, 90, 10, 90],
        ['line', 10, 90, 10, 10]
    ]
 
});

 
square1.play();
square2.play();
 
$( "#pricenumber").append(square1.canvas);
$( ".detailswiringkit").append(square2.canvas);
});

$("#formthule").ajaxForm({
    data: { 'ajax': 'true' },
    dataType: 'json',
    success: function(data) {
    console.log(data.towbar);
    $(".sonic").remove();
    
    
  for (var key in data.towbar) {
   if (data.towbar.hasOwnProperty(key) ){
        if(key == '@attributes')
        {
            $( "#pricenumber").append('<h3 class="labelnummer">Number : '+ data.towbar[key].number + '</h3>');
            
        }

        if(key == 'price')
        {
            $( "#pricenumber").append('<h3 class="prijsnummer">'+ key + ' : ' + data.towbar[key] +'</h3>');
            
        }
        
        if(key == 'manuals')
        {
            $( "#specifications").append('<p>' + key + '</p>');
            $( "#specifications").append('<p><a href="'+ data.towbar[key].manual + '">' + data.towbar[key].manual + '</p>');
        }

        if(key == 'productimages')
        {
            if( typeof data.towbar[key].image === 'string' ) {

            $image = "<img src='" + data.towbar[key].image + "'>"
                $( "#images").append($image);
   
            }
            else
            {
                for (var key2 in data.towbar[key].image)
                {
                    $image = "<img src='" + data.towbar[key].image[key2] + "'>"
                    $( "#images").append($image);
                
                }
            }
            
        }

        if(key == 'productinfo')
        {
            $( ".detailstowbar").append('<li>' + key + '</li>');   
            if(data.towbar[key].name && data.towbar[key].productname && data.towbar[key].producttext )
            {
                $( ".detailstowbar").append('<li>' + data.towbar[key].name + '</li>');
                $( ".detailstowbar").append('<li>' + data.towbar[key].productname + '</li>');
                $( ".detailstowbar").append('<li>' + data.towbar[key].producttext + '</li>');
            }
        }

        if(key == 'note')
        {
            $( ".detailstowbar").append('<li>' + key + '</li>'); 
            if(data.towbar[key].price)
            {
                $( ".detailstowbar").append('<li>' + data.towbar[key].price + '</li>');
            }
        }

        

        if(key != 'manuals' && key != '@attributes' && key != 'productimages' && key != 'productinfo' && key != 'note' && key != 'remark' && key != 'price'  && key != 'productvideo')
        {
            
            $( "#specifications").append('<p>' + key + ' : ' + data.towbar[key] + '</p>');
        }

        if(key == 'productvideo')
        {
        
            var id = data.towbar[key].split('watch?v=')[1]; // get the id so you can add to iframe

            
            video = "<iframe id='player' src='http://www.youtube.com/embed/"+ id + "?rel=0&wmode=Opaque&enablejsapi=1' frameborder='0' width='600' height='300'></iframe>"
            $( "#videotowbar").append(video);
        }
        $('#full').gallery({
            source: "#images img",
            easing: "linear",
            waitTime: 2000,
            changeTime: 400,
            showCaptions: true,
            captionTarget: "#caption"
        });
        
        $("#full").on({
            mouseenter: function() {
                $("#full").gallery("stopAnimation");
            },
            mouseleave: function() {
                $("#full").gallery("resumeAnimation");
            }
        });
        
        $("#full").on({
            galleryimageload: function() {
                console.log("new image loaded");
            },
            galleryclick: function() {
                console.log("gallery source image clicked");
            },
            galleryanimationstop: function() {
                console.log("gallery animation stopped");
            },
            galleryanimationresume: function() {
                console.log("gallery animation resumed");
            }
        });
   }

}  






  for (var key in data.wiringkit) {
   if (data.wiringkit.hasOwnProperty(key) ){
        if(key == '@attributes')
        {
            
            $( "#pricenumberwiring").append('<h3 class="labelnummer">Number : '+ data.wiringkit[key].number + '</h3>');
        }
        
        if(key == 'manuals')
        {
            
            $( ".detailswiringkit").append('<li>' + data.wiringkit[key].manual + '</li>');
        }

        if(key != 'manuals' && key != '@attributes')
        {
            
            $( "#specificationswiring").append('<p>' + key + ' : ' + data.wiringkit[key] + '</p>');
        }
   }
}



    
    
            
   

    }
});


			
                
     
 



@stop