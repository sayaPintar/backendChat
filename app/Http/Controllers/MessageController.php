<?php

namespace App\Http\Controllers;

use App\Events\CacheCleared;
use App\Events\ChatSended;
use App\Models\Chatroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $s = new Chatroom();
        // $s->chat = "test lagi";
        // $s->username = "ohohoh";
        // $s->save();
        //list all chats from database.
        $result = Cache::rememberForever('chats', function () {
            return Chatroom::with("ChatImage")->oldest("updated_at")->get();
        });
        return response()->json(["result" => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //insert message.
        $insert = new Chatroom();
        $insert->chat = $request->chat;
        $insert->username = $request->username;
        $insert->save();
        ChatSended::dispatch("test");
        CacheCleared::dispatch();
        return response()->json(["message" => "sukses"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
