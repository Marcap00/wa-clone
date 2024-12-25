<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();

        return response()->json([
            'success' => true,
            'results' => $messages,
        ]);
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
        try {
            $validated = $request->validate([
                'message' => 'required|string',
                'contact_id' => 'nullable|exists:contacts,id',
                'status' => 'nullable|string|in:sent,received',
                'date' => 'nullable|date',
            ]);

            $message = Message::create([
                'message' => $validated['message'],
                'contact_id' => $validated['contact_id'],
                'status' => $validated['status'],
                'date' => $validated['date'] ?? now(),
            ]);

            $message->contact()->attach($validated['contact_id']);

            return response()->json([
                'success' => true,
                'data' => $message,
            ], 201);
        } catch (Exception $e) {
            /* Log::error('Errore durante il salvataggio del messaggio: ' . $e->getMessage()); */

            /* return response()->json([
                'success' => false,
                'message' => 'Errore durante il salvataggio del messaggio',
                'error' => $e->getMessage()
            ], 500); */
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return response()->json([
            'success' => true,
            'results' => $message,
        ]);
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
