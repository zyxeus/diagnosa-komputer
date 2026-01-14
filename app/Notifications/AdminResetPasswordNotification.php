<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends ResetPassword
{
    protected function resetUrl($notifiable)
    {
        return url(route('admin.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password Admin')
            ->line('Anda menerima email ini karena ada permintaan reset password admin.')
            ->action('Reset Password', $this->resetUrl($notifiable))
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.');
    }
}
