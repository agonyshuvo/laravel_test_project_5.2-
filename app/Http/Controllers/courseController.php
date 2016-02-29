<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use Redirect;

class courseController extends Controller
{
    public function index()
	{
		$alldata=Course::all();
		return 	view('course.index',compact('alldata'));
	}

	
	public function create()
	{
		return view('course.create');
	}

	
	public function store(Request $request)
	{
		$input = $request->all();
		Course::create($input);
		//return $input;  { for seeing the output in browser}
		return redirect('course');
	}	

	
	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$course=Course::findOrFail($id);
		return view('course.edit',compact('course'));
	}

	
	public function update(Request $request, $id)
	{
		$input = $request->all();
		$data=Course::findOrFail($id);
		$data->update($input);
		return redirect('course');
	}

	
	public function destroy($id)
	{
		$data=Course::findOrFail($id);
		$data->delete($data);
		return redirect('course');
	}
	
}
