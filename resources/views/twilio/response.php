<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<Response>
    <Say voice="man" language="ja-JP">ようこそ！TwilioUG-Osakaへ。楽しんで下さいね。</Say>
    <Gather timeout="10" numDigits="1" action="<?= e(url_with_credential('/twilio/gathering')) ?>">
        <Say voice="women" language="ja-JP">完了するには、1、を、もう一度聞くには、2、をプッシュして下さい。</Say>
    </Gather>
</Response>