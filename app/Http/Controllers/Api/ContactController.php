<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->query('user_id');

            if (!$userId) {
                return response()->json([
                    'error' => 'User ID non fornito'
                ], 400);
            }

            $contacts = User::find($userId)->contacts()->with('messages')->get();

            return response()->json([
                'results' => $contacts,
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Errore nel recupero dei contatti',
                'message' => $e->getMessage()
            ], 500);
        }
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        $contactUserAlreadyExists = Contact::where('user_id', $data['user_id'])->where('phone_number', $data['phone_number'])->first();
        if ($contactUserAlreadyExists) {
            return response()->json([
                'error' => 'Contact already exists',
                'message' => 'Contact already exists'
            ], 400);
        }
        $contactPhoneNumberAlreadyExists = Contact::where('phone_number', $data['phone_number'])->first();
        if ($contactPhoneNumberAlreadyExists) {
            $contact = Contact::create([
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'visible' => true,
                'avatar' => $contactPhoneNumberAlreadyExists->avatar,
                'biography' => $contactPhoneNumberAlreadyExists->biography,
            ]);

            return response()->json([
                'success' => true,
                'results' => $contact,
                'message' => 'Contact created successfully!',
            ]);
        }

        /* $user = User::find($data['user_id']);  // !! Nel caso in cui vogliamo controllare se l'utente esiste

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        } */

        $contact = Contact::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'visible' => true,
            'avatar' => fake()->randomElement(config('avatars_placeholders')),
            'biography' => fake()->text(100),
        ]);


        if (!$contact) {
            return response()->json([
                'success' => false,
                'error' => 'Error in creating contact',
                'message' => 'Contact not created'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'results' => $contact,
            'message' => 'Contact created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return response()->json([
            'success' => true,
            'results' => $contact,
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
        $contact = Contact::findOrFail($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
            ], 404);
        }

        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully!',
        ]);
    }
}
