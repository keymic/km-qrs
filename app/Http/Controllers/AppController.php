<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Rate;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function newest()
    {
        $Quotes = Quote::orderBy('id', 'DESC')->withCount(['ratesPlus', 'ratesMinus'])->paginate(2);

        return view('welcome')->with('Quotes', $Quotes)->with('pageTitle', trans('app.newest_quotes'));
    }

    public function quote($id = null)
    {
        if (!is_numeric($id)) {
            return redirect('/notFound');
        }
        $Quote = Quote::find($id);
        if (null == $Quote) {
            return redirect('/notFound');
        }

        return view('welcome')->with('Quotes', [$Quote])->with('pageTitle', trans('app.quote'))->with('noPaginate', true);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $Quote = new Quote();
            $Quote->content = $request->input('content');
            $Quote->save();

            return redirect($Quote->id);
        }

        return view('add')->with('request', $request);
    }

    public function rate(Request $request, $id)
    {
        $Quote = Quote::withCount(['ratesPlus', 'ratesMinus'])->find($id);
        if(null == $Quote){
            return response()->json([
                'status' => 'error',
                'message' => trans('app.not_found')
            ]);
        }
        $count = $Quote->rates_plus_count - $Quote->rates_minus_count;
        $voted = $request->cookie(sha1('voted'));
        $voted = null == $voted ? [] : json_decode($voted);
        if (!empty($voted)) {
            if (in_array($id, $voted)) {
                return response()->json([
                    'status' => 'error',
                    'message' => trans('app.twice_vote'),
                    'rate' => $count
                ])->cookie(sha1('voted'), json_encode($voted), 60 * 60 * 24 * 120);
            }
        }
        $voted[] = $id;
        $Rate = Rate::where('quote_id', $id)->where('ip', $request->ip())->first();

        if (null != $Rate) {
            return response()->json([
                'status' => 'error',
                'message' => trans('app.twice_vote'),
                'rate' => $count
            ])->cookie(sha1('voted'), json_encode($voted), 60 * 60 * 24 * 120);
        }
        $rate = (1 == strpos($request->getPathInfo(), 'omg')) ? 1 : ((1 == strpos($request->getPathInfo(), 'wtf') ? -1 : 0));

        $Rate = new Rate();
        $Rate->quote_id = $id;
        $Rate->ip = $request->ip();
        $Rate->rate = $rate;
        $Rate->save();

        return response()->json([
            'status' => 'ok',
            'message' => trans('app.voted'),
            'rate' => $count + $rate
        ])->cookie(sha1('voted'), json_encode($voted), 60 * 60 * 24 * 120);
    }

    public function notFound()
    {
        return view('404');
    }
}
