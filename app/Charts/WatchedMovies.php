<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Movie;
use Illuminate\View\Component;

class WatchedMovies extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function render(): View|Closure|string
    {
        $chart = new SampleChart;
$chart->labels(['One', 'Two', 'Three', 'Four']);
$chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
$chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('components.charts.movies-watched', [

        ]);
    }



}
