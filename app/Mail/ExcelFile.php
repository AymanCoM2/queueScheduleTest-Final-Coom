<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;


class ExcelFile extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Excel File',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'welcome',
        );
    }

    public function attachments(): array
    {
        $path  = "C:\\Users\\BAB AL SAFA\Downloads\\";
        $finalPath = $path . 'file.xlsx';
        return [
            Attachment::fromPath($finalPath)
                ->as('file.xlsx')
                ->withMime('application/xlsx')
        ];
    }
}
