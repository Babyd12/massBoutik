<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\User;
use App\Models\Phone;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::with('phones')->paginate(10);
        return view('admin.user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();

        return view('admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $data['role'] =  auth()->user()->email == $data['email'] ? 'admin' : 'customer';

        if($request->hasFile('picture')){
            $path = $request->file('picture')->store('images/users', 'public');
            $data['picture'] = $path;
        }

        if (!empty($data['phone'])) {

            DB::beginTransaction();
            try {
                $user = User::create($data);

                Phone::create([
                    'indicative' => $data['indicative'],
                    'phone' => $data['phone'],
                    'user_id' => $user->id,
                ]);

                DB::commit();

                return Redirect::route('users.index')
                    ->with('success', 'User created successfully.');
            } catch (\Exception $e) {
                DB::rollBack();
                return Redirect::route('users.create')
                    ->with('error', $e->getMessage());
            }
        } else {
            User::create($data);
            return Redirect::route('users.index')
                ->with('success', 'User created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::with('phones')->find($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $data['role'] =  auth()->user()->email == $data['email'] ? 'admin' : 'customer';

        if($request->hasFile('picture')){
            $existPath = $user->picture;
            //delete the exist path
            if($existPath && Storage::disk('public')->exists($existPath) ){
                Storage::disk('public')->delete($existPath);
            }
            //upload new picture path
            $path = $request->file('picture')->store('images/users', 'public');
            $data['picture'] = $path;
        }
        // dd($data);
        if (!empty($data['phone'])) {

            DB::beginTransaction();

            try {
                $user->update($data);
                $phone = Phone::where('user_id', $user->id)->first();

                if ($phone) {
                    $phone->update([
                        'phone' => $data['phone'],
                    ]);
                } else {
                    Phone::create([
                        'indicative' => $data['indicative'],
                        'phone' => $data['phone'],
                        'user_id' => $user->id,
                    ]);
                }

                DB::commit();

                return Redirect::route('users.index')
                    ->with('success', 'User created successfully.');
            } catch (\Exception $e) {
                DB::rollBack();
                return Redirect::route('users.edit', $user->id)
                    ->with('error', $e->getMessage());
            }
        } else {
            User::create($data);
            return Redirect::route('users.index')
                ->with('success', 'User updated successfully');
        }
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
