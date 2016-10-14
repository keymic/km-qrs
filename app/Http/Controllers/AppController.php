<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function newest()
    {
        $Quotes = Quote::orderBy('id', 'DESC')->paginate(2);

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

    public function notFound()
    {
        return view('404');
    }
}
