<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\View;
use App\Model\Vote;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class AnalysisController extends Controller
{


    public function analysis(Request $request)
    {
        $startDate = now()->subSeconds(\request('time'));
        $endDate = now();

        $comics = Comicwork::select(['id','name'])->cursor()->sort(function ($u, $v) use ($request, $startDate, $endDate) {
            if($v->total == null)
                $v->total = $this->eval($v, $startDate, $endDate);
            if($u->total == null)
                $u->total = $this->eval($u, $startDate, $endDate);
            return $request->category == 'cao-nhat' ?  $v->total - $u->total : $u->total - $v->total ;
        })->take(5);

        $orther  = View::select('id')
            ->whereNotIn('id_comicwork', $comics->pluck('id')->values()->all())
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        $orther  += Vote::select('id_comicwork')
            ->whereNotIn('id_comicwork', $comics->pluck('id')->values()->all())
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $top = $comics->collect();
        $top->put('other', [
            'id' => '*',
            'name' => 'Các bộ truyện khác',
            'total' =>  $orther
        ]);

        return response($top, 200);
    }


}
