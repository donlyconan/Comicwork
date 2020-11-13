<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\Follow;
use App\Model\User;
use App\Model\View;
use App\Model\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public const DAY = 3600 * 24;

    public const DANHMUC = [
        'Cao nhất' => 'cao-nhat',
        'Thấp nhất' => 'thap-nhat'
    ];

    public const THOIGIAN = [
        '1 Ngày trước' => self::DAY,
        '1 Tuần trước' => 7 * self::DAY,
        '1 Tháng trướ
        c' => 30 * self::DAY,
        '3 Tháng trước' => 3 * 30 * self::DAY,
        '1 Năm trước' => 365 * self::DAY
    ];


    private $user;
    private $comicwork;
    private $view;
    private $follow;
    private $vote;


    /**
     * DashboardController constructor.
     */
    public function __construct(User $user, Comicwork $comicwork, View $view, Follow $follow, Vote $vote)
    {
        $this->user = $user;
        $this->comicwork = $comicwork;
        $this->view = $view;
        $this->follow = $follow;
        $this->vote = $vote;
    }

    public function index()
    {
        $users = $this->user->all();
        $dataFollowsCount = DB::table('comicworks')
            ->join('follows', 'comicworks.id', '=', 'follows.id_comicwork')
            ->where('follows.status', '=', 1)
            ->select('comicworks.id', 'comicworks.name', DB::raw('count(*) as follows_count'))
            ->groupBy('comicworks.id', 'comicworks.name')
            ->orderBy('follows_count', 'desc')
            ->limit(10)
            ->get();

        $dataVotesCount = DB::table('comicworks')
            ->join('votes', 'comicworks.id', '=', 'votes.id_comicwork')
            ->where('votes.status', '=', 1)
            ->select('comicworks.id', 'comicworks.name', DB::raw('count(*) as votes_count'))
            ->groupBy('comicworks.id', 'comicworks.name')
            ->orderBy('votes_count', 'desc')
            ->limit(10)
            ->get();

        $user_online = $this->user
            ->where('status', 1)
            ->count();

        $views = $this->view->all()->count();
        $follows = $this->follow
            ->where('status', 1)
            ->count();
        $votes = $this->vote
            ->where('status', 1)
            ->count();


        return view('admin.dashboards.index', ['users' => $users, 'dataFollowsCount' => $dataFollowsCount,
            'dataVotesCount' => $dataVotesCount, 'user_online' => $user_online, 'views' => $views, 'follows' => $follows, 'votes' => $votes])
            ->with('val_times', self::THOIGIAN)
            ->with('val_cate', self::DANHMUC);
    }
}
