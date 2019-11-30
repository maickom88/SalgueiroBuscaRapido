<div class="container comentarios-empresa">
<h4>Feedback</h4>
@php
	$comments = $empresa->comments;
@endphp
@foreach($comments as $comment)
	
<div class="block">
<div class="row">
	<div class="col-md-2">
			<div class="img-comentarios">
				@if(!empty($comment->user->info))
					@if(!empty($comment->user->info->avatar))
						<img src={{asset('storage/avatar/'.$comment->user->info->avatar)}} class="img-fluid">	
					@else
						<img src={{asset("img/profilezim.png")}} class="img-fluid">
					@endif
				@else
				<img src={{asset("img/profilezim.png")}} class="img-fluid">
				@endif
			</div>
	</div>
			<div class="col-md-7">
				<h5>{{$comment->user->name}}<h5>
			</div>
			<div class="col-md-3">
				<div class="star-comentarios">
				@if(!empty($comment->avaliacao))
					@php
						$count = $comment->avaliacao;
					for ($i=0; $i <$count ; $i++) { 
						print('<span><i class="fas fa-star"></i></span>');
					}
					@endphp				
				@endif
				</div>
			</div>  
	<div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
			<blockquote>
				<p>"{{$comment->content}}"</p>

@php
	$dateTime = $comment->created_at;
	$date = explode(' ', $dateTime);
	$date = explode('-', $date[0]);
@endphp
				<div class="calendario-post">
					<span><i class="fas fa-calendar-alt"></i></span><p>{{$date[2].'/'.$date[1].'/'.$date[0]}}</p>
				</div>
			</blockquote>
	</div>
</div>
</div>
</div>

@endforeach