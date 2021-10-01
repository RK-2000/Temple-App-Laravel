<form action="{{route('admin.login.post')}}" method="post">
    @csrf
    <input type="email" name="email" >
    <input type="password" name="password" >
    <button>Submit</button>
</form>
