<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name:</label>
    <input
            type="text"
            class="form-control"
            name="name"
            id="name"
            placeholder="Name"
            value="{{ old('name') }}"
            required
    >
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('crop') ? ' has-error' : '' }}">
    <label for="crop">Crop:</label>
    <input
            type="text"
            class="form-control"
            name="crop"
            id="crop"
            placeholder="Crop"
            value="{{ old('crop') }}"
            required
    >
    @if ($errors->has('crop'))
        <span class="help-block">
            <strong>{{ $errors->first('crop') }}</strong>
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
            min="1"
            placeholder="Area"
            value="{{ old('area') }}"
            required
    >
    @if ($errors->has('area'))
        <span class="help-block">
            <strong>{{ $errors->first('area') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <button class="btn btn-success">{{ $buttonText }}</button>
</div>