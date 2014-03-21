@extends('instance.layout')
@section('instanceContent')


<table width="800" class="table table-bordered">
	<tbody>
		<tr>
			<th>Choose</th>
			<th>Towbar Type</th>
			<th>Item Number</th>
			<th>Manual</th>
			<th>Bumper cut:</th>
			<th>Towbar in front of licenceplate</th>
			<th>Bumper removal</th>
			<th> Weight </th>
			<th>Trailer weight </th>
			<th> Vertical load:</th>
			<th>European aproval</th>
			<th>Building year</th>
			<th>Ball Type</th>
		</tr>

		@foreach($articles as $article)

		<tr style="border-top: 1px solid black;">
			<td><img src="{{$article['productimages']->image}}">
			<td>
				<input type="radio" name="towbar" value="40128666">
			</td>
			
			<td>
				{{$article->balltype}}                               
			</td>
			
			<td>{{$article['number']}}</td>
			<td><a href="{{$article->manuals->manual}}" target="_blank">{{$article['number']}}.pdf</a></td>
			<td>{{$article->bumpercut}}</td>
			<td>No</td>
			<td>YES</td>
			<td>14,6KG</td>
			<td>{{$article->trailerweight}}</td>
			<td>{{$article->verticalload}}</td>
			<td>{{$article->dvalue}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
	

@stop