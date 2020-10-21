@extends("layout.home")

@section('title-page')
    {{ $title }}
@endsection

{{--render dữ liệu--}}
@section("body-page")
    <section class="main-content">
        <div class="container story-list">
            <div class="title-list">{{$title}}</div>


            <form action="{{ route('home.browser') }}" method="GET" class="story-list-bl01 box">
                @csrf
                <table>
                    <tr>
                        <th>Thể loại</th>
                        <th>Tình trạng</th>
                        <th>Quốc gia</th>
                        <th>Sắp xếp</th>
                        <th>Năm phát hành</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <div class="select is-warning">
                                <select name="category">
                                    <option value="0" selected>Tất cả</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}" {{$item->id != session('category') ?:'selected'}}>{{$item->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select name="status">
                                    <option value="0" selected>Tất cả</option>
                                    <option value="1" {{1 != session('status') ?:'selected'}}>Đang cập nhật</option>
                                    <option value="2" {{2 != session('status') ?:'selected'}}>Đã hoàn thành</option>
                                </select>
                            </div>
                        </td>
                        <td style="margin: 0px;">
                            <div class="select is-warning">
                                <select name="country">
                                    <option value="0" selected>Tất cả</option>
                                    @foreach($countries as $item)
                                        <option value="{{$item->id}}" {{$item->id != session('country') ?:'selected'}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select name="sort">
                                    <option value="0" selected>Thời gian cập nhật</option>
                                    <option value="1" {{1 != session('sort') ?:'selected'}}>Thời gian đăng</option>
                                    <option value="2" {{2 != session('sort') ?:'selected'}}>Năm xuất bản</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select name="time">
                                    <option value="0" selected>Tất cả</option>
                                    @foreach($publishYear as $item)
                                        <option value="{{$item->year}}" {{$item->year != session('time') ?:'selected'}}> {{ $item->year }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <button class="btn-submit" type="submit" value="Tìm kiếm">Duyệt</button>
                        </td>

                    </tr>
                </table>
            </form>

            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    @if(isset($comics) && count($comics) > 0)
                        <ul class="list-stories grid-6">
                            @each('include.item-comic', $comics, 'comic')
                        </ul>
                    @else
                        <div class="warning-list box">Xin lỗi, không tìm thấy kết quả nào!</div>
                    @endif
                </div>
            </div>

            @includeIf('include.pageinate', compact('comics'))
        </div>
    </section>
@endsection



