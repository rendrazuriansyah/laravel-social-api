<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validation = Validator::make(request()->all(), [
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'message_content' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors(),
            ], 400);
        }

        $message = Message::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message_content' => $request->message_content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengirim pesan',
            'data' => $message,
        ]);
    }

    public function show(int $id)
    {
        $message = Message::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil pesan',
            'data' => $message,
        ]);
    }

    public function destroy(int $id)
    {
        Message::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus pesan',
        ]);
    }
}
