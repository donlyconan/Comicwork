@extends("layout.user-master")

@section("user-info-body")
    <div class="column columns">
        <div class="user-right column">
            @csrf
            <div class="img">
                <img id="avatar" style="object-fit: cover;" class="image-avatar" src="{{$user->profile()}}"
                     alt="{{$user->full_name}}">
            </div>
            <button id="filechooser" onclick="onUpload()" class="button is-danger btn-avatar">Thay đổi</button>
        </div>

        <div class="user-main column">
            <div class="level title">
                <p class="level-left has-text-weight-bold">Thông tin tài khoản</p>
            </div>
            <div>
                @if(count($errors) > 0 && $errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li style="margin-left: 10px;">{{$error}}</li>
                        @endforeach
                    </ul>
                @elseif(session('notify'))
                @section("user-avatar")
                    <img style="border: #7f8c8d 1px solid;"
                         src="{{$user->url_image or asset('storage/default/avatar.png')}}">
                @endsection
                <div class="alert alert-success" style="text-align: center;">{{session('notify')}}</div>
                @endif
            </div>
            <form action="/user/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-change-pass">
                    <div class="field">
                        <p class="txt">Tài khoản:</p>
                        <p class="control">
                            <input class="input" type="text" value="{{$user->username}}" disabled>
                        </p>
                    </div>
                    <div class="field">
                        <p class="txt">Email:</p>
                        <p class="control">
                            <input class="input" type="email" value="{{$user->email}}" disabled>
                        </p>
                    </div>
                </div>
                <div class="level title user-title">
                    <p class="level-left has-text-weight-bold">Thông tin cá nhân</p>
                </div>
                <div class="form-change-pass user-form">
                    <div class="field">
                        <p class="txt">Họ và tên</p>
                        <p class="control">
                            <input class="input" type="text" id="full_name" name="full_name"
                                   value="{{$user->full_name}}">
                        </p>
                    </div>
                    <div class="field">
                        <p class="txt">Ngày sinh</p>
                        <p class="control">
                            <input class="input" type="date" id="birthday" name="date_of_birth"
                                   value="{{"2017-07-07"}}">
                        </p>
                    </div>
                    <div class="field">
                        <p class="txt">Điện thoại</p>
                        <p class="control">
                            <input class="input" id="phone" name="phone" type="number"
                                   value="{{$user->phone}}">
                        </p>
                    </div>
                    <div class="field user-field">
                        <span class="txt">Giới tính</span>
                        <input type="radio" id="gender1" name="gender" value="0">
                        <label for="gender1">Nam</label>
                        <input type="radio" id="gender2" name="gender" value="1" checked="">
                        <label for="gender2">Nữ</label>
                        <script>
                            @if($user->sexs == 0)
                            $('#gender1').attr('checked', true);
                            @else
                            $('#gender2').attr('checked', true);
                            @endif
                        </script>
                    </div>
                    <div class="field">
                        <p class="txt">Địa chỉ:</p>
                        <p class="control">
                            <input class="input" id="address" name="address" type="text"
                                   value="{{$user->address}}">
                        </p>
                    </div>
                    <input id="upload" type="file" name="image" style="display: none;">
                    <div class="field">
                        <p class="control">
                            <button class="button is-danger" type="submit">Lưu</button>
                        </p>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function onUpload() {
        const avatar = document.getElementById("avatar");
        const upload = document.getElementById("upload");

        upload.addEventListener("change", function () {
            const file = this.files[0];
            var name = file ? file.name : "";

            if (name.endsWith(".jpg") | name.endsWith(".git")
                | name.endsWith(".png") | name.endsWith(".jpge")) {
                const fileReader = new FileReader();

                fileReader.addEventListener("load", function () {
                    avatar.setAttribute("src", this.result);
                });
                fileReader.readAsDataURL(file);
            } else {
                alert("Ảnh sai định dạng các định dạng đạt yêu cầu: *.jpg, *.jpge, *.png, *.git");
            }
        });
        upload.click();
    }
</script>
