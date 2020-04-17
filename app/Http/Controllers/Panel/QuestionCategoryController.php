<?php

namespace App\Http\Controllers\Panel;

use App\Book;
use App\Http\Controllers\Controller;
use App\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = QuestionCategory::orderby('id','desc')->get();
        return view('panel.pages.questions_categories.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::orderby('id', 'asc')->get();
        return view('panel.pages.questions_categories.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'test_name' => 'required',
            'book' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('panel/questions/categories/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            QuestionCategory::create([

                'name' => $request->input('test_name'),
                'book_id' => $request->input('book'),

            ]);

            return  redirect()->route('questions.categories');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::orderby('id', 'asc')->get();
        $question_categories = QuestionCategory::find($id);
        return view('panel.pages.questions_categories.edit', compact('books','question_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $validator = Validator::make($request->all(), [

            'test_name' => 'required',
            'book' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('panel/questions/categories')
                ->withErrors($validator)
                ->withInput();
        } else {
           
            $question_categories =  QuestionCategory::find($id);

            $question_categories->name = $request->get('test_name');
            $question_categories->book_id = $request->get('book');
            
            $question_categories->save();
            return redirect()->route('questions.categories');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
