<?php

namespace App\Console\Commands;

use App\Models\UserSurvey;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails for survey users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userSurveys = UserSurvey
            ::where('is_mailed', '=', UserSurvey::NOT_MAILED)
            ->with('user')
            ->with('survey')
            ->get();

        $sent = 0;
        $notSent = 0;

        foreach($userSurveys as $userSurvey)
        {
            $mailed = Mail::send('mails.notification', compact('userSurvey'), function(Message $m) use ($userSurvey) {
                $m->to($userSurvey->user->email, $userSurvey->user->fullName)->subject('New survey');
            });
            if($mailed)
            {
                $userSurvey->is_mailed = UserSurvey::MAILED;
                $userSurvey->save();
                $sent++;
            } else {
                $notSent++;
            }
        }

        $this->info('Sent '.$sent.' emails. Errors - '.$notSent);
    }
}
