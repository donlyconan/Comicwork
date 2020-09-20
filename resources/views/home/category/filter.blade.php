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
                                <select id="sl_tags" name="category is-warning">
                                    @foreach($categories as $item)
                                        <option value="{{$item->label}}">{{$item->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select id="sl_status" name="status">
                                    <option value="0">Đang cập nhật</option>
                                    <option value="1">Đã hoàn thành</option>
                                    <option value="-1">Tất cả</option>
                                </select>
                            </div>
                        </td>
                        <td style="margin: 0px;">
                            <div class="select is-warning">
                                <select id="sl_countries" name="country">
                                    @foreach($countries as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select id="sl_sort" name="sort">
                                    <option value="0">Thời gian cập nhật</option>
                                    <option value="1">Thời gian đăng</option>
                                    <option value="2">Năm xuất bản</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select id="sl_time" name="time">
                                    @foreach($publishYear as $item)
                                        <option value="2019">
                                            {{ $item->year }}
                                        </option>
                                    @endforeach
                                    <option value="-1">Tất cả</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <button class="top-buttons" type="submit" value="Tìm kiếm">Duyệt</button>
                        </td>

                    </tr>
                </table>
            </form>

            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    @if(isset($comics) && count($comics) > 0)
                        <ul class="list-stories grid-6">
                            @each('include.itemview', $comics, 'comic')
                        </ul>
                    @else
                        <div class="warning-list box">Xin lỗi, không tìm thấy kết quả nào!</div>
                    @endif
                </div>
            </div>
            <div class="bottom">
                <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
                    {!! $comics->links() !!}
                </nav>
            </div>
        </div>
    </section>
@endsection

