<?php
function addEmoticons($txt)
{

    // Big Grin Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_biggrin.gif\">";
    $txt = str_replace(":D", $thisEmoticon, $txt);

    //Sad Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_sad.gif\">";
    $txt = str_replace(":(", $thisEmoticon, $txt);

    //Wink Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_wink.gif\">";
    $txt = str_replace(";)", $thisEmoticon, $txt);

    //Surprised Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_surprised.gif\">";
    $txt = str_replace(":O", $thisEmoticon, $txt);

    //Question Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_question.gif\">";
    $txt = str_replace(":?", $thisEmoticon, $txt);

    //Confused Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_confused.gif\">";
    $txt = str_replace("o.O", $thisEmoticon, $txt);

    //Smile Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_smile.gif\">";
    $txt = str_replace(":)", $thisEmoticon, $txt);

    //Cool Emoji
    $thisEmoticon = "<img src=\"emoticons/icon_smile.gif\">";
    $txt = str_replace("B-)", $thisEmoticon, $txt);
    return $txt;
}

?>

<?php
//move this to includes/_functions.php
function makeClickableLinks($text)
{
    $text = " " . $text; // fixes problem of not linking if no chars before the link
    $text = preg_replace(
        '/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
        '<a href="\\1">\\1</a>',
        $text
    );
    $text = preg_replace(
        '/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
        '\\1<a href="http://\\2">\\2</a>',
        $text
    );
    $text = preg_replace(
        '/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
        '<a href="mailto:\\1">\\1</a>',
        $text
    );
    return trim($text);
} // end makeClickableLinks
?>

