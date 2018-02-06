{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $employee->name }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('position_id') ? ' has-error' : '' }}">
    <label for="position_id" class="col-md-4 control-label">Position</label>

    <div class="col-md-6">
        <select id="position_id" class="form-control" name="position_id">
            @foreach($positions as $position)
                <option value="{{ $position->id }}"{{ $employee->position_id === $position->id? ' selected' : '' }}>
                    {{ $position->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('position_id'))
            <span class="help-block">
                    <strong>{{ $errors->first('position_id') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
    <label for="salary" class="col-md-4 control-label">Salary</label>

    <div class="col-md-6">
        <input id="salary" type="text" class="form-control" name="salary" value="{{ $employee->salary }}" required>

        @if ($errors->has('salary'))
            <span class="help-block">
                <strong>{{ $errors->first('salary') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('boss_id') ? ' has-error' : '' }}">
    <label for="boss_id" class="col-md-4 control-label">Boss</label>

    <div class="col-md-6">
        <select-autocomplete></select-autocomplete>
        @if ($errors->has('salary'))
            <span class="help-block">
                <strong>{{ $errors->first('boss_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </div>
</div>