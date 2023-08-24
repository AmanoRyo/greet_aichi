<?php

namespace App\Http\Controllers;

use App\Models\AnswerPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function index()
    {
        $anss = AnswerPost::orderBy('updated_at', 'desc')->get();
        return view('post.detail', compact('anss'));
    }
    
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'body' => 'required|string',
        ]);

        $ans = new AnswerPost();
        $ans->body = $validatedData['body'];
        $ans->user_id = Auth::id();
        $ans->post_id = $id;
        $ans->save();

        return redirect()->route('post.detail', $id)->with('success', '回答が投稿されました');
    }
    public function myAnswers()
    {
        $anss = AnswerPost::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-anss', compact('anss'));
    }
}
