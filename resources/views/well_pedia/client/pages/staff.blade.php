@extends('well_pedia.client.layout.client_layout')
@section('content')
    @include('well_pedia.client.layout.after.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            基本情報編集
                        </h3>
                        <div class="form_control_action text-center">
                            <button class="btn_dark  shadow-0 border-0" onclick="toClientStaffEdit({{ $staff->id }})">
                                編集する
                            </button>
                        </div>
                    </div>
                </div>
                <form action="" method="post" class="">
                    <div class="form_container mb_lg table-responsive  pb-1">
                        <table class="table form_table">
                            <tbody>
                                {{-- <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業名
                                    </td>
                                    <td>
                                        {{ $company_name }}
                                    </td>
                                </tr> --}}

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード
                                    </td>
                                    <td>
                                        {{ $staff->company_code }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        社員番号
                                    </td>
                                    <td>
                                        {{ $staff->staff_number }}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        部署
                                    </td>
                                    <td>
                                        {{ $staff->deploy }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        氏名
                                    </td>
                                    <td>
                                        {{ $staff->first_name . ' ' .  $staff->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        性別
                                    </td>
                                    <td>
                                        {{ $staff->gender == 1 ? '男' : '女' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        生年月日
                                    </td>
                                    <td>
                                        {{ $staff->birth_year . '年 ' . $staff->birth_month . '月 ' . $staff->birth_day . '日'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                    </td>
                                    <td>
                                        {{ $staff->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            {{ $staff->password }}
                                            <a href="{{ route('toClientStaffResetPassword', 'id='.$staff->id) }}" class="text_f7 font_14 ms-1 ms-sm-5 sm_less reset-password">
                                                →パスワードを変更する
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            基本情報編集
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <div class="section_table_wrapper" style="background: transparent">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            身長
                                        </td>
                                        <td>
                                            cm
                                        </td>

                                        <td>
                                            身長
                                        </td>
                                        <td>
                                            cm
                                        </td>
                                        <td>
                                            身長
                                        </td>

                                        <td>
                                            cm
                                        </td>

                                        <td>
                                            身長
                                        </td>

                                        <td>
                                            cm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            体重
                                        </td>
                                        <td>
                                            Kg
                                        </td>

                                        <td>
                                            体重
                                        </td>
                                        <td>
                                            Kg
                                        </td>
                                        <td>
                                            体重
                                        </td>

                                        <td>
                                            Kg
                                        </td>

                                        <td>
                                            体重
                                        </td>

                                        <td>
                                            Kg
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            BMI
                                        </td>
                                        <td>
                                            kg/m2
                                        </td>

                                        <td>
                                            BMI
                                        </td>
                                        <td>
                                            kg/m2
                                        </td>
                                        <td>
                                            BMI
                                        </td>

                                        <td>
                                            kg/m2
                                        </td>

                                        <td>
                                            BMI
                                        </td>

                                        <td>
                                            kg/m2
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            腹囲（実測）
                                        </td>
                                        <td>
                                            cm
                                        </td>

                                        <td>
                                            腹囲（実測）
                                        </td>
                                        <td>
                                            cm
                                        </td>
                                        <td>
                                            腹囲（実測）
                                        </td>

                                        <td>
                                            cm
                                        </td>

                                        <td>
                                            腹囲（実測）
                                        </td>

                                        <td>
                                            cm
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            視力（左）
                                        </td>
                                        <td>
                                            2.0
                                        </td>

                                        <td>
                                            視力（左）
                                        </td>
                                        <td>
                                            2.0
                                        </td>
                                        <td>
                                            視力（左）
                                        </td>

                                        <td>
                                            2.0
                                        </td>

                                        <td>
                                            視力（左）
                                        </td>

                                        <td>
                                            2.0
                                        </td>
                                    </tr>




                                    <tr>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            2.0
                                        </td>

                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            2.0
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>

                                        <td>
                                            2.0
                                        </td>

                                        <td>
                                            視力（右）
                                        </td>

                                        <td>
                                            2.0
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form_control_action text-center">
                            <button class="btn_dark btn_mt shadow-0 border-0" onclick="toClientStaffEdit({{ $staff->id }})">
                                更新する
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="content_list_wrapper">
                    <h2 class="heading_title">
                        動画閲覧履歴
                    </h2>
                    <ul class="list-unstyled content_list">
                        @if(count($videos) <= 5)
                            @for($i = 0; $i < count($videos); $i++)
                                <li id="id{{ $videos[$i]->id }}">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="box">
                                            <h4>
                                                <b>{{ $videos[$i]->video_title }}</b>
                                            </h4>
                                            <div class="list_foot d-flex align-items-center">
                                                <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                <a href="#" class="text_f7">CATEGORY</a>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                ×削除する
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                        @endif
                        @if(count($videos) > 5)
                            @for($i = 0; $i < 5; $i++)
                                <li id="id{{ $videos[$i]->id }}">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="box">
                                            <h4>
                                                <b>{{ $videos[$i]->video_title }}</b>
                                            </h4>
                                            <div class="list_foot d-flex align-items-center">
                                                <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                <a href="#" class="text_f7">CATEGORY</a>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                ×削除する
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                            <div id="readme" class="collapse">
                                @for($i = 5; $i < count($videos); $i++)
                                    <li id="id{{ $videos[$i]->id }}">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                                            <div class="box">
                                                <h4>
                                                    <b>{{ $videos[$i]->video_title }}</b>
                                                </h4>
                                                <div class="list_foot d-flex align-items-center">
                                                    <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                    <a href="#" class="text_f7">CATEGORY</a>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf" onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                    ×削除する
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </div>
                        @endif
                    </ul>
                </div>
                @if(count($videos) > 5)
                    <div class="btn_action text-center">
                        <button class="btn_action_more btn_mt btn_mb" type="button" data-mdb-toggle="collapse" data-mdb-target="#readme">
                            READ MORE
                        </button>
                    </div>
                @endif
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper" style="margin-top: 50px">
                <div class="content_list_wrapper">
                    <h2 class="heading_title">
                        ポイント履歴
                    </h2>
                </div>

                <div class="section_body two_col_table_static_wrapper">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($videos as $key => $video)
                                <tr id="id{{ $video->id }}">
                                    <td>
                                        {{ $video->date }}
                                    </td>
                                    <td>
                                        {{ $video->point }} / 100
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('well_pedia.client.layout.after.footer')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toClientStaffEdit(id){
            window.location.href  =  "{{ route('toClientStaffEdit') }}?id=" + id;
        }

        function onDeleteVideoHistory(id){
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.ajax({
                                url: "{{ route('onDeleteVideoHistory') }}",
                                type: 'POST',
                                data: {
                                    id: id
                                },
                                success: function(result) {
                                    $("li[id='id" + id + "']").hide(true);
                                    $("tr[id='id" + id + "']").hide(true);
                                    toastr.success("削除成功!");
                                }
                            })
                        }
                    },
                    キャンセル: function () {
                    },
                }
            });
        }
    </script>
@endsection('content')
