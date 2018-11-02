<?php

namespace App\Http\Controllers\Admin;

use App\Records\Records;
use App\Http\Requests\AdminEmailForm;
use Carbon\Carbon;
use App\{Lesson, Program, Level, User, Course, UserRecord, Admin, Asana, AsanaType, RoutineQuestionaire, Feedback, Teacher, Article, ArticleTopic};
use App\Billing\Membership;
use App\Filters\UserFilters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function index(Membership $membership)
	{
		$membershipsAtGlance = UserRecord::monthly()->take(6)->pluck('count', 'month')->toArray();
        $numberOfClasses = Lesson::count();
        $latestUsers = User::latest()->take(30)->get();

        return view('admin/pages/dashboard/index', compact(['membershipsAtGlance', 'numberOfClasses', 'membership', 'latestUsers']));
	}

	public function statistics()
	{
		$dailySignups = UserRecord::statistics()->daily()->take(15)->get();
		$monthlySignups = UserRecord::statistics()->monthly()->take(8)->get();
		$yearlySignups = UserRecord::statistics()->yearly()->take(4)->get();

		$dailyDeleted = Feedback::statistics()->daily()->take(15)->get();
		$monthlyDeleted = Feedback::statistics()->monthly()->take(8)->get();
		$yearlyDeleted = Feedback::statistics()->yearly()->take(4)->get();

		$gender = User::statistics()->gender();
		$level = User::statistics()->level();
		$routine = User::statistics()->routine();
		$status = User::statistics()->status();

        return view('admin/pages/statistics/index', 
        	compact([
        		'dailySignups', 'monthlySignups', 'yearlySignups', 
        		'dailyDeleted', 'monthlyDeleted', 'yearlyDeleted', 
        		'gender', 'status', 'level', 'routine'])
        );
	}

	public function asanas()
	{
        $asanas = Asana::paginate(11);
        return view('admin/pages/asanas/index', compact(['asanas']));
	}

	public function asanaTypes()
	{
		return view('admin/pages/asanas/types/index');
	}

	public function asanaSubtypes()
	{
		return view('admin/pages/asanas/subtypes/index');
	}
	
	public function programs()
	{
        $programs = Program::paginate(11);

        $lessons = Lesson::whereNull('program_id')->orderBy('name')->get();

        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/programs/index', compact(['programs', 'lessons', 'teachers']));
	}
	
	public function courses()
	{
        $courses = Course::paginate(8);
        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/courses/index', compact(['courses', 'teachers']));
	}
	
	public function articles()
	{
        $basics = Article::subject('yoga-basics')->get();
        $philosophy = Article::subject('yoga-philosophy')->get();
        $subjects['basics'] = $basics;
        $subjects['philosophy'] = $philosophy;

        return view('admin/pages/articles/index', compact('subjects'));
	}
	
	public function blog()
	{
        $articles = Article::blog()->paginate(12);

        return view('admin/pages/articles/blog', compact('articles'));
	}
	
	public function articleTopics()
	{
        $topics = ArticleTopic::orderBy('name')->get();

        return view('admin/pages/articles/topics/index', compact('topics'));
	}

	public function users(Request $request, UserFilters $filters)
	{
		if ($request->has('order') || $request->has('status')) {
			$users = User::filter($filters)->paginate(24);
		} else {
			$users = User::latest()->paginate(24);
		}

		return view('admin/pages/users/index', compact('users'));
	}

	public function user(User $user)
	{
		return view('admin/pages/users/show', compact('user'));
	}

	public function invoices(User $user)
	{
		return view('admin/pages/users/invoices', compact('user'));
	}

	public function destroyUser(User $user)
	{
        Feedback::create([
        	'about' => 'delete',
            'email' => $user->email,
            'comment' => 'User deleted by an administrator.'
        ]);

		$user->delete();

		return redirect('/admin/users')->with('status', 'The user has been successfully deleted.');
	}

	public function teachers(Request $request)
	{
		$teachers = Teacher::latest()->paginate(11);

		return view('admin/pages/teachers/index', compact('teachers'));
	}

	public function teacher(Teacher $teacher)
	{
		return view('admin/pages/teachers/show', compact('teacher'));
	}

	public function destroyTeacher(Teacher $teacher)
	{
		$teacher->delete();

		return redirect('/admin/teachers')->with('status', 'The teacher has been successfully deleted.');
	}

	public function sendMail(Request $request, AdminEmailForm $form)
	{
		$form->send($request);

		return redirect()->back()->with('status', "Your email was sent successfully.");
	}

	public function createMail()
	{
		$email = (request()->has('email')) ? request('email') : old('email');

		return view('admin/pages/emails/index', compact('email'));
	}
}
