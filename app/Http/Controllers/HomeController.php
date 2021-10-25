<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome', 'blog', 'sendMail');
    }

    public function welcome()
    {
        $data['setting_web'] = setting('setting_web');
        $data['about_us']= setting('about_us');
        $data['category_gallery'] = setting('category_gallery')['items'];
        $data['galleries'] = Gallery::all();
        return view('welcome', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update_profile(Request $request)
    {
        $validate = $request->validate([
            'avatar'=>'mimes:png,jpg,jpeg|max:3070',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.auth()->user()->id,
            'phone' => 'required|numeric|digits_between:9,13',
            'address' => 'required'
        ]);

        if($request->hasFile('avatar')){
            $file_name = 'avatar-'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
            if(auth()->user()->avatar!='/admin/img/default-avatar.png'&&file_exists(auth()->user()->avatar)){
                unlink(auth()->user()->avatar);
            }
            $request->file('avatar')->move(public_path('images/avatars/'), $file_name);
            $validate['avatar'] = '/images/avatars/'.$file_name;
        }

        if(teacher())
            teacher()->update($request->only('email', 'phone', 'address'));
        else if(student())
            student()->update($request->only('email', 'phone', 'address'));

        auth()->user()->update($validate);
        return back()->with('success','Profile berhasil diubah');
    }

    public function update_password(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required|password',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        auth()->user()->update($validate);
        return back()->with('success','Password berhasil diubah');
    }

    public function set_blogger(Request $request)
    {
        $blogger = $request->is_blogger;
        if(student()){
            student()->update(['is_blogger'=>$blogger]);
        }else{
            teacher()->update(['is_blogger'=>$blogger]);
        }

        $message = $blogger==1?'Berhasil mengaktifkan mode blogger':'Berhasil menonaktifkan mode blogger';
        session()->flash('success', $message);
    }

    public function set_about_me(Request $request)
    {
        $validate = $request->validate(['about'=>'required|max:150']);
        auth()->user()->update($validate);
        return back()->with('success', 'Tentang Saya berhasil diperbarui');
    }

    public function blog($category='', $blog='')
    {
        $search = request()->get('search');
        $blogs = Blog::latest()->where('status', 'accepted');
        if($search){
            $blogs = $blogs->where(function($q) use ($search){
                $q->where('title', 'LIKE', '%'.$search.'%')
                  ->orWhere('content', 'LIKE', '%'.$search.'%')
                  ->orWhereHas('category', function($q) use ($search){
                      $q->where('name', 'LIKE', '%'.$search.'%');
                  })
                  ->orWhereHas('blogger', function($q) use ($search){
                    $q->where('name', 'LIKE', '%'.$search.'%');
                });
            });
        }
        $mCategory = Category::where('slug',$category)->first();
        if(!is_null($mCategory)){
            $blogs = $blogs->where('category_id', $mCategory->id);
            $mBlog = Blog::where('slug',$blog)->first();
            if(!is_null($mBlog)){
                $blog = $mBlog;
                views($blog)->cooldown(10)->record();
                return view('show-blog', compact('blog'));
            }else{
                $blogs = $blogs->get();
            }
        }else $blogs = $blogs->get();
        return view('blogs', compact('blogs'));
    }

    function sendMail(Request $request){

        $subject = $request->input('subject');
        $name = $request->input('name');
        $emailAddress = $request->input('email');
        $message = $request->input('message');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Pengaturan Server
           // $mail->SMTPDebug = 2;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = env('MAIL_HOST');                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = env('MAIL_USERNAME');               // SMTP username
            $mail->Password = env('MAIL_PASSWORD');               // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');           // Enable TLS encryption, `ssl` also accepted
            $mail->Port = env('MAIL_PORT');                       // TCP port to connect to

            // Siapa yang mengirim email
            $mail->setFrom($emailAddress, $name);

            $setting_web = setting('setting_web');
            // Siapa yang akan menerima email
            $mail->addAddress($setting_web['email'], $setting_web['website_name']); // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $name);

            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();

            return redirect('contact')->with('success', 'Terima kasih, kami sudah menerima email anda.');
        } catch (Exception $e) {
            return redirect('contact')->with('failed', 'Mailer Error: '.$mail->ErrorInfo);
        }

    }

}
