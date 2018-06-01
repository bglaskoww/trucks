<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlotTractorRequest;
use App\Plot;
use App\PlotTractor;
use App\QueryFilters\PlotTractorFilters;
use App\Tractor;
use Illuminate\Http\Request;

/**
 * Class PlotTractorController
 *
 * @package App\Http\Controllers
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class PlotTractorController extends Controller
{
    /**
     * @param Request $request
     * @param PlotTractorFilters $plotTractorFilters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, PlotTractorFilters $plotTractorFilters)
    {
        if ($request->wantsJson()) {
            $query = PlotTractor::with('plot', 'tractor')
                ->latest('plowing_date')
                ->filter($plotTractorFilters);

            return response()->json([
                'totalArea' => $query->sum('area'),
                'paginate' => $query->paginate(5)
            ]);
        }

        return view('plot-tractor.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tractors = Tractor::all();
        $plots = Plot::all();

        return view('plot-tractor.create', compact('plowing', 'tractors', 'plots'));
    }

    /**
     * @param PlotTractorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlotTractorRequest $request)
        {
        PlotTractor::create($request->all());

        flash('Plowing was created successfully')->success();

        return redirect()->route('home');
    }

    /**
     * @param PlotTractor $plotTractor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(PlotTractor $plotTractor)
    {
        $tractors = Tractor::all();
        $plots = Plot::all();

        return view('plot-tractor.edit', compact('plotTractor', 'tractors', 'plots'));
    }

    /**
     * @param PlotTractorRequest $request
     * @param PlotTractor $plotTractor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PlotTractorRequest $request, PlotTractor $plotTractor)
    {
        $plotTractor->update($request->toArray());

        flash('Plowing was updated successfully')->success();

        return redirect()->route('home');
    }

    /**
     * @param PlotTractor $plotTractor
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(PlotTractor $plotTractor)
    {
        $plotTractor->delete();

        return response()->json(['success' => 'Plowing was deleted successfully']);
    }
}
