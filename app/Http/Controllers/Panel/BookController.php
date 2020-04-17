<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderby('id', 'asc')->get();
        return view('panel.pages.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.pages.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {

            $messages = [
                'word'    => 'The :attribute and :other must match.',
            ];

            $validator = Validator::make($request->all(), $messages, [

                'name' => 'required|max:255',
                'words' => 'required',
                'author' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect('book/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('web/images/uploads', $filename);

                $slug = Str::slug($request->input('name'), '-');

                Book::create([

                    'name' => $request->input('name'),
                    'slug' => $slug,
                    'words' => $request->input('words'),
                    'author' => $request->input('author'),
                    'image' => $filename,

                ]);
            }
        } else {
            return redirect()->route('book.create')->with('status', 'Image is important!');
        }



        return redirect()->route('pages.books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('panel.pages.books.edit', compact('book'));
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
        $book = Book::findOrFail($id);

        if ($request->hasFile('image')) {
            $old_image_path = public_path() . '/web/images/uploads/' . $book->image;

            if (file_exists($old_image_path)) {
                unlink($old_image_path);

                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('web/images/uploads', $filename);

                $validator = Validator::make($request->all(), [

                    'name' => 'required|max:255',
                    'words' => 'required',
                    'author' => 'required|max:255',
                ]);

                if ($validator->fails()) {
                    return redirect('book/edit', [$book->id])
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $slug = Str::slug($request->get('name'), '-');

                    $book->name = $request->get('name');
                    $book->slug = $slug;
                    $book->words = $request->get('words');
                    $book->author = $request->get('author');
                    $book->image = $filename;

                    $book->save();
                    return redirect()->route('pages.books');
                }
            } else {
                return redirect()->route('book.edit', [$book->id])->with('status', 'Old Image don\'t found in SQL');
            }
        } else {
            if (public_path() . '/web/images/uploads/' . $book->image) {

                $validator = Validator::make($request->all(), [

                    'name' => 'required|max:255',
                    'words' => 'required',
                    'author' => 'required|max:255',
                ]);

                if ($validator->fails()) {
                    return redirect('book/edit', [$book->id])
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $slug = Str::slug($request->get('name'), '-');

                    $book->name = $request->get('name');
                    $book->slug = $slug;
                    $book->words = $request->get('words');
                    $book->author = $request->get('author');

                    $book->save();
                    return redirect()->route('pages.books');
                }
            } else {
                return redirect()->route('book.edit', [$book->id])->with('status', 'Image is important!');
            }
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
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->back();
    }
}
