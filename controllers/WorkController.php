<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\Work;

class WorkController extends Controller
{
    public Work $work;

    public function __construct()
    {
        $this->work = new Work();
        $this->status = $this->work->status;
        $this->table = 'works';
    }

    public function index(): array|bool|string
    {
        $works = Application::get('DB')->selectAll($this->table, Work::class, 'order by id desc');
        $title = 'Works lists';
        $status = $this->status;

        return $this->render('works.index', compact('works', 'title', 'status'));
    }

    /**
     * Action load form create work
     * @return array|bool|string
     */
    public function create(): bool|array|string
    {
        $title = 'Create New Work';
        $status = $this->status;

        return $this->render('works.create', compact('title', 'status'));
    }

    /**
     * Action create work
     * @return void
     */
    public function store()
    {
        $params = [
            'name' => (empty($_POST['name'])) ? '' : trim(strip_tags($_POST['name'])),
            'starting_date' => (empty($_POST['starting_date'])) ? '' : trim(strip_tags($_POST['starting_date'])),
            'ending_date' => (empty($_POST['ending_date'])) ? '' : trim(strip_tags($_POST['ending_date'])),
            'status' => (empty($_POST['status'])) ? 0 : trim(strip_tags($_POST['status']))
        ];

        if (empty($params['name'])) {
            return redirect('works/create');
        }

        try {
            Application::get('DB')->insert($this->table, $params);
        } catch (Exception $e) {
            $this->render('_500');
        }

        Application::$application->response->redirect('/works');
    }

    /**
     * Action load form edit work
     * @return array|false|string|string[]|void
     */
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->render('_500');
            exit();
        }

        $id = trim(strip_tags($_GET['id']));

        $work = Application::get('DB')->first($this->table, Work::class, $id);
        if (empty($work)) {
            $this->render('_404');
            exit();
        }

        $work = $work[0];
        $title = $work->name . ' | Works edit';
        $status = $this->status;

        return $this->render('works.update', compact('work', 'title', 'status'));
    }

    /**
     * Action update work
     * @return void
     */
    public function update()
    {
        if (!isset($_GET['id'])) {
            $this->render('_404');
            exit();
        }

        $id = trim(strip_tags($_GET['id']));

        $work = Application::get('DB')->first($this->table, Work::class, $id);
        if (empty($work)) {
            $this->render('_404');
            exit();
        }

        $params = [
            'name' => (empty($_POST['name'])) ? '' : trim(strip_tags($_POST['name'])),
            'starting_date' => (empty($_POST['starting_date'])) ? '' : trim(strip_tags($_POST['starting_date'])),
            'ending_date' => (empty($_POST['ending_date'])) ? '' : trim(strip_tags($_POST['ending_date'])),
            'status' => (empty($_POST['status'])) ? 0 : trim(strip_tags($_POST['status']))
        ];

        if (empty($params['name'])) {
            $this->render('_500');
            exit();
        }

        try {
            Application::get('DB')->update($this->table, $params, $id);
        } catch (Exception $e) {
            $this->render('_500');
        }

        Application::$application->response->redirect('/works');
    }

    /**
     * Action delete work
     * @return void
     */
    public function delete()
    {
        if (!isset($_GET['id'])) {
            $this->render('_404');
        }

        $id = trim(strip_tags($_GET['id']));

        $work = Application::get('DB')->first($this->table, Work::class, $id);
        if (!empty($work)) {
            Application::get('DB')->delete($this->table, $id);
        }

        Application::$application->response->redirect('/works');
    }

    public function calendar()
    {
        $works = Application::get('DB')->selectAll($this->table, Work::class);
        $title = 'Calendar';
        return $this->render('works.calendar', compact('title', 'works'));
    }
}