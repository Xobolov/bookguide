<?php

namespace App\Http\Controllers\Panel;

use App\Choice;
use App\QuestionCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choices = Choice::orderby('id', 'desc')->get();
        return view('panel.pages.choices.index', compact('choices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = QuestionCategory::orderby('id', 'asc')->get();
        return view('panel.pages.choices.create', compact('tests'));
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

            'choice' => 'required|max:255',
            'test_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('panel/questions/choice/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            Choice::create([

                'choice' => $request->input('choice'),
                'test_id' => $request->input('test_id'),

            ]);

            return  redirect()->route('page.choices');
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
        $choice = Choice::find($id);
        $tests = QuestionCategory::orderby('id', 'asc')->get();
        return view('panel.pages.choices.edit', compact('choice', 'tests'));
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

            'choice' => 'required|max:255',
            'test_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('panel/questions/choice/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $choice =  Choice::find($id);

            $choice->choice = $request->get('choice');
            $choice->test_id = $request->get('test_id');

            $choice->save();

            return redirect()->route('page.choices');
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
