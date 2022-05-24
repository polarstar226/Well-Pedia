<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\VideoHistory;
use App\Client;
use App\Staff;
use DateTime;

class ClientController extends Controller
{
    // Validation Message
    public $message = [
        'company_name.required'         => '会社名が必要です。',
        'company_name.max'              => '会社名は:max文字未満である必要があります。',

        'company_code.required'         => '企業コードが必要です。',
        'company_code.digits'           => '企業コードは:digits桁である必要があります。',

        'phone_number.required'         => '電話番号が必要です。',
        'phone_number.digits_between'   => '電話番号は10桁または11桁である必要があります。',

        'location.required'             =>  '所在地が必要です。',
        'location.max'                  =>  '所在地は50文字未満である必要があります。',

        'deploy.required'               => '部署が必要です。',
        'deploy.max'                    => '社員番号は8桁である必要があります。',

        'charger_1_first.required'      => '姓が必要です。',
        'charger_1_first.alpha'         => '姓は文字である必要があります。',
        'charger_1_first.max'           => '姓は:max文字未満である必要があります。',
        'charger_1_last.alpha'          => '名は文字である必要があります',
        'charger_1_last.required'       => '名が必要です。',
        'charger_1_last.max'            => '名は:max文字未満である必要があります。',

        'charger_2_first.required'      => '姓が必要です。',
        'charger_2_first.alpha'         => '姓は文字である必要があります。',
        'charger_2_first.max'           => '姓は:max文字未満である必要があります。',
        'charger_2_last.alpha'          => '名は文字である必要があります',
        'charger_2_last.required'       => '名が必要です。',
        'charger_2_last.max'            => '名は:max文字未満である必要があります。',

        'charger_3_first.required'      => '姓が必要です。',
        'charger_3_first.alpha'         => '姓は文字である必要があります。',
        'charger_3_first.max'           => '姓は:max文字未満である必要があります。',
        'charger_3_last.alpha'          => '名は文字である必要があります',
        'charger_3_last.required'       => '名が必要です。',
        'charger_3_last.max'            => '名は:max文字未満である必要があります。',

        'email.required'                => 'メールが必要です。',
        'email.max'                     => 'メールは:max文字未満である必要があります。',

        'password.required'             => 'パスワードが必要。',
        'password.alpha_num'            => 'パスワードは、数字または英字、あるいはその両方の合計である必要があります。',
        'password.min'                  => 'パスワードは8〜12文字である必要があります',
        'password.max'                  => 'パスワードは8〜12文字である必要があります',

        'filename.required'             => '画像をアップロードする必要があります。',
        'logo_url.required'             => '画像をアップロードする必要があります。',

        'first_name.required'           => '姓が必要です。',
        'first_name.alpha'              => '姓は文字である必要があります。',
        'first_name.max'                => '姓は:max文字未満である必要があります。',

        'last_name.alpha'               => '名は文字である必要があります',
        'last_name.required'            => '名が必要です。',
        'last_name.max'                 => '名は:max文字未満である必要があります。',
    ];
////////////////////////////////////////////////////////////////////////// ADMIN SIDE //////////////////////////////////////////////////////////////////////////
/*
Scene 8: Enter Nick Wilde
[Judy puts on her meter maid outfit, adjusts her mirror, puts on her seatbelt, turns on the car, and hits the pedal.
The car moves as slow as possible. She goes around giving tickets to cars that have expired parking spots.
Later, her ears pick up a beeping sound.
A parking meter has expired. She grins, goes to the car, types up a ticket and puts it on the windshield.
She hears another beep. She puts another ticket on another car.
Her ears pick up another beep and puts another ticket on another car. She approaches a tall giraffe car.
She grins, goes to her cart, leaps off of it onto a street sign, which she leaps from, lands on the car and places a ticket on its windshield.
She hears parking meters expiring and puts tickets on cars as quick as possible.
A mouse goes to his car with a parking ticket on it; it drives away and the mouse panicked goes after it.
The parking meters go off one by one, Judy continues giving tickets to car and the number on her pad increases as the tickets are being printed out.
Later, Judy looks at the clock which points to 12:00 and looks at the ticket pad which shows 200.]
Judy Hopps: Boom! Two-hundred tickets before noon. [Judy's own meter expires] Ugh... [prints out a ticket and gives it to her own vehicle] two-o-one.
[Then, she hears a car horn and sees Nick Wilde, a fox, dodging a Fresh Doe truck being driven by a ram named Doug.]
Doug: Hey, watch where you're goin', fox! [drives away]
*/
//// Admin - Customize Pagination with SQL Query
    public function paginateArray($data, $perPage = 10){
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }

//// Admin - Client List
    public function toAdminClient(){
        if(isset($_SESSION['isAuthentication'])){
            $result = Client::paginate(8);
            $page_title = "クライアント管理";
            return view('well_pedia.admin.client.list', [
                        'clients' => $result,
                        'page_title' => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')
                    ->with('error-message', "最初にログインする必要があります。");
        }

    }

//// Admin - Client Data Register
    public function toAdminClientRegister(){
        $page_title = "クライアントー登録";

        if(isset($_SESSION['isAuthentication'])){
            return view('well_pedia.admin.client.add',['page_title' => $page_title]);
        } else {
            return redirect()->route('toAdminLogin')
                    ->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function onFileUpload(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) {

            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file');// Error response

        }else{
           if($request->file('file')) {

                $file = $request->file('file');
                $real_filename = $file->getClientOriginalName();
                $filename = time().'_'.$file->getClientOriginalName();

                // File extension
                $extension = $file->getClientOriginalExtension();

                // File upload location
                $location = 'upload/client/';

                // Upload file
                $file->move($location,$filename);

                // File path
                $filepath = url('upload/client/'.$filename);

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['real_filename'] = $real_filename;
                $data['filename'] = $filename;
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
           }else{
               // Response
               $data['success'] = 2;
               $data['message'] = 'File not uploaded.';
           }
        }

        return response()->json($data);
    }

    public function onAdminClientRegister(Request $request){
         $valid = $request->validate([
                'company_name'      => 'required|max:50',
                'company_code'      => 'required|digits:8',
                'phone_number'      => 'required|digits_between:10,11',
                'location'          => 'max:50',
                'charger_1_first'   => 'max:20',
                'charger_1_last'    => 'max:20',
                'charger_2_first'   => 'max:20',
                'charger_2_last'    => 'max:20',
                'charger_3_first'   => 'max:20',
                'charger_3_last'    => 'max:20',
                'email'             => 'required|email|max:100',
                'password'          => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $verify = Client::where('company_code', $valid['company_code'])->first();

        if(!$verify){

            Client::create([
                'company_name'      =>  $valid['company_name'],
                'company_code'      =>  $valid['company_code'],
                'phone_number'      =>  $valid['phone_number'],
                'location'          =>  ($valid['location'] == null ? "" : $valid['location']),
                'charger_1_first'   =>  ($valid['charger_1_first'] == null ? "" : $valid['charger_1_first']),
                'charger_1_last'    =>  ($valid['charger_1_last'] == null ? "" : $valid['charger_1_last']),
                'charger_2_first'   =>  ($valid['charger_2_first'] == null ? "" : $valid['charger_2_first']),
                'charger_2_last'    =>  ($valid['charger_2_last'] == null ? "" : $valid['charger_2_last']),
                'charger_3_first'   =>  $valid['charger_3_first'] == null ? "" : $valid['charger_3_first'],
                'charger_3_last'    =>  $valid['charger_3_last'] == null ? "" : $valid['charger_3_last'],
                'email'             =>  $valid['email'],
                'password'          =>  $valid['password'],
                'filename'          =>  $request->filename == null ? '' : $request->filename,
                'logo_url'          =>  $request->logo_url == null ? '' : $request->logo_url,
            ]);
            return redirect()->route('toAdminClient');
        } else {
            return redirect()->route('toAdminClientRegister')
                    ->with('error-message', '同じ会社コードを持つものがあります。 再試行。');
        }
    }

//// Admin - Client Date View
    public function toAdminClientView(Request $request){
        $page_title = "クライアント";
        if(isset($_SESSION['isAuthentication'])){
            $result = Client::where('id', $request->id)->first();
            return view('well_pedia.admin.client.view', [
                        'client' => $result,
                        'page_title' => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')
                    ->with('error-message', "最初にログインする必要があります。");
        }
    }

//// Admin - Client Data Edit
    public function toAdminClientEdit(Request $request){
        $page_title = "企業情報編集";
        if(isset($_SESSION['isAuthentication'])){
            $result = Client::where('id', $request->id)->first();
            return view('well_pedia.admin.client.edit', [
                        'client' => $result,
                        'page_title' => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')
                    ->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function onAdminClientEdit(Request $request){
        $valid = $request->validate([
                    'company_name'      => 'required|max:50',
                    'company_code'      => 'required|digits:8',
                    'phone_number'      => 'required|digits:10',
                    'location'          => 'required|max:50',
                    'charger_1_first'   => 'required|alpha|max:20',
                    'charger_1_last'    => 'required|alpha|max:20',
                    'charger_2_first'   => 'required|alpha|max:20',
                    'charger_2_last'    => 'required|alpha|max:20',
                    'charger_3_first'   => 'required|alpha|max:20',
                    'charger_3_last'    => 'required|alpha|max:20',
                    'email'             => 'required|email|max:100',
                    'password'          => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $verify = Client::where('company_code', $valid['company_code'])
                        ->first();

        if($verify){
            $result = Client::where('id', $request->id)
                        ->update([
                            'company_name'      =>  $valid['company_name'],
                            'company_code'      =>  $valid['company_code'],
                            'phone_number'      =>  $valid['phone_number'],
                            'location'          =>  $valid['location'],
                            'charger_1_first'   =>  $valid['charger_1_first'],
                            'charger_1_last'    =>  $valid['charger_1_last'],
                            'charger_2_first'   =>  $valid['charger_2_first'],
                            'charger_2_last'    =>  $valid['charger_2_last'],
                            'charger_3_first'   =>  $valid['charger_3_first'],
                            'charger_3_last'    =>  $valid['charger_3_last'],
                            'email'             =>  $valid['email'],
                            'password'          =>  $valid['password'],
                            'filename'          =>  $request->filename == null ? '' : $request->filename,
                            'logo_url'          =>  $request->logo_url == null ? '' : $request->logo_url,
                        ]);
            if($result){
                return redirect()->route('toAdminClient');
            }
        } else {
            return redirect()->route('toAdminClient')
                    ->with('error-message', '同じ会社コードを持つものがあります。 再試行。');
        }

    }

//// Admin - Client Password Reset
    public function toAdminClientReset(Request $request){
        $page_title = "パスワードを再設定する";
        if(isset($_SESSION['isAuthentication'])){
            $result = Client::where('id', $request->id)->first();
            return view('well_pedia.admin.client.reset', [
                        'client' => $result,
                        'page_title' => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')
                    ->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function onAdminClientReset(Request $request){
        $valid = $request->validate([
                'password'      => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $result = Client::where('id', $request->id)
                        ->update($valid);
        if($result){
            return redirect()->route('toAdminClient');
        }
    }

//// Admin - Client Data Delete
    public function onDeleteClient(Request $request){
        $company_code = Client::where('id', $request->id)->first('company_code');
        Client::where('id', $request->id)->delete();
        Staff::where('company_code', $company_code['company_code'])->delete();
    }

    public function onDeleteCheckedClient(Request $request){
        for($i = 0; $i < count($request->ids); $i++){
            $company_code = Client::where('id', $request->ids[$i])->first('company_code');
            Client::where('id', $request->ids[$i])->delete();
            Staff::where('company_code', $company_code['company_code'])->delete();
        }
    }

////////////////////////////////////////////////////////////////////////// CLIENT SIDE //////////////////////////////////////////////////////////////////////////

    // The Function To Log out
    public function onClientLogout(){
        session_destroy();
        return redirect()->route('toClientLogin');
    }

    // The Login Page
    public function toClientLogin(){
        $page_title = "クライアント専用ページ";
        return view('well_pedia.client.pages.login', ['page_title' => $page_title]);
    }

    // The Login Page In Forgotten Password Case
    public function toLoginForgotten(){
        $page_title = "パスワード再設定";
        return view('well_pedia.client.pages.login_forget', ['page_title' => $page_title]);
    }

    // The First Page
    public function toClientMain(Request $request){
        $page_title = "スタッフ管理";
        if(isset($_SESSION['isClient'])){

            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $year = date("Y");
            $month = date("m");
            $current_month = $year . '-' . $month;
            $sql = "SELECT A.*,
                    (SELECT company_name FROM tbl_client WHERE company_code = A.company_code) as company_name,
                    (SELECT IFNULL(sum(point), 0) FROM tbl_video_history WHERE date LIKE '%". $current_month ."%' AND staff_number = A.id) as point
                    FROM tbl_staff as A WHERE company_code = " . $_SESSION['company_code'];
            $staffs = $this->paginateArray(DB::select($sql));
            return view('well_pedia.client.pages.main', [
                'page_title'    => $page_title,
                'company_code'  => $_SESSION['company_code'],
                'staffs'        => $staffs,
                'logo'          => $logo
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onDeleteCheckedStaff(Request $request){
        for($i = 0; $i < count($request->ids); $i++){
            Staff::where('id',  $request->ids[$i])
                ->delete();
            VideoHistory::where('staff_number', $request->ids[$i])
                ->delete();
        }
    }

    // Client - Staff Info
    public function toClientStaffInfo(Request $request){
        $page_title = "スタッフ閲覧";
        if(isset($_SESSION['isClient'])){
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $result = Staff::where('id', $request->id)->first();
            $videos = VideoHistory::where('staff_number', $request->id)->get();
            return view('well_pedia.client.pages.staff', [
                'company_name'  => $_SESSION['company_name'],
                'page_title'    => $page_title,
                'staff'         => $result,
                'logo'          => $logo,
                'company_code'  => $_SESSION['company_code'],
                'videos'        => $videos
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function toClientStaffEdit(Request $request){
        $page_title = "スタッフ編集";
        if(isset($_SESSION['isClient'])){
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            $result = Staff::where('id', $request->id)->first();
            $videos = VideoHistory::where('staff_number', $request->id)->get();
            return view('well_pedia.client.pages.staff_edit', [
                        'page_title'    => $page_title,
                        'company_code'  => $_SESSION['company_code'],
                        'logo'          => $logo,
                        'staff'         => $result,
                        'videos'        => $videos
                    ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onClientStaffEdit(Request $request){
        $valid = $request->validate([
                    'staff_number'      => 'required|digits:8',
                    'deploy'            => 'required|max:100',
                    'first_name'        => 'required|max:100',
                    'last_name'         => 'required|max:100',
                    'birth_year'        => 'required|max:4',
                    'gender'            => 'required|size:1',
                    'birth_month'       => 'required|max:4',
                    'birth_day'         => 'required|max:4',
                    'email'             => 'required|email|max:100',
        ]);
        $result = Staff::where('id', $request->id)
                ->update([
                    'staff_number'      => $valid['staff_number'],
                    'deploy'            => $valid['deploy'],
                    'first_name'        => $valid['first_name'],
                    'last_name'         => $valid['last_name'],
                    'gender'            => $valid['gender'],
                    'birth_year'        => $valid['birth_year'],
                    'birth_month'       => $valid['birth_month'],
                    'birth_day'         => $valid['birth_day'],
                    'email'             => $valid['email'],
                ]);

        if($result){
            return redirect()->route('toClientMain');
        }
    }

    // Client - Add New Staff
    public function toClientNew(){
        $page_title = '新規スタッフ登録';

        if(isset($_SESSION['isClient'])){

            $client = Client::where('company_code', $_SESSION['company_code'])->first();
            return view('well_pedia.client.pages.new', [
                'page_title'     => $page_title,
                'company_code'   => $_SESSION['company_code'],
                'logo'           => $client,
                'client'         => $client
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onClientNewStaff(Request $request){
        // return $request;
        $valid = $request->validate([
                'staff_number'      => 'required|digits:8',
                'deploy'            => 'max:100',
                'first_name'        => 'required|alpha|max:100',
                'last_name'         => 'required|alpha|max:100',
                'gender'            => 'required|size:1',
                'birth_year'        => 'required|max:4',
                'birth_month'       => 'required|max:4',
                'birth_day'         => 'required|max:4',
                'email'             => 'required|email|max:100',
                'password'          => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $time = new DateTime();
        $formattedTime = $time->format('Y/m/d H:i:s');

        $verify = Staff::where('company_code', $_SESSION['company_code'])
                        ->where('staff_number', $valid['staff_number'])
                        ->first();

        if(empty($verify)){
            $result = Staff::create([
                'company_code'      => $request->company_code,
                'staff_number'      => $valid['staff_number'],
                'deploy'            => $valid['deploy'],
                'first_name'        => $valid['first_name'],
                'last_name'         => $valid['last_name'],
                'gender'            => $valid['gender'],
                'birth_year'        => $valid['birth_year'],
                'birth_month'       => $valid['birth_month'],
                'birth_day'         => $valid['birth_day'],
                'email'             => $valid['email'],
                'password'          => $valid['password'],
                'final_login_date'  => $formattedTime,
            ]);

            if($result){
                return redirect()->route('toClientMain')->with('message', "success");
            }
        } else {
            return redirect()->route('toClientNew')->with('error-message', '会社には同じ従業員がいます。 再試行。');
        }

    }

    // Client - View Client Data
    public function toClientView(){
        $page_title = '企業情報閲覧';

        if(isset($_SESSION['isClient'])){
            $client = Client::where('company_code', $_SESSION['company_code'])->first();
            return view('well_pedia.client.pages.view', [
                        'company_name'  => $_SESSION['company_name'],
                        'page_title'    => $page_title,
                        'client'        => $client,
                        'logo'          => $client,
                        'company_code'  => $_SESSION['company_code']
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function toClientViewEdit(Request $request){
        $page_title = "企業情報編集";
        if(isset($_SESSION['isClient'])){

            $client = Client::where('company_code', $_SESSION['company_code'])->first();
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            return view('well_pedia.client.pages.view_edit', [
                'page_title'     => $page_title,
                'company_code'   => $_SESSION['company_code'],
                'logo'           => $logo,
                'client'         => $client,
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onClientViewEdit(Request $request){
        $valid = $request->validate([
                'phone_number'      => 'required|digits:10',
                'location'          => 'required|max:50',
                'charger_1_first'   => 'required|alpha|max:20',
                'charger_1_last'    => 'required|alpha|max:20',
                'charger_2_first'   => 'required|alpha|max:20',
                'charger_2_last'    => 'required|alpha|max:20',
                'charger_3_first'   => 'required|alpha|max:20',
                'charger_3_last'    => 'required|alpha|max:20',
                'email'             => 'required|email|max:100',
        ], $this->message);

        $result = Client::where('id', $request->id)
                ->update([
                    'phone_number'      =>  $valid['phone_number'],
                    'location'          =>  $valid['location'],
                    'charger_1_first'   =>  $valid['charger_1_first'],
                    'charger_1_last'    =>  $valid['charger_1_last'],
                    'charger_2_first'   =>  $valid['charger_2_first'],
                    'charger_2_last'    =>  $valid['charger_2_last'],
                    'charger_3_last'    =>  $valid['charger_3_last'],
                    'charger_3_first'   =>  $valid['charger_3_first'],
                    'charger_3_last'    =>  $valid['charger_3_last'],
                    'email'             =>  $valid['email'],
                    'filename'          =>  $request->filename == null ? '' : $request->filename,
                    'logo_url'          =>  $request->logo_url == null ? '' : $request->logo_url,
                ]);

        if($result){
            return redirect()->route('toClientView');
        }
    }

    //
    public function toClientResetPassword(Request $request){
        $page_title = 'パスワードを再設定する';

        if(isset($_SESSION['isClient'])){

            $client = Client::where('company_code', $_SESSION['company_code'])->first();
            return view('well_pedia.client.pages.reset', [
                'page_title'     => $page_title,
                'company_code'   => $_SESSION['company_code'],
                'logo'           => $client,
                'client'         => $client
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onClientResetPassword(Request $request){
        $valid = $request->validate([
                    'password'      => 'required|alpha_num|min:8|max:12',
                ]);

        $result = DB::table('tbl_client')
                    ->where('id', $request->id)
                    ->update([
                        'password'      => $valid['password'],
                    ]);

        if($result){
            return redirect()->route('toClientView');
        }

    }

    public function toClientStaffResetPassword(Request $request){
        // return $request;
        $page_title = 'パスワードを再設定する';

        if(isset($_SESSION['isClient'])){
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $staff = Staff::where('id', $request->id)->first();
            return view('well_pedia.client.pages.reset_staff', [
                    'page_title'    => $page_title,
                    'company_code'  => $_SESSION['company_code'],
                    'logo'          => $logo,
                    'staff'         => $staff
            ]);
        } else {
            return redirect()->route('toClientLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onClientStaffReset(Request $request){
        $valid = $request->validate([
            'password'      => 'required|alpha_num|min:8|max:12',
        ]);

        $result = DB::table('tbl_staff')
                    ->where('id', $request->id)
                    ->update([
                        'password'      => $valid['password'],
                    ]);

        return redirect()->route('toClientMain');
    }
}
