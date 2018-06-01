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

<div class="form-group">
    <button class="btn btn-success">{{ $buttonText }}</button>
</div>