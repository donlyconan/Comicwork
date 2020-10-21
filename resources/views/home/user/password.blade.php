@extends("layout.user-master")


@section("user-info-body")
    <div class="column">
        <div class="level title">
            <p class="level-left has-text-weight-bold">Đổi mật khẩu</p>
        </div>
        <form action="/user/change-password" method="post">
            @csrf
            <div class="form-change-pass">
                <div class="field">
                    <p class="txt">Mật khẩu hiện tại</p>
                    <p class="control">
                        <input class="input" type="password" value="" name="oldPassword" id="password_old">
                    </p>
                </div>
                @isset($failed)
                    <div class="field">
                        <div class="alert alert-danger">
                            {{$failed}}
                        </div>
                    </div>
                @endisset
                <div class="field">
                    <p class="txt">Mật khẩu mới</p>
                    <p class="control">
                        <input class="input" type="password" value="" name="newPassword" id="password_new">
                    </p>
                </div>
                <div class="field">
                    <p class="txt">Xác nhận mật khẩu</p>
                    <p class="control">
                        <input class="input" type="password" value="" name="confirmPassword"
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
                        <button type="submit" class="button is-danger">Đổi mật khẩu</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection

