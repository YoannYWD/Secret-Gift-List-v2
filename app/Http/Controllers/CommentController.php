<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //AFFICHER PAGE CREATE
    public function create(Request $request) {
        $id = $request->id; 
        $gift = DB::table('gifts')
                    ->join('users', 'gifts.posted_by_user_id', '=', 'users.id')
                    ->select('gifts.id', 'gifts.name', 'gifts.price', 'gifts.description', 'gifts.image', 'gifts.posted_by_user_id', 'gifts.for_user_id as for_user_id', 'users.nickname as user_nickname')
                    ->where('gifts.id', '=', $id)
                    ->get();
        $comments =  DB::table('comments')
                        ->join('users', 'users.id', '=', 'comments.user_id')
                        ->join('gifts', 'gifts.id', '=', 'comments.gift_id')
                        ->select('comments.id', 'comments.content', 'comments.created_at', 'users.nickname as user_nickname')
                        ->where('comments.gift_id', '=', $id)
                        ->get();
        return view('comments/create', compact('gift', 'comments'));
    }

    //ENREGISTRER LE COMMENTAIRE
    public function store(Request $request) {
        $newComment = new Comment;
        $newComment->content = $request->content;
        $newComment->user_id = $request->user_id;
        $newComment->gift_id = $request->id;
        $newComment->save();
        return back()->with('success', 'Commentaire enregistré !');
    }
}
