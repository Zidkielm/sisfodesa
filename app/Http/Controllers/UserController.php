<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function account_request_view()
    {
        $users = User::where('status', 'submitted')->get();
        return view('pages.account-request.index', [
            'users' => $users,
        ]);
    }
    public function account_approval(Request $request, $userId)
    {
        $request->validate([
            'for' => ['required', Rule::in(['aceepted', 'rejected', 'activate', 'deactivate'])],
        ]);

        $for = $request->input('for');
        $user = User::findOrFail($userId);
        $user->status = ($for == 'approve' || $for == 'activate') ? 'approved' : 'rejected';
        $user->save();

        if ($for == 'activate') {
            return back()->with('success', 'berhasil mengaktifkan akun');
        } else if ($for == 'deactivate') {
            return back()->with('success', 'berhasil menonaktifkan akun');
        }

        return back()->with('success', $for == 'approve' ? 'berhasil menyetujui akun' : 'berhasil menolak akun');
    }

    public function account_list_view()
    {
        $users = User::where('role_id', 2)->where('status', '!=', 'submitted')->get();
        return view('pages.account-list.index', [
            'users' => $users,
        ]);
    }
}
