<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');

    // $users = DB::table('users')->get();
    // dd($users);


    // query data

    // $users = DB::select('select * from users where email = ?', ['a@b.com']);
    // dd($users);

    // $user = DB::table('users')->where('email', 'a@b.com')->first();
    // dd($user);


    // insert data

    // $user = DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['John Doe', 'johndoe@gmail.com', 'password']);
    // dd($user);

    // $user = DB::table('users')->insert([
    //     'name' => 'Jane Doe',
    //     'email' => 'johndoe@gmail.com',
    //     'password' => 'password',
    // ]);
    // dd($user);


    // update data

    // $user = DB::update('update users set name = ? where id = ?', ['Jane Doe', 3]);
    // dd($user);

    // $user = DB::table('users')->where('id', 4)->update([
    //     'name' => 'XxxxVvvv',
    // ]);
    // dd($user);


    // delete data

    // $user = DB::delete('delete from users where id = ?', [3]);
    // dd($user);

    // $user = DB::table('users')->where('id', 4)->delete();
    // dd($user);

    // // Eloquent ORM
    // $users = User::where('id', 5)->first();
    // dd($users);
    //
    // $user = User::create([
    //     'name' => 'Mike Hill',
    //     'email' => 'mikehell@gmail.com',
    //     'password' => 'password',
    // ]);
    // dd($user);
    //
    // $user = User::where('id', 5)->update([
    //     'name' => 'Mike Jackson',
    // ]);
    // dd($user);
    //
    // $user = User::where('id', 6)->delete();
    // dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
