<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\farmer;
use App\scientist;
use App\admin;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $req)
    {
        $forgot='abcd';
        $mail=$req->email;
        $farmer=farmer::where(['email'=>$mail])->get();
        $row = $farmer->count();
        if($row==1)
        {
            return $this->view('mail',['msg'=>$farmer[0]->password])->to($mail)->subject('MAD')->from('meetladani12@student.aau.in','Meet');
        }
        else{
            $scientist=scientist::where(['email'=>$mail])->get();
            $row = $scientist->count();
            if ($row==1) {
                return $this->view('mail',['msg'=>$scientist[0]->password])->to($mail)->subject('MAD')->from('meetladani12@student.aau.in','Meet');
            }
            else{
                $admin=admin::where(['email'=>$mail])->get();
                $row = $admin->count();
                if ($row==1) {
                    return $this->view('mail',['msg'=>$admin[0]->password])->to($mail)->subject('MAD')->from('meetladani12@student.aau.in','Meet');
                }
            }
        }
        
    }
}
