<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        @foreach ($status->lists() as $index => $ts)
            <option value="{{$index}}" @if($index==$day->status) selected @endif >{{$ts}}</option>
        @endforeach
    </select>
</div>