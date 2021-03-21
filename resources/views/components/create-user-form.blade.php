<form action="{{route('createUser')}}" id="createUser" name="createUser" method="post">
    @csrf
    <div class="form-group">
        <label for="login">Username</label>
        <input type="text" class="w-25 form-control @error('login') is-invalid @enderror" name="login" id="name">
        @error('login')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="group">Example select</label>
        <select class="w-25 form-control @error('group') is-invalid @enderror" name="group" id="group">
            @foreach($userTypes as $index => $type)
                <option value="{{$type['group']}}">{{$type['name']}}</option>
                @endforeach
        </select>
        @error('group')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="@error('group') is-invalid @enderror form-control w-25" id="password">
        @error('password')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-25 @error('group') is-invalid @enderror form-control" id="password_confirmation">
        @error('password_confirmation')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" form="createUser" class="btn btn-dark">Create User</button>
</form>
