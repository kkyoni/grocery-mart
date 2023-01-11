@foreach ($conversationList as $key)
    @if ($key->from_user_id === Auth::user()->id)
        <div class="left" style="text-align: left;clear: both;">
            <div class="author-name" style="font-weight: bold;margin-bottom: 3px;font-size: 11px;">
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <small class="chat-date"
                    style="opacity: 0.6; font-size: 10px; font-weight: normal;">
                    {{ \Carbon\Carbon::parse($key->created_at)->diffForHumans() }}
                </small>
            </div>
            <div class="chat-message active"
                style="float: left;background: #1ab394;color: #fff;padding: 5px 10px;border-radius: 6px;font-size: 11px;line-height: 14px;max-width: 80%;margin-bottom: 10px;">
                {{ $key->chat_message }}
            </div>

        </div>
    @else
        <div class="right" style="text-align: right;clear: both;">
            <div class="author-name" style="font-weight: bold;margin-bottom: 3px;font-size: 11px;">
                {{ $SecondUser->first_name }} {{ $SecondUser->last_name }}
                <small class="chat-date" style="opacity: 0.6;font-size: 10px;font-weight: normal;">
                    {{ \Carbon\Carbon::parse($key->created_at)->diffForHumans() }}
                </small>
            </div>
            <div class="chat-message"
                style="float: right;padding: 5px 10px;border-radius: 6px;font-size: 11px;line-height: 14px;max-width: 80%;background: #f3f3f4;margin-bottom: 10px;">
                {{ $key->chat_message }}
            </div>
        </div>
    @endif
@endforeach
