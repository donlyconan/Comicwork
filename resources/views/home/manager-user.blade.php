@include('share/header');


<section class="main-content">
    <div class="container">
        <div class="messages columns">
            <div class="column is-narrow left pc">
                <ul class="nav-user">
                    <li><a class="li01 is-active" href="http://truyenqq.com/quan-ly-tai-khoan.html">Quản lý tài
                            khoản</a></li>
                    <li><a class="li02 " href="http://truyenqq.com/tin-nhan.html">Tin nhắn</a></li>
                    <li><a class="li03 " href="http://truyenqq.com/doi-mat-khau.html">Đổi mật khẩu</a></li>
                </ul>
            </div>
            <div class="column columns">
                <div class="user-right column">
                    <div class="img">
                        <img class="image-avatar" src="{{asset('image/avatar.png')}}" alt="">
                    </div>
                    <input type="file" multiple="false" name="files[]" id="uploadavatar" style="display: none;">
                    <button id="filechooser" class="button is-danger btn-avatar">Chọn hình</button>
                </div>
                <div class="user-main column">
                    <div class="level title">
                        <p class="level-left has-text-weight-bold">Thông tin tài khoản</p>
                    </div>
                    <form method="post">
                        <div class="form-change-pass">
                            <div class="field">
                                <p class="txt">Tài khoản:</p>
                                <p class="control">
                                    <input class="input" type="text" value="{{$user->username}}" disabled="">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Email:</p>
                                <p class="control">
                                    <input class="input" type="email" value="{{$user->email}}">
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
                                    <input class="input" type="text" id="full_name" name="full_name" value="{{$user->full_namef}}">
                                </p>
                            </div>
{{--                            <div class="field">--}}
{{--                                <p class="txt">Tên</p>--}}
{{--                                <p class="control">--}}
{{--                                    <input class="input" type="text" id="first_name" name="first_name" value="">--}}
{{--                                </p>--}}
{{--                            </div>--}}
                            <div class="field">
                                <p class="txt">Ngày sinh</p>
                                <p class="control">
                                    <input class="input" type="date" id="birthday" name="birthday"
                                           value="{{$user->date_of_birth}}">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Điện thoại</p>
                                <p class="control">
                                    <input class="input" id="phone" name="phone" type="number" value="">
                                </p>
                            </div>
                            <div class="field user-field">
                                <span class="txt">Giới tính</span>
                                <input type="radio" id="gender1" name="gender" value="1">
                                <label for="gender1">Nam</label>
                                <input type="radio" id="gender2" name="gender" value="0" checked="">
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
                                    <input class="input" id="address" name="address" type="text" value="{{$user->address}}">
                                </p>
                            </div>
                            <input type="hidden" id="avatar" name="avatar" value="">
                            <input type="hidden" id="inputDelImage" name="inputDelImage" value="">
                            <div class="field">
                                <p class="control">
                                    <button class="button is-danger" type="submit">Lưu</button>
                                </p>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $('.btn-avatar').click(function () {
        $('#uploadavatar').trigger('click');
    });

    $(document).ready(function () {
        $("#uploadavatar").fileupload({
            url: "/frontend/user/upload",
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    if (file.error) {
                        alert(file.error);
                    } else {
                        if ($('#inputDelImage').val() == '') {
                            $('#inputDelImage').val($('#avatar').val());
                        } else {
                            $('#inputDelImage').val($('#inputDelImage').val() + ',' + $('#avatar').val());
                        }
                        $(".image-avatar").attr("src", file.url);
                        $("#avatar").val(file.url);
                    }
                });
                $(".btn-avatar").text('Chọn Hình...');
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $(".btn-avatar").text(progress + "%");
            },
        });
    });
</script>

@include('share/footer');
