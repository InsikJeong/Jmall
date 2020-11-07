<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=\App\Articles::get();

        return response()->json($articles,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articles = $request->user()->Articles()->create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'user_name'=>$request->user_name,
        ]);

        return response()->json($articles,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = \App\Articles::whereId($id)->first();

        return response()->json($article,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = \App\Articles::whereId($id)->first();

        return response()->json($article,200);
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
        $article = \App\Articles::whereId($id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);
        
        return response()->json($article,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = \App\Articles::whereId($id)->delete();

        return response()->json([],204);
    }

    public function comments(Request $request){
        $comments = $request->user()->Comments()->create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'user_name'=>$request->user_name,
            'article_id'=>$request->article_id,
        ]);

        return response()->json([],200);
    }

    public function comments_index($id){
        $comments = \App\Comments::where('article_id',$id)->get();

        return response()->json($comments,200);
    }
    
    public function comments_destroy($id){
        $comment = \App\Comments::whereId($id)->delete();

        return response()->json([],204);
    }
}
