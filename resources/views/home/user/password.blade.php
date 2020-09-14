@extends("home.user.user-master")


@section("user-info-body")
    <form action="/user/password" class="column">
        @csrf
        <div class="level title">
            <p class="level-left has-text-weight-bold">Đổi mật khẩu</p>
        </div>
        <form method="post">
            <div class="form-change-pass">
                <div class="field">
                    <p class="txt">Mật khẩu hiện tại</p>
                    <p class="control">
                        <input class="input" type="password" value="" name="password_old" id="password_old">
                    </p>
                </div>
                <div class="field">
                    <p class="txt">Mật khẩu mới</p>
                    <p class="control">
                        <input class="input" type="password" value="" name="password_new" id="password_new">
                    </p>
                </div>
                <div class="field">
                    <p class="txt">Xác nhận mật khẩu</p>
                    <p class="control">
                        <input class="input" type="password" value="" name="confirm_password_new"
                               id="confirm_password_new">
                    </p>
                </div>
                <div id="notify" class="field">
                    @if(count($errors) > 0 && $errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @elseif(session('notify'))
                        <div class="alert alert-success">{{session('notify')}}</div>
                    @endif
                </div>
                <div class="field">
                    <p class="control">
                        <button onclick="onSubmit()" class="button is-danger">Đổi mật khẩu</button>
                    </p>
                </div>
            </div>
        </form>
    </form>
@endsection

