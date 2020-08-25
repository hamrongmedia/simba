<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
class ContactemailController extends Controller
{
    public function index()
    {
        $email = DB::table('contactemail')->select('*')->get();
        return view('admin/pages/customer_contact/contact_email_index', compact('email'));
    }
    public function delete($id)
    {
       
        DB::table('contactemail')->where('id','=', $id)->delete();
        
        return redirect('hrm/contact/email');
    }
    public function edit($id)
    {
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('contactemail')->select('*')->where('id',$id)->get();
        
        
        return view('admin/pages/customer_contact/contact_email_edit')->with('getEmailById',$getData);
    }

    public function update(Request $request)
    {
        //Cap nhat 
        //Set timezone
       
    
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('contactemail')->where('id', $request->id)->update([
            'email' => $request->email, 
        ]);
        
        //Kiểm tra lệnh update để trả về một thông báo
       
        
        //Thực hiện chuyển trang
        return redirect('hrm/contact/email');
    } 
    public function create()
    {
        return view('admin/pages/customer_contact/contact_email_create');
    }
    public function store(Request $request)
    {
        //Lấy giá trị đã nhập
        $allRequest  = $request->all();
        $email = $allRequest['email'];
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'email' => $email,
        );
        
        //Insert vào bảng
        $insertData = DB::table('contactemail')->insert($dataInsertToDatabase);
        Session::put('message','Thêm Email thành công !');
        return redirect()->back();
    }
}
