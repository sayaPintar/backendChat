<?php

namespace App\Http\Controllers;

use App\Events\ChatSended;
use App\Models\ChatImage;
use App\Models\Chatroom;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageImageController extends Controller
{
    //
    public function retrieve(Request $request)
    {

        $request->validate([
            "image" => "required|image|mimes:jpg,png,jpeg|max:4000"
        ]);
        $hashname = $request->file("image")->hashName();
        $save = $request->file("image")->move("storage/chatimage", $hashname);

        // save to image database too.
        $save_img = new ChatImage();
        $save_img->image_name = $hashname;
        $save_img->save();

        //save too in chat database.
        $find_chat = ChatImage::where("image_name", $hashname)->first();
        $save_chat = new Chatroom();
        $save_chat->username = $request->name;
        $save_chat->image_id = $find_chat->id;
        $save_chat->save();


        // ChatSended::dispatch("test");

        return response()->json(["message" => "sukses"]);
    }

    public function transmit(Request $request)
    {
        // get chat img id.
        $get_id = Chatroom::with("ChatImage")->where("id", $request->route("id"))->first();
        $img = Storage::url("public/chatimage/" . $get_id->ChatImage->image_name);

        return response()->json(["url" => $img]);
    }

    public function receiveSound(Request $request)
    {
        $hashname = $request->file("sound")->hashName();
        $save = $request->file("sound")->move("storage/sound", $hashname);
        return response()->json(["message" => "sukses"]);
    }
}
