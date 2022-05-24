@extends('well_pedia.admin.layout.basic_layout')
@section('content')
@include('well_pedia.admin.layout.after_login.navbar')
<main>
    <section>
        <div class="section_container container_left_helper container_right_helper">
            <div class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="text_primary">
                        管理ユーザー編集
                    </h3>
                </div>
            </div>
            @if(Session::has('error-message'))
                <div class="alert alert-danger text-center">
                    <b>{{ Session::get('error-message') }}</b>
                </div>
            @endif
            <form action="{{ route('onAdminRegister') }}" method="post" class="">
                @csrf
                <div class="form_container  table-responsive  pb-1">
                    <table class="table form_table_td_sizer sizer_sm form_table">
                        <tbody>

                            <tr>
                                <td class="font-weight-bold text-nowrap width-20rem">
                                    管理ユーザー名 <span class="text_red ms-2"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" onchange="onChangeName(this)" style="{{ $errors->has('username') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="error font-15rem">{{ $errors->first('username') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap width-20rem">
                                    メールアドレス <span class="text_red ms-2"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" onchange="onChangeEmail(this)" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="error font-15rem">{{ $errors->first('email') }}</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold text-nowrap width-20rem">
                                    パスワード <span class="text_red ms-2"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="password" value="{{ old('password') }}" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                    </div>
                                    <div class="w-400" style="{{ $errors->has('password') ? 'color:#D9214E!important' : '' }}">パスワードは8〜12文字である必要があります。</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form_control_action text-center">
                    <button class="btn_dark btn_orange   border-0 btn_mt btn_mb_2">
                        登録する
                    </button>
                </div>
            </form>
        </div>
    </section>

</main>
<script>

    function onChangeName(e){
        // console.log("Name : ",  e.value);
    }

    function onChangeEmail(e){
        // console.log("Email : ", e.value);
    }

</script>
@include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
