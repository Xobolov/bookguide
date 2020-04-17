<?php

namespace App\Http\Controllers\Panel;

use App\Book;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Question::orderby('id', 'desc')->get();
        return view('panel.pages.questions.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('panel.pages.questions.create', compact('books')); //'tests'
    }

    public function findTestName(Request $request)
    {
        $data = QuestionCategory::select('name', 'id')->where('book_id', $request->id)->take(100)->get();
        return response()->json($data); //then sent this data to ajax success
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

            'question' => 'required|max:255',
            'answer' => 'required|max:255',
            'book' => 'required',
            'number' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('panel/questions/question/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            Question::create([

                'question' => $request->input('question'),
                'correct_choice' => $request->input('answer'),
                'book_id' => $request->input('book'),
                'test_id' => $request->input('number'),

            ]);

            return  redirect()->route('pages.questions');
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
        $books = Book::all();
        $question = Question::find($id);
        return view('panel.pages.questions.edit', compact('books', 'question'));
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
        $question =  Question::find($id);

        $validator = Validator::make($request->all(), [

            'question' => 'required|max:255',
            'answer' => 'required|max:255',
            'book' => 'required',
            'number' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('question.edit', $question->id)
                ->withErrors($validator)
                ->withInput();
        } else {



            $question->question = $request->get('question');
            $question->correct_choice = $request->get('answer');
            $question->book_id = $request->get('book');
            $question->test_id = $request->get('number');

            $question->save();
            return redirect()->route('pages.questions');
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
