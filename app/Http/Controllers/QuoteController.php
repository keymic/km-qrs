<?php
/**
 * Created by PhpStorm.
 * User: mgorecki
 * Date: 07.09.15
 * Time: 11:43
 */

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        if ($quotes != null) {
            return response()->json($quotes);
        }
        Log::error('Failed to get any quotes');

        return response()->json('fail, no quotes found');
    }

    public function getQuote($id)
    {
        $quote = Quote::find($id);

        return response()->json($quote);
    }

    public function saveQuote(Request $request)
    {
        $quote = Quote::create($request->all());
        if ($quote != null) {
            return response()->json($quote);
        }
        Log::error('Failed to create quote', ['request' => $request->all()]);

        return response()->json('fail, quote not created');
    }

    public function deleteQuote($id)
    {
        $quote = Quote::find($id);
        if ($quote != null) {
            $quote->delete();

            return response()->json('success');
        }
        Log::error('Failed to delete quote, not found', ['id' => $id]);

        return response()->json('fail, quote not found');

    }

    public function updateQuote(Request $request, $id)
    {
        $quote = Quote::find($id);
        if ($quote != null) {
            if ($request->has('author')) {
                $quote->author = $request->input('author');
            }
            if ($request->has('text')) {
                $quote->text = $request->input('text');
            }
            $quote->save();
            return response()->json($quote);
        }
        Log::error('Failed to update quote, not found', ['id' => $id]);

        return response()->json('fail, quote not found');
    }

}