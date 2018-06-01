<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlotsRequest;
use App\Plot;
use Illuminate\Http\Request;

/**
 * Class PlotController
 *
 * @package App\Http\Controllers
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class PlotController extends Controller
{
    /**
     * PlotController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return Plot::latest('id')->paginate(5);
        }

        return view('plots.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('plots.create');
    }

    /**
     * @param PlotsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlotsRequest $request)
    {
        Plot::create($request->all());

        flash('Plot was created successfully')->success();

        return redirect()->route('plots.index');
    }
}
