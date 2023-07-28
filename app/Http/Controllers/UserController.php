<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeMoneyValidation;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\UpdateUserValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Фукнция показа собственного профиля
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Фукнция показа страницы входа
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLogin()
    {
        return view('user.login');
    }

    /**
     * Фукнция входа
     * @param LoginValidation $loginValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginValidation $loginValidation)
    {
        if(Auth::attempt($loginValidation->validated())){
            $loginValidation->session()->regenerate();
            return redirect()->route('profile');
        }
        /* Если авторизация не прошла успешно */
        return back()->with('auth', true);
    }

    /**
     * Фукнция выхода из аккаунта
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('main');
    }

    /**
     * Фукнция показа панели управления пользователями
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUsersPanel()
    {
        $users = DB::table('users')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.users.users', ['users' => $users]);
    }

    /**
     * Фукнция показа страницы регистрации пользователей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserRegistration()
    {
        /* Выборка пользователей из БД */
        $groups = DB::table('groups')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.users.createUser', ['groups' => $groups]);
    }

    /**
     * Фукнция регистрации пользователя
     * @param RegisterValidation $registerValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(RegisterValidation $registerValidation)
    {
        $validation = $registerValidation->validated();
        $validation['password'] = Hash::make($validation['password']);
        User::create($validation);
        return redirect()->route('users-panel');
    }

    /**
     * Фукнция показа профиля другого пользователя
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserProfile($id)
    {
        $user = User::find($id);
        return view('admin.users.userProfile', compact('user'));
    }

    /**
     * Фукнция показа страницы редактирования пользователя
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUpdateUser($id)
    {
        /* Выборка групп из БД для формирования селекта группы */
        $groups = DB::table('groups')
            ->orderBy('created_at', 'DESC')
            ->get();
        $user = User::find($id);
        return view('admin.users.updateUser', ['groups' => $groups], compact('user'));
    }

    /**
     * Фукнция редактирования пользователя
     * @param User $user
     * @param UpdateUserValidation $updateUserValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(User $user, UpdateUserValidation $updateUserValidation)
    {
        $user->update($updateUserValidation->validated());
        return redirect()->route('user-profile', $user->id);
    }

    /**
     * Фукнция удаления пользователя
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->route('users-panel');
    }

    /* Возможности тьютора */
    /**
     * Фукнция показа списка учеников
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showStudentsList()
    {
        /* Выборка учеников из БД*/
        $students = DB::table('users')
            ->where('role', '=', 'ученик')
            ->orderBy('surname', 'DESC')
            ->get();
        return view('teacher.students.students', ['students' => $students]);
    }

    /**
     * Фукнция показа страницы отдельного ученика
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showStudentProfile($id)
    {
        $student = User::find($id);
        return view('teacher.students.studentProfile', compact('student'));
    }

    /**
     * Фукнция показа страницы изменения кол-ва киберонов
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showChangeMoney($id)
    {
        $student = User::find($id);
        return view('teacher.students.changeMoney', compact('student'));
    }

    /**
     * Функция изменения кол-ва киберонов у учеников
     * @param User $user
     * @param ChangeMoneyValidation $changeMoneyValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeMoney(User $user, ChangeMoneyValidation $changeMoneyValidation)
    {
        $user->update($changeMoneyValidation->validated());
        return redirect()->route('student-profile', $user->id);
    }
}
