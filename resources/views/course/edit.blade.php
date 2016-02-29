<html>
	<head> 
		<title> Update Course </title>
		 <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container" >
			<h3> Update course </h3>
        {!! Form::open([
                         'method' => 'PATCH',
                         'route' => ['course.update',$course->course_id],
                         'class'=>'form-horizontal'
                      ]) !!}
		{!!	Form::token(); !!}
			{{ csrf_field() }}
  			<div class="form-group">
    			<label >Course Code</label>
    			<input type="text" name="course_code" class="form-control"  value="{{$course->course_code}}">
  			</div>
  			<div class="form-group">
    			<label >Course Title</label>
    			<input type="text" name="course_title" class="form-control" value="{{$course->course_title}}">
  			</div>
  			<div class="form-group">
    			<label>Course Credit</label>
    			<input type="text" name="course_credit" class="form-control" value="{{$course->course_credit}}">
  			</div>
  			
  			<button type="submit" class="btn btn-default">Update</button>
		{!! Form::close() !!}
		</div>
	</body>
</html>