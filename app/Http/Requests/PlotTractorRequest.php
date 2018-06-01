<?php

namespace App\Http\Requests;

use App\Plot;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PlotTractorRequest
 *
 * @package App\Http\Requests
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class PlotTractorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $plot = Plot::find($this->plot_id);

        $max = !empty($plot) ? '|max:'.$plot->area : '';

        return [
            'plot_id' => 'required|exists:plots,id',
            'tractor_id' => 'required|exists:tractors,id',
            'area' => 'required|integer|min:1'.$max,
            'plowing_date' => 'required|date_format:"m/d/Y"',
        ];
    }
}
