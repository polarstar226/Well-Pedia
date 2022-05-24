@extends('well_pedia.client.layout.client_layout')
@section('content')
    @include('well_pedia.client.layout.after.navbar')

    <main>
        <section>
            <div class="csv_content_wrapper">
                <div class="section_container container_left_helper container_right_helper">
                    <div class="section_title section_title_sub  title_padding">
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
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <h3 class="text_primary title_mb text_primary">
                        基本情報登録
                    </h3>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <form action="{{ route('onClientNewStaff') }}" method="post" class="">
                    @csrf
                    @if(Session::has('error-message'))
                        <div class="alert alert-danger text-center">
                            <b>{{ Session::get('error-message') }}</b>
                        </div>
                    @endif
                    <div class="form_container mb-2 table-responsive  pb-1 ">
                        <table class="table form_table">
                            <tbody>
                                {{--
                                <tr>
                                    <td class="font-weight-bold">
                                        企業名 <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        {{ $client->company_name }}
                                        <input type="hidden" name="company_name" value="{{ $client->company_name }}">
                                    </td>
                                </tr>
                                --}}
                                <tr>
                                    <td class="font-weight-bold">
                                        企業コード <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        {{ $client->company_code }}
                                        <input type="hidden" name="company_code" value="{{ $client->company_code }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        社員番号<span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="staff_number" value="{{ old('staff_number') }}" id="staff_number" style="{{ $errors->has('staff_number') ? 'border : 1px solid #D9214E!important' : '' }}">
                                        </div>
                                        <div class="w-400" style="{{ $errors->has('deploy') ? 'color:#D9214E!important' : '' }}">社員番号は8桁である必要があります。</div>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="font-weight-bold">
                                        電話番号

                                        <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="phone_number">
                                        </div>
                                        @if($errors->has('phone_number'))
                                            <div class="alert alert-danger">
                                                <b>{{ $errors->first('phone_number') }}</b>
                                            </div>
                                        @endif
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td class="font-weight-bold">
                                        部署
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="deploy" value="{{ old('deploy') }}" id="deploy" style="{{ $errors->has('deploy') ? 'border : 1px solid #D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('deploy'))
                                            <span class="error">{{ $errors->first('deploy') }}</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">
                                        氏名
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" placeholder="姓" class="form-control" name="first_name" value="{{ old('first_name') }}" id="first_name" style="{{ $errors->has('first_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                                    @if($errors->has('first_name'))
                                                        <span class="error">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" placeholder="名" class="form-control" name="last_name" value="{{ old('last_name') }}" id="last_name" style="{{ $errors->has('last_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                                    @if($errors->has('last_name'))
                                                        <span class="error">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">
                                        性別
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" id="myForm">
                                            <div
                                                class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" checked="" name="gender" id="form_checkbox1" value="1">
                                                <label for="form_checkbox1" class="ms-2">男</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="gender" id="form_checkbox2" value="0">
                                                <label for="form_checkbox2" class="ms-2">女</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        生年月日
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-4">
                                                <div class="form-group position-relative">
                                                    <select name="birth_year" id="birth_year" class="form-control" onclick="changeYear()">

                                                    </select>
                                                    <svg class="select_icon position-absolute"
                                                        style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                        xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                        viewBox="0 0 8.781 6.12">
                                                        <path id="Path_137" data-name="Path 137"
                                                            d="M7219.936,610.665l4.155,5,3.845-5"
                                                            transform="translate(-7219.551 -610.345)" fill="none"
                                                            stroke="#0d0101" stroke-width="1"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col-4">


                                                <div class="form-group position-relative">
                                                    <select name="birth_month" id="birth_month" class="form-control" onclick="changeMonth()">
                                                        <option value="年">月</option>
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
                                                            stroke="#0d0101" stroke-width="1"></path>
                                                    </svg>
                                                </div>


                                            </div>

                                            <div class="col-4">
                                                <div class="form-group position-relative">
                                                    <select name="birth_day" id="birth_day" class="form-control">
                                                        <option value="年">日</option>
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
                                                            stroke="#0d0101" stroke-width="1"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="email"  style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important' : '' }}">
                                        </div>
                                        <div class="w-400" style="{{ $errors->has('password') ? 'color:#D9214E!important' : '' }}">パスワードは8〜12文字である必要があります。</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form_control_action text-center" type="submit">
                        <button class="btn_dark btn_orange btn_mt border-0">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb  title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class=" text_primary">
                            健康ステータス情報登録
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
                                            <input type="text" class="table_input_control"> cm
                                        </td>

                                        <td>
                                            身長
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>
                                        <td>
                                            身長
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>

                                        <td>
                                            身長
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            体重
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> Kg
                                        </td>

                                        <td>
                                            体重
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> Kg
                                        </td>
                                        <td>
                                            体重
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> Kg
                                        </td>

                                        <td>
                                            体重
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> Kg
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            BMI
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> kg/m2
                                        </td>

                                        <td>
                                            BMI
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> kg/m2
                                        </td>
                                        <td>
                                            BMI
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> kg/m2
                                        </td>

                                        <td>
                                            BMI
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> kg/m2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            腹囲（実測）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>

                                        <td>
                                            腹囲（実測）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>
                                        <td>
                                            腹囲（実測）
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>

                                        <td>
                                            腹囲（実測）
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control"> cm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            視力（左）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>

                                        <td>
                                            視力（左）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>
                                        <td>
                                            視力（左）
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>

                                        <td>
                                            視力（左）
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>

                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>

                                        <td>
                                            視力（右）
                                        </td>

                                        <td>
                                            <input type="text" class="table_input_control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form_control_action text-center" type="submit">
                            <button class="btn_dark btn_orange btn_mt border-0">
                                更新する
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>

    @include('well_pedia.client.layout.after.footer')
    <script type="text/javascript">


        $(document).ready(function() {
            var d = new Date();

            var date = d.getDate();
            var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
            var year = d.getFullYear();

            var html_year = "";
            var html_month = "";
            var html_day = "";

            for (var i = parseInt(year); i > 1960; i--) {
                html_year += "<option value='" + i + "'>" + i + "</option>";
            }

            $('#birth_year').html(html_year);

            for (var i = 1; i <= 12; i++) {
                if (i == month) {
                    html_month += "<option value='" + i + "'selected>" + (i < 10 ? "0" + i : i) + "</option>";
                } else {
                    html_month += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
                }
            }
            $('#birth_month').html(html_month);

            var days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (year % 4 == 0) {
                days[1] = 29;
            }

            for (var i = 1; i <= days[month - 1]; i++) {
                if (i == date) {
                    html_day += "<option value='" + i + "'selected>" + (i < 10 ? "0" + i : i) + "</option>";
                } else {
                    html_day += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
                }
            }
            $('#birth_day').html(html_day);

        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var miss = 0;
        function changeYear() {
            miss = $('#birth_year').val();
        }

        function changeMonth() {
            var d = new Date();

            var days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (miss % 4 == 0) {
                days[1] = 29;
            }
            var html_day = "";
            $('#birth_day').html('');
            for (var i = 1; i <= days[$('#birth_month').val() - 1]; i++) {
                html_day += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
            }
            $('#birth_day').html(html_day);
        }
    </script>
@endsection('content')
