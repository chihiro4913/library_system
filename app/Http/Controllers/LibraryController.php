<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\Log;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
  public function __construct()
  {
    //認証機能有効化
    $this->middleware("auth");
  }


  public function index()
  {
    // $libraries = Library::all();
    $user = Auth::user();

    $libraries = Library::orderBy('id', 'asc')->where(function ($query) {

      // 検索機能
      if ($search = request('search')) {
          $query->where(
            'name', 'LIKE', "%{$search}%"
          )
          ->orWhere(
            'writer','LIKE',"%{$search}%"
          );
      }
    // 8投稿毎にページ移動
    })->paginate(6);


    return view("/index", [
      "libraries" => $libraries,
      "user" => $user
    ]);
  }

  public function borrowingForm(Request $request)
  {
    //書籍貸出フォームを表示する
    $library = Library::find($request->id);
    
    return view("/borrow", [
      "library" => $library,
      "user" => Auth::user()
    ]);
  }

  public function borrow(Request $request)
  {
    //貸出しフォームの情報をもとに、貸出し処理を行う
    $library = Library::find($request->id);
    $library->user_id = Auth::id();
    $library->save();

    $log = new Log();
    $log->user_id = Auth::id();
    $log->library_id = $request->id;
    $log->rent_date = now();
    $log->return_due_date = date('Y-m-d', strtotime('+1 week'));
    $log->return_date = null;
    $log->save();

    return redirect('library/index');
  }

  public function returnBook(Request $request)
  {
    $library = Library::find($request->id);
    $library->user_id = 0;
    $library->save();

    $logs = Log::where([
        ['library_id', '=', $request->id],
        ['user_id', '=', Auth::id()],
        ['return_date', '=', null]
      ])->get();
    
    foreach ($logs as $log) {
      $log->return_date = now();
      $log->save();
    }
  
    return redirect('library/index');
  }

  public function history() 
  {
    $user = Auth::user();
    $histories = Log::join(
      'libraries', 'libraries.id', '=', 'logs.library_id'
    )
    ->where(
      'logs.user_id', Auth::id()
    )
    ->select(
      'libraries.name',
      'libraries.writer',
      'logs.rent_date',
      'logs.return_date'
    )
    ->get();

    return view("/history", [
      'histories' => $histories,
      'user' => $user
    ]);
  }

  public function borrowNow()
  {
    $user = Auth::user();
    $borrows = Log::join(
      'libraries', 'libraries.id', '=', 'logs.library_id'
    )
    ->where(
      'logs.user_id', Auth::id()
    )
    ->whereNull('logs.return_date')
    ->select([
      'libraries.name',
      'libraries.writer',
      'logs.rent_date',
      'logs.return_due_date'
    ])
    ->get();


    return view("/borrowNow", [
      'borrows' => $borrows,
      'user' => $user
    ]);
  }

  public function logOut()
  {
    Auth::logout();

    return redirect('/login');
  }
}