<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationValidation;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Функция отпрвки заявки в базу данных
     *
     * @return \Illuminate\Http\Response
     */
    public function sendApplication(ApplicationValidation $applicationValidation)
    {
        $validation = $applicationValidation->validated();
        Application::create($validation);
        return redirect()->route('thanks');
    }

    /**
     * Показ панели управления заявками
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showApplicationsPanel()
    {
        /* Выборка новых заявок из БД */
        $new_applications = DB::table('applications')
            ->where('status', '=', 'новый')
            ->orderBy('created_at', 'DESC')
            ->get();
        $handled_applications = DB::table('applications')
            ->where('status', '=', 'обработанный')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.applications.applications', ['new_applications' => $new_applications], ['handled_applications' => $handled_applications]);
    }

    /**
     * Функция обработки заявки
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleApplications($id)
    {
        DB::table('applications')
            ->where('id', '=', $id)
            ->update(['status' => 'обработанный']);
        return redirect()->route('applications-panel');
    }


    /**
     * Удаление заявки из БД
     * @param $id
     * @return \Illuminate\Http\RedirectResponse\
     */
    public function deleteApplication($id)
    {
        DB::table('applications')->where('id', '=', $id)->delete();
        return redirect()->route('applications-panel');
    }
}
