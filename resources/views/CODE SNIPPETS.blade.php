#All VALIDATION ERRORS
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
		 @foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
				@endforeach
			</ul>
	</div>
@endif


#UPLOAD FILE
$directory = '/upload/admin/thumbnails';
@unlink(public_path($directory).'/'.$user->photo);
$extension = $photo->getClientOriginalName();
$filename = date('YmdHi').$extension;
$photo->move(public_path($directory),$filename);