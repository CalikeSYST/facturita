<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.index');
    }

    public function send(Request $request)
    {
        $validated = $request->validate(
            [
                'to' => ['required', 'email'],
                'cc' => ['email', 'nullable'],
                'bcc' => ['nullable', 'email'],
                'subject' => ['required', 'string', 'max:225'],
                'message' => ['required', 'string', 'max:10000'],
            ]
        );

        try {
            $mail = Mail::to($validated['to']);
            if (!empty($validated['cc'])) {
                $mail->cc($validated['cc']);
            }
            if (!empty($validated['bcc'])) {
                $mail->cc($validated['bcc']);
            }

            $mail->send(new GeneralEmail(
                $validated['subject'],
                $validated['message'],
            ));

            return redirect()->route('correo')->with('sucess', 'correo enviado correctamente');
        } catch (\Exception $e) {
            report($e);

            return back()->withInput()->with('error', 'No se pudo enviar el correo, verifica la configuracion en el servidor');
        }
    }
}
