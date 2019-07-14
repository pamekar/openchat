<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ConversationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Cookie::get('user_id');
        $conversations = User::findOrFail($user);

        return response()->json($conversations->append('conversations')
            ->toArray());
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user1 = Cookie::get('user_id');
        $user2 = $request->input('user');

        // fetch existing conversation
        $conversation = Conversation::where(function ($query) use (
            $user1,
            $user2
        ) {
            $query->where('user_1', $user1)
                ->where('user_2', $user2);
        })->orWhere(function ($query) use (
            $user1,
            $user2
        ) {
            $query->where('user_2', $user1)
                ->where('user_1', $user2);
        })->first();

        if (!$conversation && $user1 !== $user2) {
            // no conversation exists
            $conversation = Conversation::create([
                'user_1' => $user1,
                'user_2' => $user2
            ]);
        }

        return response()->json([
            'conversation' => $conversation,
            'messages'     => $conversation->messages
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Cookie::get('user_id');

        $conversation = Conversation::with('messages')->where('id', $id)->where(
            function ($query) use ($user) {
                $query->where('user_1', $user)
                    ->orWhere('user_2', $user);
            })->firstOrFail();

        return response()->json($conversation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
