<?php

namespace App\Http\Controllers;

use App\Http\Requests\TractorsRequest;
use App\Tractor;
use Illuminate\Http\Request;

/**
 * Class TractorController
 *
 * @package App\Http\Controllers
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class TractorController extends Controller
{
    /**
     * TractorController constructor.
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
            return Tractor::latest('id')->paginate(5);
        }

        return view('tractors.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tractors.create');
    }

    /**
     * @param TractorsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TractorsRequest $request)
    {
        Tractor::create($request->all());

        flash('Tractor was created successfully')->success();

        return redirect()->route('tractors.index');
    }
}
