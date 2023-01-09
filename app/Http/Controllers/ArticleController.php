<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Articles/Index', [
            'article' => Article::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
       



        $article = Auth::user()->articles()->create([

                'Title' => $request->input('Title'),
                'Subtitle' => $request->input('Subtitle'),
                'Mony' => $request->input('Mony'),
                'Amount' => $request->input('Amount'),
            ]);

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Request $request)
    {
         //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
            // me lo passa ma soltanto che mi modifica tutto
        $article = Auth::user()->articles('id',$request->id)->update([
            
            'Title' => $request->input('Title'),
            'Subtitle' => $request->input('Subtitle'),
            'Mony' => $request->input('Mony'),
            'Amount' => $request->input('Amount'),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article = Auth::user()->articles()->delete();
    }
}



 // $article->Title=$request->Title;
        // $article->Subtitle=$request->Subtitle;
        // $article->Mony=$request->Mony;
        // $article->Amount=$request->Amount;
        // $article->user_id=$request->Auth::user()->id;

        // $article->create();



         //     $article=Article::find($article);
        // $article->Title=$request->Title;
        // $article->Subtitle=$request->Subtitle;
        // $article->Mony=$request->Mony;
        // $article->Amount=$request->Amount;

        // $article->save();
        // return redirect()->route('Articles.Index');