<?php
$seenIcon = (!!$seen ? 'eye' : 'eye-slash');
$timeAndSeen = "<div class='flex justify-end items-center space-x-2'>
        <span class='text-xs font-thin " . ($isSender ? 'text-gray-500' : 'text-white') . " dark:text-gray-100 ml-10'>$timeAgo</span>
        <span data-time='$created_at' class='text-xs font-normal text-gray-500 dark:text-gray-100'>
            ".($isSender ? "<span class='fas fa-$seenIcon' seen></span>" : '' )."
        </span>
    </div>";
?>

<div class="message-card @if($isSender) mc-sender @endif" data-id="{{ $id }}">
    {{-- Delete Message Button --}}
    @if ($isSender)
        <div class="actions">
            <i class="fas fa-trash delete-btn" data-id="{{ $id }}"></i>
        </div>
    @endif
    {{-- Card --}}
    <div class="message-card-content">
        @if (@$attachment->type != 'image' || $message)
            <div class="flex flex-col leading-1.5 p-2 border-gray-200 @if($isSender)bg-gray-300 @else bg-senderMessageBg  @endif rounded-e-xl rounded-es-xl dark:bg-gray-700">
                <p class="text-sm font-normal text-gray-900 @if(!$isSender)text-white @endif dark:text-white mr-10">
                {!! ($message == null && $attachment != null && @$attachment->type != 'file') ? $attachment->title : nl2br($message) !!}
                {!! $timeAndSeen !!}
                </p>
                {{-- If attachment is a file --}}
                @if(@$attachment->type == 'file')
                <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download">
                    <span class="fas fa-file"></span> {{$attachment->title}}</a>
                @endif
            </div>
        @endif
        @if(@$attachment->type == 'image')
        {{--  --}}
        <div class="image-wrapper" style="text-align: {{$isSender ? 'end' : 'start'}}">
            <div class="image-file chat-image" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment->file) }}')">
                <div>{{ $attachment->title }}</div>
            </div>
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        {{--  --}}
        @endif
    </div>
</div>
