@if ($errors->any())
<div class="alert alert-danger">
<ul>
  @foreach ($errors->all() as $error)
<li>{{$error}}</li>
  @endforeach
</ul>
</div>
@endif

<label for="name">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="{{$user->name ?? ""}}" required>

<label for="email">Email</label>
<input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email ?? ""}}" required>

<label for="title">Пароль</label>
<input type="text" class="form-control" name="password" >

<label for="title">Подтверждение пароля</label>
<input type="text" class="form-control" name="password_confirmation" >

<label for="role">Роль</label>
@foreach ($roles as $role)
  @forelse ($user->roles as $role_user)
    <p>{{$role_user->name}} <input type="checkbox" name="role" value="{{$role_user->id}}" checked></p>
  @empty
    <p>{{$role->name}} <input type="checkbox" name="role" value="{{$role->id}}"></p>

  @endforelse
@endforeach

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
