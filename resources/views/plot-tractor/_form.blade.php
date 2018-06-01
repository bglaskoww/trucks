<div class="form-group{{ $errors->has('plot_id') ? ' has-error' : '' }}">
    <label for="plot_id">Field:</label>
    <select class="form-control" name="plot_id" id="plot_id" required>
        @foreach($plots as $plot)
            <option
                    value="{{ $plot->id }}"
                    @if(old('plot_id', $plotTractor->plot_id ?? null) == $plot->id)
                    selected
                    @endif
            >{{ $plot->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('plot_id'))
        <span class="help-block">
            <strong>{{ $errors->first('plot_id') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('tractor_id') ? ' has-error' : '' }}">
    <label for="tractor_id">Truck:</label>
    <select class="form-control" name="tractor_id" id="tractor_id" required>
        @foreach($tractors as $tractor)
            <option
                    value="{{ $tractor->id }}"
                    @if(old('tractor_id', $plotTractor->tractor_id ?? null) == $tractor->id)
                    selected
                    @endif
            >{{ $tractor->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('tractor_id'))
        <span class="help-block">
            <strong>{{ $errors->first('tractor_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
    <label for="area">Area:</label>
    <input
            type="number"
            class="form-control"
            name="area"
            id="area"
            placeholder="Area"
            min="1"
            value="{{ old('area', $plotTractor->area ?? null) }}"
            required
    >
    @if ($errors->has('area'))
        <span class="help-block">
            <strong>{{ $errors->first('area') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('plowing_date') ? ' has-error' : '' }}">
    <label for="plowing_date">Plowing date:</label>
    <input
        class="form-control datepicker"
        name="plowing_date"
        id="plowing_date"
        placeholder="Plowing date"
        value="{{ old('plowing_date', $plotTractor->plowing_date ?? null) }}"
        required
    >
    @if ($errors->has('plowing_date'))
        <span class="help-block">
            <strong>{{ $errors->first('plowing_date') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <button class="btn btn-success">{{ $buttonText }}</button>
</div>