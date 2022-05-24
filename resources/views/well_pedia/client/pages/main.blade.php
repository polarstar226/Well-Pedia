@extends('well_pedia.client.layout.client_layout')
@section('content')
    @include('well_pedia.client.layout.after.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>
                            検索条件
                        </h3>
                    </div>
                </div>

                <div class="section_body">
                    <div class="form_container">
                        <div class="row gx-3 gy-4 mb-3">
                            <div class="col-md-6 col-lg-4">
                                <div class="col_wrapper">
                                    <div class="d-flex align-items-center">
                                        <button class="btn_light_3 me-3">
                                            条件1
                                        </button>
                                        <div class="form-group position-relative w-100 mb-0">
                                            <select name="" id="`" class="form-control w-100 h_40_sizer">
                                                <option value="年">選択してくだい</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <svg class="select_icon position-absolute"
                                                style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                viewBox="0 0 8.781 6.12">
                                                <path id="Path_137" data-name="Path 137"
                                                    d="M7219.936,610.665l4.155,5,3.845-5"
                                                    transform="translate(-7219.551 -610.345)" fill="none"
                                                    stroke="#0d0101" stroke-width="1" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="col_wrapper">
                                    <div class="d-flex align-items-center">
                                        <button class="btn_light_3 me-3">
                                            条件1
                                        </button>
                                        <div class="form-group position-relative w-100 mb-0">
                                            <select name="" id="`" class="form-control w-100 h_40_sizer">
                                                <option value="年">選択してくだい</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <svg class="select_icon position-absolute"
                                                style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                viewBox="0 0 8.781 6.12">
                                                <path id="Path_137" data-name="Path 137"
                                                    d="M7219.936,610.665l4.155,5,3.845-5"
                                                    transform="translate(-7219.551 -610.345)" fill="none"
                                                    stroke="#0d0101" stroke-width="1" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="col_wrapper">
                                    <div class="d-flex align-items-center">
                                        <button class="btn_light_3 me-3">
                                            条件1
                                        </button>
                                        <div class="form-group position-relative w-100 mb-0">
                                            <select name="" id="`" class="form-control w-100 h_40_sizer">
                                                <option value="年">選択してくだい</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <svg class="select_icon position-absolute"
                                                style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                viewBox="0 0 8.781 6.12">
                                                <path id="Path_137" data-name="Path 137"
                                                    d="M7219.936,610.665l4.155,5,3.845-5"
                                                    transform="translate(-7219.551 -610.345)" fill="none"
                                                    stroke="#0d0101" stroke-width="1" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-wrap flex-sm-nowrap align-items-center">
                                    <div class="form-group w-100 mb-3 mb-sm-0">
                                        <input type="text" class="form-control w-100 h_40_sizer">
                                    </div>

                                    <button class="btn_be_action client_action_light sm_size ms-0 ms-sm-3">
                                        企業ロゴ
                                    </button>
                                    <button class="btn_be_action client_action_primary sm_size ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.999" height="18.002"
                                            viewBox="0 0 17.999 18.002">
                                            <path id="Icon_awesome-search" data-name="Icon awesome-search"
                                                d="M17.754,15.564l-3.505-3.505a.843.843,0,0,0-.6-.246h-.573a7.309,7.309,0,1,0-1.266,1.266v.573a.843.843,0,0,0,.246.6l3.505,3.505a.84.84,0,0,0,1.192,0l.995-.995a.848.848,0,0,0,0-1.2ZM7.313,11.813a4.5,4.5,0,1,1,4.5-4.5A4.5,4.5,0,0,1,7.313,11.813Z"
                                                fill="#fff" />
                                        </svg> 検索
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="csv_content_wrapper">
                <div class="section_container container_left_helper container_right_helper">
                    <div class="section_title section_title_sub  title_padding ">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">
                                CSVインポート
                            </h3>
                        </div>
                    </div>
                    <div class="section_body">
                        <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                            <h5 class="default_16 family_yugothib">
                                CSVファイル
                            </h5>
                            <div class="uploader">
                                <button class="csv_uploader_btn">
                                    <label for="csv_input_upload" class="w-100 h-100">ファイルを選択</label>
                                </button>
                                <input onchange="csvUploaderFunc(this)" class="d-none" type="file"
                                    name="csv_input_upload" accept=".csv" id="csv_input_upload">
                            </div>
                            <h5 class="csv_uploader_output">
                                Sample.csv（ファイル名）
                            </h5>
                            <script>
                                function csvUploaderFunc(val) {
                                    document.querySelector('.csv_uploader_output').innerHTML = val.value;
                                }
                            </script>
                        </div>
                        <div class="csv_content_wrapper">
                            <div class="content_title">
                                <h3 class="size_2 mb-0">
                                    CSVデータを指定したカテゴリーにインポートまたは上書きします。
                                </h3>
                            </div>
                            <div class="content_body">
                                <ul class="list-unstyled">
                                    <li>
                                        ・CSV形式のファイル（カンマ区切りデータ）をエントリーと、エントリーのカスタムフィールドに変換してインポートします。
                                    </li>
                                    <li>
                                        ・CSVファイルに、カスタムフィールドの情報のみが含まれる場合は、エントリー情報は自動で作成されます。
                                    </li>
                                    <li>
                                        ・CSVにidをしているすことで既存のエントリーに上書きすることができます。
                                    </li>
                                </ul>
                            </div>
                            <div class="content_footer">
                                <button class="btn_primary min_sizer">
                                    インポートを実行する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_padding ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">
                            スタッフ登録情報一覧
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <div class="staff_list_table_wrapper">
                        <div class="table_header_wrapper">
                            <div class="row gy-3 gy-lg-0">
                                <div class="col-lg-6">
                                    <div class="col_wrapper">
                                        <div class="pagination_wrapper form_container d-flex flex-wrap flex-sm-nowrap  align-items-center">
                                            <button class="btn_be_action mb-3 mb-sm-0 text-nowrap action_orange mr_3" onclick="toEdit()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16">
                                                    <g id="Group_196" data-name="Group 196"
                                                        transform="translate(-191 -369)">
                                                        <circle id="Ellipse_7" data-name="Ellipse 7" cx="8" cy="8" r="8"
                                                            transform="translate(191 369)" fill="#fff" />
                                                        <path id="Icon_awesome-plus" data-name="Icon awesome-plus"
                                                            d="M7.429,5.393H4.857V2.821a.571.571,0,0,0-.571-.571H3.714a.571.571,0,0,0-.571.571V5.393H.571A.571.571,0,0,0,0,5.964v.571a.571.571,0,0,0,.571.571H3.143V9.679a.571.571,0,0,0,.571.571h.571a.571.571,0,0,0,.571-.571V7.107H7.429A.571.571,0,0,0,8,6.536V5.964A.571.571,0,0,0,7.429,5.393Z"
                                                            transform="translate(195 370.75)" fill="#ff771e" />
                                                    </g>
                                                </svg>
                                                登録
                                            </button>
                                           {{--  <h5
                                                class="default_16 text-nowrap mb-3 mb-sm-0 font-weight-bold yugothibu me-4">
                                                選択行の
                                            </h5>

                                            <div class="form-group position-relative w-100 mb-3 mb-sm-0">
                                                <select name="" id="`" class="form-control w-100 h_40_sizer">
                                                    <option value="年">選択してくだい</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                <svg class="select_icon position-absolute"
                                                    style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                    xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                    viewBox="0 0 8.781 6.12">
                                                    <path id="Path_137" data-name="Path 137"
                                                        d="M7219.936,610.665l4.155,5,3.845-5"
                                                        transform="translate(-7219.551 -610.345)" fill="none"
                                                        stroke="#0d0101" stroke-width="1" />
                                                </svg>
                                            </div> --}}

                                            <button class="btn_be_action action_primary mb-3 mb-sm-0 text-nowrap ml_6" id="onDeleteChecked">
                                                削除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col_wrapper">
                                        <div class="pagination_wrapper">
                                            {!! $staffs->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table_body_wrapper">
                            <div class="table-responsive">
                                <table class="table staff_table">
                                    <thead>
                                        <tr class="rows_1">
                                            {{-- <th rowspan="2">番号</th> --}}
                                            <th rowspan="2">
                                                <input type="checkbox" name="" id="selectAll">
                                            </th>
                                            <th rowspan="2">
                                                ポイント
                                            </th>
                                            <th colspan="2">
                                                スタッフ情報
                                            </th>
                                            <th rowspan="2">
                                                登録状態
                                            </th>
                                            <th colspan="2">
                                                所属
                                            </th>
                                            <th rowspan="2">
                                                最終ログイン
                                            </th>
                                        </tr>
                                        <tr class="rows_2">
                                            <th>
                                                社員番号
                                            </th>
                                            <th>
                                                名前
                                            </th>
                                            <th>
                                                社名
                                            </th>
                                            <th>
                                                部署
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staffs as $key => $data)
                                        <tr>
                                            {{-- <td>{{ ++$key }}</td> --}}
                                            <td>
                                                <input type="checkbox" id="{{ $data->id }}">
                                            </td>
                                            <td>
                                                {{ $data->point }}
                                            </td>
                                            <td>
                                                {{ $data->staff_number }}
                                            </td>
                                            <td>
                                                <a href='{{ route('toClientStaffInfo', 'id='.$data->id) }} '>{{ $data->first_name . ' ' . $data->last_name }}</a>
                                            </td>
                                            <td>
                                                未完了
                                            </td>
                                            <td>
                                                {{ $data->company_name }}
                                            </td>
                                            <td>
                                                {{ $data->deploy }}
                                            </td>
                                            <td class="date_col">
                                                {{ $data->final_login_date }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="pagination_wrapper mb_page_foot">
                                {!! $staffs->links() !!}
                            </div>
                        </div>
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

        $(document).ready(function(){

        })

        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });

        $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });

        $('#onDeleteChecked').click(function(){
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            var items = $("input[type=checkbox]:checked");
                            var ids = [];
                            var cnt = 0;
                            for(var i = 0; i < items.length; i++){
                                if(items[i].id != 'selectAll'){
                                    ids[cnt] = items[i].id;
                                    cnt++;
                                }
                            }
                            $.ajax({
                                type : 'POST',
                                url : "{{ route('onDeleteCheckedStaff') }}",
                                data : {
                                    ids : ids
                                },
                                success:function(){
                                    for(var j = 0; j < cnt; j++){
                                        $("input[type=checkbox]:checked").parents('tr').hide();
                                    }
                                    toastr.success("削除成功!");
                                }
                            })
                        }
                    },
                    キャンセル: function () {
                    },
                }
            });
        });

        function toEdit(){
            window.location.href = "{{ route('toClientNew') }}"
        }
    </script>
@endsection('content')

