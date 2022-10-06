<?php

namespace BambooCoding\MailLog\Events;

use BambooCoding\MailLog\app\Models\EmailLog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\Mime\Email;
use Illuminate\Mail\Events\MessageSending;

class MailLog
{
    /**
     * Handle the actual logging.
     *
     * @param MessageSending $event
     * @return void
     */
    public function handle(MessageSending $event): void
    {
        $message = $event->message;

        $data = [
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'from' => $this->formatAddressField($message, 'From'),
            'to' => $this->formatAddressField($message, 'To'),
            'cc' => $this->formatAddressField($message, 'Cc'),
            'bcc' => $this->formatAddressField($message, 'Bcc'),
            'subject' => $message->getSubject(),
            'body' => $message->getBody()->bodyToString(),
            'headers' => $message->getHeaders()->toString()
        ];

        EmailLog::create($data);
    }

    /**
     * Format address strings for sender, to, cc, bcc.
     *
     * @param Email $message
     * @param string $field
     * @return null|string
     */
    function formatAddressField(Email $message, string $field): ?string
    {
        $headers = $message->getHeaders();

        return $headers->get($field)?->getBodyAsString();
    }

}
