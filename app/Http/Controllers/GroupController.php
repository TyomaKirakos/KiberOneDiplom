<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupValidation;
use App\Http\Requests\HomeworkValidation;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Фукнция показа панели управления группами
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGroupsPanel()
    {
        /* Выборка групп из БД */
        $groups = DB::table('groups')
            ->orderBy('name', 'DESC')
            ->get();
        return view('admin.groups.groups', ['groups' => $groups]);
    }

    /**
     * Фукнция показа страницы отдельной группы
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGroupPage($id)
    {
        $group = Group::find($id);
        $students = DB::table('users')
            ->where('group_id', '=', $id)
            ->orderBy('surname', 'DESC')
            ->get();
        return view('pages.group', ['students' => $students], compact('group'));
    }

    /**
     * Фукнция показа страницы создания группы
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGroupCreation()
    {
        return view('admin.groups.createGroup');
    }

    /**
     * Функция создания новой группы
     * @param CreateGroupValidation $createGroupValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createGroup(CreateGroupValidation $createGroupValidation)
    {
        $validation = $createGroupValidation->validated();
        Group::create($validation);
        return redirect()->route('groups-panel');
    }

    /**
     * Фукнция удаления группы
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteGroup($id)
    {
        DB::table('groups')->where('id', '=', $id)->delete();
        return redirect()->route('groups-panel');
    }

    /* Возможности тьютора */

    /**
     * Фукнция показа панели управления группами для тьютора
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGroupsList()
    {
        $groups = DB::table('groups')
            ->where('name', '!=', 'kiber')
            ->orderBy('name', 'DESC')
            ->get();
        return view('teacher.groups.groups', ['groups' => $groups]);
    }

    /**
     * Фукнция показа страницы написания д/з
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showChangeHomework($id)
    {
        $group = Group::find($id);
        return view('teacher.groups.changeHW', compact('group'));
    }

    /**
     * Функция написания д/з
     * @param Group $group
     * @param HomeworkValidation $homeworkValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeHomework(Group $group, HomeworkValidation $homeworkValidation)
    {
        $group->update($homeworkValidation->validated());
        return redirect()->route('group-page', $group->id);
    }
}
